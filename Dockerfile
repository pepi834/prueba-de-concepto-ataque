FROM php:8.3.7-apache

# Habilita mod_rewrite
RUN a2enmod rewrite

# Instala la extensión pdo_mysql para conectar PHP con MySQL/MariaDB
RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html

EXPOSE 80