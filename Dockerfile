# Use the official PHP image with Apache
FROM php:8.1-apache

# Install Xdebug
RUN pecl install xdebug \
&& docker-php-ext-enable xdebug

# Install dependencies for MySQL
RUN docker-php-ext-install pdo_mysql

# Set the working directory
WORKDIR /app

# Copy your project into the container
COPY . /app

# Configure Apache to work with your app
RUN a2enmod rewrite
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Add configuration for Xdebug
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Default command to run Apache
CMD ["apache2-foreground"]
