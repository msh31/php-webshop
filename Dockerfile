FROM php:8.2-apache

# Update and install required packages
RUN apt-get update && apt-get install -y \
    python3-setuptools \
    python3-pip \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Set Apache document root to the src directory
RUN sed -ri -e 's!/var/www/html!/var/www/html/src!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/src/!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Create alias for icons directory
RUN echo 'Alias /icons/ /var/www/html/src/icons/' > /etc/apache2/conf-available/icons-alias.conf
RUN a2enconf icons-alias

# Enable mod_rewrite for .htaccess support
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html