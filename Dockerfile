FROM alpine:3.21.3@sha256:a8560b36e8b8210634f77d9f7f9efd7ffa463e380b75e2e74aff4511df3ef88c

ENV PHP_VERSION=84 \
    PHP_INI_DIR=/etc/php84 \
    APP_DIR=/var/www/html

WORKDIR ${APP_DIR}

RUN apk add --no-cache \
        curl \
        nginx \
        supervisor \
        php${PHP_VERSION} \
        php${PHP_VERSION}-ctype \
        php${PHP_VERSION}-curl \
        php${PHP_VERSION}-dom \
        php${PHP_VERSION}-fileinfo \
        php${PHP_VERSION}-fpm \
        php${PHP_VERSION}-gd \
        php${PHP_VERSION}-intl \
        php${PHP_VERSION}-mbstring \
        php${PHP_VERSION}-mysqli \
        php${PHP_VERSION}-opcache \
        php${PHP_VERSION}-openssl \
        php${PHP_VERSION}-phar \
        php${PHP_VERSION}-session \
        php${PHP_VERSION}-tokenizer \
        php${PHP_VERSION}-xml \
        php${PHP_VERSION}-xmlreader \
        php${PHP_VERSION}-xmlwriter && \
    ln -sf /usr/bin/php${PHP_VERSION} /usr/bin/php && \
    addgroup -S www-data && adduser -S -G www-data www-data && \
    mkdir -p /etc/supervisor/conf.d \
             ${PHP_INI_DIR}/conf.d \
             ${PHP_INI_DIR}/php-fpm.d \
             /run/nginx \
             /var/log/php \
             /var/log/nginx && \
    chown -R www-data:www-data ${APP_DIR} /run /var/log/nginx /var/log/php /var/lib/nginx

# Nginx config
RUN printf 'user  www-data;\nworker_processes  1;\nerror_log  /var/log/nginx/error.log warn;\npid /run/nginx.pid;\nevents {\n    worker_connections  1024;\n}\nhttp {\n    include /etc/nginx/mime.types;\n    default_type application/octet-stream;\n    sendfile on;\n    keepalive_timeout  65;\n    server {\n        listen 80;\n        server_name localhost;\n        root %s;\n        index index.php index.html;\n        location / {\n            try_files $uri $uri/ /index.php?route=$uri&$args;\n        }\n        location ~ \\.php$ {\n            include fastcgi_params;\n            fastcgi_pass 127.0.0.1:9000;\n            fastcgi_index index.php;\n            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n        }\n    }\n}' "${APP_DIR}" > /etc/nginx/nginx.conf

# PHP-FPM config
RUN printf '[global]\nerror_log = /var/log/php-fpm.log\n[www]\nuser = www-data\ngroup = www-data\nlisten = 127.0.0.1:9000\npm = dynamic\npm.max_children = 5\npm.start_servers = 2\npm.min_spare_servers = 1\npm.max_spare_servers = 3\n' > ${PHP_INI_DIR}/php-fpm.d/www.conf && \
    printf 'display_errors = On\nlog_errors = On\nerror_log = /var/log/php/php-errors.log\n' > ${PHP_INI_DIR}/conf.d/custom.ini

# Supervisor config
RUN printf '[supervisord]\nnodaemon=true\n[program:nginx]\ncommand=/usr/sbin/nginx -g "daemon off;"\n[program:php-fpm]\ncommand=/usr/sbin/php-fpm${PHP_VERSION} --nodaemonize\n' > /etc/supervisor/conf.d/supervisord.conf

COPY . ${APP_DIR}
RUN chown -R www-data:www-data ${APP_DIR} && chmod -R 755 ${APP_DIR}

USER www-data

VOLUME ["/var/www/html"]

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

HEALTHCHECK --interval=30s --timeout=10s --retries=3 \
  CMD curl --silent --fail http://127.0.0.1:80/fpm-ping || exit 1
