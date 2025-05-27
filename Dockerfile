FROM php:8.3.11-apache

# Instala dependencias necesarias
RUN apt-get update -y && apt-get install -y openssl zip unzip git

# Instala extensiones necesarias de PHP
RUN docker-php-ext-install pdo_mysql

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el proyecto al contenedor
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala dependencias PHP
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Genera key de Laravel
RUN php artisan key:generate

# Crea el directorio donde se montará el volumen para imágenes
RUN mkdir -p storage/app/public

# Da permisos a Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage/app/public

# Habilita mod_rewrite en Apache
RUN a2enmod rewrite

# Cambia el DocumentRoot de Apache para servir desde /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Copia script de inicio que se ejecutará al levantar el contenedor
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Comando por defecto al iniciar el contenedor
CMD ["/start.sh"]

