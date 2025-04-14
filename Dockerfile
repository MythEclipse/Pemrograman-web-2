FROM alpine:3.21.3@sha256:a8560b36e8b8210634f77d9f7f9efd7ffa463e380b75e2e74aff4511df3ef88c

# Setup document root
WORKDIR /var/www/html

# Install packages and remove default server definition
RUN apk add --no-cache \
    curl \
    nginx \
    php84 \
    php84-ctype \
    php84-curl \
    php84-dom \
    php84-fileinfo \
    php84-fpm \
    php84-gd \
    php84-intl \
    php84-mbstring \
    php84-mysqli \
    php84-opcache \
    php84-openssl \
    php84-phar \
    php84-session \
    php84-tokenizer \
    php84-xml \
    php84-xmlreader \
    php84-xmlwriter \
    supervisor

RUN ln -s /usr/bin/php84 /usr/bin/php

# Configure nginx - http
RUN echo 'user  nobody;\nworker_processes  1;\nerror_log  /var/log/nginx/error.log warn;\npid        /var/run/nginx.pid;\nevents {\n    worker_connections  1024;\n}\nhttp {\n    include       /etc/nginx/mime.types;\n    default_type  application/octet-stream;\n    sendfile        on;\n    keepalive_timeout  65;\n    server {\n        listen       80;\n        server_name  localhost;\n        root   /var/www/html;\n        index  index.php index.html index.htm;\n        location / {\n            try_files $uri $uri/ /index.php?route=$uri&$args;\n        }\n        location ~ \.php$ {\n            include fastcgi_params;\n            fastcgi_pass 127.0.0.1:9000;\n            fastcgi_index index.php;\n            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n        }\n    }\n}' > /etc/nginx/nginx.conf

# Configure PHP-FPM
ENV PHP_INI_DIR /etc/php84
RUN echo '[global]\nerror_log = /var/log/php-fpm.log\n[www]\nuser = nobody\ngroup = nobody\nlisten = 127.0.0.1:9000\npm = dynamic\npm.max_children = 5\npm.start_servers = 2\npm.min_spare_servers = 1\npm.max_spare_servers = 3\n' > ${PHP_INI_DIR}/php-fpm.d/www.conf
RUN echo 'display_errors = On\nlog_errors = On\nerror_log = /var/log/php-errors.log\n' > ${PHP_INI_DIR}/conf.d/custom.ini

# Configure supervisord
RUN echo '[supervisord]\nnodaemon=true\n[program:nginx]\ncommand=/usr/sbin/nginx -g "daemon off;"\n[program:php-fpm]\ncommand=/usr/sbin/php-fpm84 --nodaemonize\n' > /etc/supervisor/conf.d/supervisord.conf

# Make sure files/folders needed by the processes are accessible when they run under the nobody user
RUN chown -R nobody:nobody /var/www/html /run /var/lib/nginx /var/log/nginx

# Copy project files to container
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Switch to use a non-root user from here on
USER nobody

# Expose the port nginx is reachable on
EXPOSE 80

# Let supervisord start nginx & php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

# Configure a healthcheck to validate that everything is up & running
HEALTHCHECK --timeout=10s CMD curl --silent --fail http://127.0.0.1:80/fpm-ping || exit 1
