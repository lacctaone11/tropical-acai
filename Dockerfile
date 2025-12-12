FROM php:8.2-fpm-alpine

# Instalar Nginx e extensões PHP
RUN apk add --no-cache nginx supervisor \
    libpng-dev libjpeg-turbo-dev freetype-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql opcache

# Configurar OPcache para performance
RUN echo 'opcache.enable=1' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.memory_consumption=128' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.max_accelerated_files=10000' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.validate_timestamps=0' >> /usr/local/etc/php/conf.d/opcache.ini

# Configurar Nginx
RUN mkdir -p /run/nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Configurar Supervisor para rodar Nginx + PHP-FPM
COPY supervisord.conf /etc/supervisord.conf

# Copiar arquivos do projeto
WORKDIR /var/www/html
COPY . .

# Permissões
RUN chown -R www-data:www-data /var/www/html

# Script de entrada para configurar PORT
COPY docker-start.sh /docker-start.sh
RUN chmod +x /docker-start.sh

EXPOSE 80

CMD ["/docker-start.sh"]
