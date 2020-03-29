FROM php:7.4-cli
#FROM php:7.2-apache (# Recommended: php-fpm)

LABEL maintainer=manguilar22@gmail.com
WORKDIR /usr/src/myapp
COPY . .

ENV MYSQL_HOST 127.0.0.1

EXPOSE  80
RUN docker-php-ext-install mysqli
#RUN docker-php-ext-enable mysqli
CMD ["php","-S","0.0.0.0:80"]
