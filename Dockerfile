FROM nginx:1.20-alpine

ARG UID=1000
ARG GID=1000

RUN apk -U upgrade;

RUN apk add --no-cache \
    bash \
    git \
    grep \
    dcron \
    tzdata \
    su-exec \
    shadow \
    supervisor;

RUN apk add --no-cache \
    php7 \
    php7-fpm \
    php7-opcache \
    php7-dev \
    php7-gd \
    php7-curl \
    php7-memcached \
    php7-pdo \
    php7-pdo_mysql \
    php7-mysqli \
    php7-mysqlnd \
    php7-mbstring \
    php7-xml \
    php7-zip \
    php7-bcmath \
    php7-soap \
    php7-intl \
    php7-msgpack \
    php7-igbinary \
    php7-phar \
    php7-json \
    php7-tokenizer \
    php7-dom \
    php7-fileinfo \
    php7-ctype \
    php7-iconv \
    php7-xmlwriter \
    php7-xmlreader \
    php7-simplexml \
    php7-ldap;

RUN php -v;

RUN usermod -u ${UID} nginx && groupmod -g ${GID} nginx

RUN echo "Europe/Chisinau" > /etc/timezone && \
    cp /usr/share/zoneinfo/Europe/Chisinau /etc/localtime && \
    apk del --no-cache tzdata && \
    rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*;

WORKDIR /var/www/html/

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN mkdir -p /var/www/html && \
    mkdir -p /var/cache/nginx && \
    mkdir -p /var/lib/nginx && \
    mkdir -p /var/log/nginx && \
    touch /var/log/nginx/access.log && \
    touch /var/log/nginx/error.log && \
    chown -R nginx:nginx /var/cache/nginx /var/lib/nginx /var/log/nginx && \
    chmod -R g+rw /var/cache/nginx /var/lib/nginx /var/log/nginx /etc/php7/php-fpm.d;

COPY docker/conf/php-fpm-pool.conf /etc/php7/php-fpm.d/www.conf
COPY docker/conf/supervisord.conf /etc/supervisor/supervisord.conf
COPY docker/conf/nginx.conf /etc/nginx/nginx.conf
COPY docker/conf/nginx-site.conf /etc/nginx/conf.d/default.conf
COPY docker/conf/php.ini /etc/php7/conf.d/50-settings.ini
COPY docker/entrypoint.sh /sbin/entrypoint.sh

COPY --chown=nginx:nginx ./ .

ENTRYPOINT ["/sbin/entrypoint.sh"]

CMD ["true"]
