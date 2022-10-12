FROM php:8.0.21-fpm

WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
  build-essential \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  locales \
  zip \
  jpegoptim optipng pngquant gifsicle \
  vim \
  unzip \
  git \
  curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-configure gd
RUN docker-php-ext-install pdo_mysql exif pcntl gd

# Enable JIT
RUN docker-php-ext-install opcache
RUN echo 'opcache.enable_cli=1\nopcache.jit_buffer_size=50M\nopcache.jit=tracing\n' >> $(php -i | grep opcache\.ini | tr -d ",")

# Install composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
