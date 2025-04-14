FROM php:8.4-fpm-alpine3.18 AS base

# Update Alpine packages to mitigate vulnerabilities
RUN apk update && apk upgrade --no-cache

FROM base

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql

# Copy project files to container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Copy Nginx configuration
COPY nginx.conf /etc/nginx/nginx.conf

# Expose port 80
EXPOSE 80

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
