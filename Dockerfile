FROM php:8.2-apache

# Install and enable SQLite
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


WORKDIR /var/www/html

COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Configure Apache
RUN a2enmod rewrite
RUN service apache2 restart


EXPOSE 80

CMD ["apache2-foreground"]
