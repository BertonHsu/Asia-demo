FROM php:8.2

WORKDIR /source
COPY . .

CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]