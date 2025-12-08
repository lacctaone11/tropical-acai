FROM php:8.2-apache

# Instalar extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql opcache

# Habilitar módulos Apache para performance
RUN a2enmod rewrite headers expires deflate

# Configurar DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Permitir .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Configurar OPcache para melhor performance PHP
RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.max_accelerated_files=10000" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.revalidate_freq=60" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.enable_cli=1" >> /usr/local/etc/php/conf.d/opcache.ini

# Configurar PHP para produção
RUN echo "expose_php=Off" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "display_errors=Off" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "log_errors=On" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "error_reporting=E_ALL & ~E_DEPRECATED & ~E_STRICT" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "max_execution_time=30" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "memory_limit=128M" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "post_max_size=10M" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "upload_max_filesize=10M" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "session.cookie_httponly=1" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "session.cookie_secure=1" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "session.use_strict_mode=1" >> /usr/local/etc/php/conf.d/production.ini

# Configurar Apache para performance
RUN echo "ServerTokens Prod" >> /etc/apache2/conf-available/security.conf \
    && echo "ServerSignature Off" >> /etc/apache2/conf-available/security.conf

# Copiar arquivos do projeto
COPY . /var/www/html/

# Definir permissões
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Expor porta (Railway usa variável PORT)
EXPOSE 80

# Copiar e dar permissão ao script de inicialização
COPY start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]
