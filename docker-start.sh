#!/bin/sh
set -e

# Substituir PORT no nginx.conf
PORT=${PORT:-80}
sed -i "s/PORT_PLACEHOLDER/$PORT/g" /etc/nginx/nginx.conf

# Iniciar supervisor (que inicia nginx + php-fpm)
exec /usr/bin/supervisord -c /etc/supervisord.conf
