FROM php:8.0.9-apache

RUN a2enmod rewrite

ADD . /var/www/html