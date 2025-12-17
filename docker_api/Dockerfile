FROM php:8.2-fpm

# Install nginx
RUN apt-get update && apt-get install -y nginx \
    && rm -rf /var/lib/apt/lists/*

# Copy nginx config
COPY nginx/nginx.conf /etc/nginx/nginx.conf
COPY nginx/conf.d /etc/nginx/conf.d
COPY nginx/sites /etc/nginx/sites-enabled

# PHP config
COPY php-fpm/zz-docker.conf /usr/local/etc/php-fpm.d/

# App code
COPY . /var/www/html
WORKDIR /var/www/html

EXPOSE 80

CMD service php-fpm start && nginx -g "daemon off;"
