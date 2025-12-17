#syntax=docker/dockerfile:1.4

# Builder images
FROM composer/composer:2-bin AS composer

FROM mlocati/php-extension-installer:latest AS php_extension_installer

# Development PHP image
FROM php:8.3-fpm-alpine

WORKDIR /var/www

# php extensions installer: https://github.com/mlocati/docker-php-extension-installer
COPY --from=php_extension_installer --link /usr/bin/install-php-extensions /usr/local/bin/

# Install dependencies and extensions
RUN apk add --no-cache \
	acl \
	fcgi \
	file \
	gettext \
	git \
	libc6-compat \
	postgresql-dev \
	# Add Tesseract OCR packages for Alpine
	#tesseract-ocr \
	#tesseract-ocr-data-fra \
	#ghostscript \
	&& install-php-extensions \
	apcu \
	intl \
	sockets \
	opcache \
	zip \
	gd \
	pdo_pgsql \
	ftp \
	exif \
	&& rm -rf /tmp/* /var/cache/apk/*

# PHP Configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY --link zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

# Composer configuration
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PATH="${PATH}:/root/.composer/vendor/bin"
COPY --from=composer --link /composer /usr/bin/composer

CMD ["php-fpm"]
