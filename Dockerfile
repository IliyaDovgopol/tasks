# Використовуємо офіційний образ PHP з Apache
FROM php:8.1-apache

# Встановлюємо Xdebug
RUN pecl install xdebug \
&& docker-php-ext-enable xdebug

# Встановлюємо залежності для MySQL
RUN docker-php-ext-install pdo_mysql

# Встановлюємо робочу директорію
WORKDIR /app

# Копіюємо ваш проект у контейнер
COPY . /app

# Налаштування Apache для роботи з вашим додатком
RUN a2enmod rewrite
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Додаємо конфігурацію для Xdebug
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Команда за замовчуванням — запуск Apache
CMD ["apache2-foreground"]
