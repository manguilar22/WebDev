FROM php:7.4-cli
#FROM php:7.2-apache (# Recommended: php-fpm)
LABEL maintainer=manguilar22@gmail.com
WORKDIR /usr/src/myapp
COPY public/. .

ENV VERSION LOCAL

ENV MYSQL_HOST 127.0.0.1
ENV MYSQL_USERNAME root
ENV MYSQL_PASSWORD password
ENV MYSQL_DATABASE s20am_team10

RUN docker-php-ext-install mysqli

EXPOSE  80
CMD ["php","-S","0.0.0.0:80"]


