FROM php:latest 
WORKDIR /var/www/html
COPY index.php index.php
EXPOSE 8800
