#!/bin/bash
set -e

# Railway define a variável PORT dinamicamente
PORT=${PORT:-80}

echo "Starting Apache on port $PORT..."

# Configurar Apache para usar a porta do Railway
sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf
sed -i "s/:80/:$PORT/g" /etc/apache2/sites-available/000-default.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:$PORT>/g" /etc/apache2/sites-available/000-default.conf

# Iniciar Apache em foreground
exec apache2-foreground
