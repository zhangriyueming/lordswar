FROM php:7-fpm-alpine

RUN echo "Asia/shanghai" > /etc/timezone
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime

# COPY sources.list /etc/apt/sources.list

# m4, perl, 

RUN apk update && apk add \
        freetype \
        jpeg \
    && docker-php-ext-install -j$(nproc) iconv mcrypt pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \

ADD php-cron /etc/cron.d/php-cron
RUN chmod 644 /etc/cron.d/php-cron

CMD crond && php-fpm
