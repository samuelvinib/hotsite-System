FROM php:8.3.2-fpm

RUN apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
            curl \
            vim \
            openssl \
            libmemcached-dev \
            libz-dev \
            zlib1g-dev \
            libzip-dev \
            zip \
            unzip \
            libpq-dev \
            libjpeg-dev \
            libpng-dev \
            libxml2-dev \
            libfreetype6-dev \
            libssl-dev \
            libmcrypt-dev \
            libonig-dev \
            libgmp-dev

RUN rm -rf /var/lib/apt/lists/*

# RUN docker-php-ext-install pdo;
RUN docker-php-ext-install pdo_mysql;
RUN docker-php-ext-install pdo_pgsql;
RUN docker-php-ext-install bcmath;
#RUN docker-php-ext-install json;
RUN docker-php-ext-install gmp;
RUN docker-php-ext-install ctype;
RUN docker-php-ext-install zip;
RUN docker-php-ext-install mbstring;
#RUN docker-php-ext-install tokenizer;
RUN docker-php-ext-install xml;

    # Install the PHP gd library
RUN docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-freetype; \
    docker-php-ext-install gd; \
    php -r 'var_dump(gd_info());'

#RUN docker-php-ext-configure zip --with-libzip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"
RUN composer self-update 2.6.6

# Instale o Node.js
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs

# Instale o npm
RUN apt-get install -y npm

# Verifique se o Node.js e o npm foram instalados corretamente
RUN node -v
RUN npm -v

RUN mkdir /opt/crm-api

WORKDIR /opt/crm-api

COPY . .

EXPOSE 80
