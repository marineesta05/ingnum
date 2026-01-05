FROM php:8.2-apache

COPY index.php /var/www/html/

RUN rm -f /var/www/html/index.html

EXPOSE 80

CMD ["apache2-foreground"]