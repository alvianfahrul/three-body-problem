FROM php:8.3-cli

# Install dependency sistem
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy source code Laravel
COPY . .

# Install dependency PHP
RUN composer install --no-interaction --prefer-dist

# Setup env Laravel
RUN cp .env.example .env

# Generate app key
RUN php artisan key:generate

# Expose port Laravel
EXPOSE 8001

# Jalankan migrate + seed + serve
CMD php artisan migrate --seed && \
    php artisan serve --host=0.0.0.0 --port=8001
