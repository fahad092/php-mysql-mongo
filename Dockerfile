FROM php:7.0.33-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y autoconf pkg-config libssl-dev
RUN pecl install mongodb-1.7.4
RUN pecl install xdebug-2.8.0
RUN docker-php-ext-enable xdebug
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
# COPY error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

# RUN mkdir -p docker/php/conf.d
# RUN touch docker/php/conf.d/xdebug.ini
# RUN touch docker/php/conf.d/error_reporting.ini
# zend_extension=xdebug


# COPY . /home/xdebug/xdebug-debug.ini
# COPY . /home/xdebug/xdebug-default.ini
# COPY . /home/xdebug/xdebug-off.ini
# COPY . /home/xdebug/xdebug-profile.ini
# COPY . /home/xdebug/xdebug-trace.ini

# ARG XDEBUG_MODES
# ARG REMOTE_HOST="host.docker.internal"
# ARG REMOTE_PORT=9003
# ARG IDE_KEY="docker"

# ENV MODES=$XDEBUG_MODES
# ENV CLIENT_HOST=$REMOTE_HOST
# ENV CLIENT_PORT=$REMOTE_PORT
# ENV IDEKEY=$IDE_KEY

# COPY ./docker/php/fpm-entrypoint.sh /home/fpm-entrypoint
# RUN chmod +x /home/fpm-entrypoint

# WORKDIR /var/www/html

# ENTRYPOINT ["/home/fpm-entrypoint"]

# [xdebug]
#xdebug.mode=develop,debug
#xdebug.client_host=host.docker.internal
#xdebug.start_with_request=yes
#RUN apt-get install pdo-mysql
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini


