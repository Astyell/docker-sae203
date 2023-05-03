
FROM php:7.0-apache
COPY ./ /usr/local/apache2/
RUN  index.php
