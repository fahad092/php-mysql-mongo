FROM php:7.0.33-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y autoconf pkg-config libssl-dev
RUN pecl install mongodb-1.7.4
RUN pecl install xdebug-2.8.0
#RUN apt-get install pdo-mysql
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini


