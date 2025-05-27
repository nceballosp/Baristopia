FROM php:8.3.11-apache

# Instala dependencias necesarias
RUN apt-get update -y && apt-get install -y openssl zip unzip git

# Extensiones PHP necesarias
RUN docker-php-ext-install pdo_mysql

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el proyecto
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

# Crea enlace simbólico para acceder a imágenes
RUN php artisan storage:link

# Ejecuta migraciones si es necesario (puedes comentar si no lo necesitas)
RUN php artisan migrate

# Da permisos
RUN chmod -R 775 storage bootstrap/cache

# Habilita mod_rewrite en Apache
RUN a2enmod rewrite

# Configura Apache para servir desde public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Ajusta Apache para que sirva desde public/
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Reinicia Apache
RUN service apache2 restart
