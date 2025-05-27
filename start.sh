#!/bin/bash

# Ejecuta comandos necesarios antes de iniciar Apache
php artisan storage:link
php artisan migrate --force

# Inicia Apache en primer plano
apache2-foreground
