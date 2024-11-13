# Use the official PHP image with Apache
FROM php:8.1-apache

# Install system dependencies and PHP extensions required by Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Enable Apache mod_rewrite for Laravel
RUN a2enmod rewrite

# Set working directory in container
WORKDIR /var/www/html

# Copy the composer.json and install Laravel dependencies
COPY composer.json composer.lock /var/www/html/
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-scripts --no-autoloader

# Copy the Laravel app to the container
COPY . /var/www/html

# Install Laravel dependencies
RUN php composer.phar dump-autoload --optimize

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]
