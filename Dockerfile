FROM php:8.2-fpm-alpine

# Instalar Nginx e extensões PHP
RUN apk add --no-cache nginx supervisor \
    libpng-dev libjpeg-turbo-dev freetype-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql opcache

# Configurar OPcache para máxima performance
RUN echo 'opcache.enable=1' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.memory_consumption=256' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.max_accelerated_files=20000' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.validate_timestamps=0' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.interned_strings_buffer=16' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.fast_shutdown=1' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.enable_cli=0' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.jit=1255' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.jit_buffer_size=128M' >> /usr/local/etc/php/conf.d/opcache.ini

# Configurar PHP-FPM para performance
RUN echo '[www]' > /usr/local/etc/php-fpm.d/zz-performance.conf \
    && echo 'pm = dynamic' >> /usr/local/etc/php-fpm.d/zz-performance.conf \
    && echo 'pm.max_children = 20' >> /usr/local/etc/php-fpm.d/zz-performance.conf \
    && echo 'pm.start_servers = 4' >> /usr/local/etc/php-fpm.d/zz-performance.conf \
    && echo 'pm.min_spare_servers = 2' >> /usr/local/etc/php-fpm.d/zz-performance.conf \
    && echo 'pm.max_spare_servers = 6' >> /usr/local/etc/php-fpm.d/zz-performance.conf \
    && echo 'pm.max_requests = 500' >> /usr/local/etc/php-fpm.d/zz-performance.conf \
    && echo 'request_terminate_timeout = 30s' >> /usr/local/etc/php-fpm.d/zz-performance.conf

# Configurar PHP para performance
RUN echo 'realpath_cache_size=4096K' >> /usr/local/etc/php/conf.d/performance.ini \
    && echo 'realpath_cache_ttl=600' >> /usr/local/etc/php/conf.d/performance.ini \
    && echo 'expose_php=Off' >> /usr/local/etc/php/conf.d/performance.ini

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
