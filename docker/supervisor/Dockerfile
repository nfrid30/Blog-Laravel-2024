FROM php:8.2.3-fpm  AS php_cli

# Set working directory
WORKDIR /var/www

ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    default-mysql-server \
    default-mysql-client \
    build-essential \
    git \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libonig-dev \
    libxml2-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    libpq-dev \
    zlib1g-dev \
    libzip-dev \
    libz-dev \
    libwebp-dev \
    supervisor \
    sudo

FROM php_cli AS builder

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install intl pdo pdo_mysql pgsql mbstring exif pcntl bcmath zip

RUN docker-php-ext-configure gd --with-freetype --with-webp --with-jpeg && \
    docker-php-ext-install gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g $uid $user
RUN useradd -u $uid -ms /bin/bash -g $user $user

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=backend:backend . /var/www

RUN \
  apt-get update && \
  apt-get install -y supervisor && \
  rm -rf /var/lib/apt/lists/* && \
  sed -i 's/^\(\[supervisord\]\)$/\1\nnodaemon=true/' /etc/supervisor/supervisord.conf

CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
