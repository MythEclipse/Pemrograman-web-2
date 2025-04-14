FROM alpine:3.18

ARG PHP_VERSION=84
ENV PHP_VERSION=${PHP_VERSION}
ENV APP_DIR=/var/www/html
ENV PHP_INI_DIR=/etc/php${PHP_VERSION}

# Install deps
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    bash \
    php${PHP_VERSION} \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-mysqli \
    php${PHP_VERSION}-session \
    php${PHP_VERSION}-json \
    php${PHP_VERSION}-ctype \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-tokenizer \
    php${PHP_VERSION}-fileinfo \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-dom && \
    ln -sf /usr/bin/php${PHP_VERSION} /usr/bin/php && \
    ln -sf /usr/sbin/php-fpm${PHP_VERSION} /usr/sbin/php-fpm && \
    mkdir -p /run/nginx /var/log/php /var/log/supervisord ${APP_DIR} && \
    touch /var/log/php-fpm.log /var/log/php/php-errors.log /var/log/supervisord/supervisord.log

# Config PHP-FPM
RUN printf '[global]\nerror_log = /var/log/php-fpm.log\n[www]\nuser = nobody\ngroup = nobody\nlisten = 127.0.0.1:9000\npm = dynamic\npm.max_children = 5\npm.start_servers = 2\npm.min_spare_servers = 1\npm.max_spare_servers = 3\ncatch_workers_output = yes\n' > ${PHP_INI_DIR}/php-fpm.d/www.conf && \
    printf 'display_errors = On\nlog_errors = On\nerror_log = /var/log/php/php-errors.log\n' > ${PHP_INI_DIR}/conf.d/docker.ini

# Config nginx
RUN printf 'user  nobody;\nworker_processes  1;\npid /run/nginx.pid;\nevents {\n  worker_connections  1024;\n}\nhttp {\n  include /etc/nginx/mime.types;\n  default_type application/octet-stream;\n  sendfile on;\n  keepalive_timeout  65;\n  server {\n    listen 80;\n    server_name localhost;\n    root /var/www/html;\n    index index.php index.html;\n    location / {\n      try_files $uri $uri/ /index.php?$query_string;\n    }\n    location ~ \\.php$ {\n      include fastcgi_params;\n      fastcgi_pass 127.0.0.1:9000;\n      fastcgi_index index.php;\n      fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n    }\n  }\n}' > /etc/nginx/nginx.conf

# Config supervisor
RUN printf '[supervisord]\nnodaemon=true\nlogfile=/var/log/supervisord/supervisord.log\n[program:nginx]\ncommand=/usr/sbin/nginx -g "daemon off;"\n[program:php-fpm]\ncommand=/usr/sbin/php-fpm --nodaemonize\n' > /etc/supervisord.conf

COPY . ${APP_DIR}

WORKDIR ${APP_DIR}

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
