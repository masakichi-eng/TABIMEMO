#!/bin/bash

set -eux

cd ~/tabimemo
php artisan migrate --force
php artisan config:cache
