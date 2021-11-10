FROM php:8.1.0RC5-zts-buster

## php extension installer helper
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

## php extensions
RUN install-php-extensions sqlsrv
