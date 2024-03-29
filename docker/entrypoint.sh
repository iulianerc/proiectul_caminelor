#!/bin/bash
set -eo pipefail

if [[ ! -f ".env" ]]
then
    echo "Error: .env not found."
    cp .env.example .env
fi

su-exec nginx:nginx composer install && php artisan storage:link
/usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf

exit 0
