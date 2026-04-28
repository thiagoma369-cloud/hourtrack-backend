# Usa PHP com Apache
FROM php:8.4-apache

# Instala extensões necessárias do Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Habilita mod_rewrite do Apache
RUN a2enmod rewrite

# Habilita .htaccess (ESSENCIAL PRO LARAVEL)
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copia arquivos do projeto
COPY . /var/www/html

# Define pasta pública como root
WORKDIR /var/www/html

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala dependências do Laravel
RUN composer install --no-dev --no-interaction --prefer-dist


RUN cp .env.example .env
RUN php artisan key:generate

# cria banco sqlite
RUN mkdir -p database
RUN touch database/database.sqlite

# roda migrations
RUN php artisan migrate --force

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# Define DocumentRoot para /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public



RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Porta padrão
EXPOSE 80