FROM php:8.2-cli

# Instalar extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copiar arquivos do projeto
WORKDIR /var/www/html
COPY . .

# Porta padrão
EXPOSE 80

# PHP built-in server - shell form para expandir $PORT
CMD php -S 0.0.0.0:${PORT:-80}
