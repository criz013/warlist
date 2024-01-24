  FROM php:8.2-apache

  RUN a2enmod ssl rewrite headers

  RUN apt update \
  && apt install -y zlib1g-dev g++ libicu-dev zip libzip-dev libpng-dev libxml2-dev libpq-dev \
  && docker-php-ext-install -j$(nproc) intl opcache pgsql pdo pdo_mysql pdo_pgsql bcmath zip gd calendar soap

    #datadog
    #RUN docker-php-ext-install sockets

    #RUN pecl install apcu ssh2-1.3.1 \
    #    && docker-php-ext-enable apcu

  RUN pecl install xdebug-3.3.1 \
    && docker-php-ext-enable xdebug

    # RUN cd /tmp \
    #    && git clone https://github.com/php/pecl-networking-ssh2.git \
    #    && cd /tmp/ssh2/ \
    #    && .travis/build.sh \
    #    && docker-php-ext-enable ssh2


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

RUN apt -qq update \
    && apt -qq install -y nodejs npm \
    && npm install --global yarn

RUN apt -qq autoclean



  RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
  ENV COMPOSER_ALLOW_SUPERUSER=1

  RUN curl -sS https://get.symfony.com/cli/installer | bash \
  && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

   #RUN apt install -y supervisor && service supervisor start

  RUN rm /etc/apache2/sites-enabled/000-default.conf

  #belongs to www-data
  RUN mkdir /var/www/warlist && chown www-data: /var/www/warlist

  # ENV PATH /root/.yarn/bin:$PATH
  WORKDIR /var/www/warlist
  #RUN curl localhost/status
