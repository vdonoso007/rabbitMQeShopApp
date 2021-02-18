#!/bin/sh
cd /var/www/eShop
composer install
docker-php-entrypoint php-fpm