#!/bin/sh
set -eu
if [ -z "${APP_KEY:-}" ]; then
    echo 'Set APP_KEY in the hosting environment before starting the application.' >&2
    exit 1
fi
if [ "${DB_CONNECTION:-sqlite}" = 'sqlite' ]; then
    mkdir -p "$(dirname "$DB_DATABASE")"
    touch "$DB_DATABASE"
    chown -R www-data:www-data "$(dirname "$DB_DATABASE")"
fi
php artisan migrate --force
if [ "${SEED_DEMO_DATA:-false}" = 'true' ]; then
    php artisan db:seed --force
fi
chown -R www-data:www-data storage bootstrap/cache
exec "$@"
