FROM php:7.4-cli
#FROM php:7.2-apache (# Recommended: php-fpm)
LABEL maintainer=manguilar22@gmail.com
WORKDIR /usr/src/myapp
COPY . .
EXPOSE  80
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
CMD ["php","-S","0.0.0.0:80"]
