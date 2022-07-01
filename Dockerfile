FROM php:7.4

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    git
# Clear cache
RUN apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Repository contains a script that can be used to easily install a PHP extension
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin \
    && composer clear-cache

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

EXPOSE 8081

CMD [ "php", "-S", "0.0.0.0:8081", "-t", "public", "public/index.php" ]