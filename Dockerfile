FROM php:7-fpm-alpine

RUN echo "Asia/shanghai" > /etc/timezone
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime

# COPY sources.list /etc/apt/sources.list

# m4, perl, 

RUN echo 'http://mirrors.aliyun.com/alpine/alpine/v3.4/main/' > /etc/apk/repositories
RUN echo 'http://mirrors.aliyun.com/alpine/alpine/v3.4/community/' >> /etc/apk/repositories

RUN cat /etc/apk/repositories

# RUN apk update && apk add perl gcc g++ # slow perl, gcc,

# remove jpeg , instead libjpeg-turbo libpng
RUN apk update && apk add \
        freetype-dev \
        libjpeg-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install iconv mcrypt pdo_mysql gd

ADD php-cron /etc/cron.d/php-cron
RUN chmod 644 /etc/cron.d/php-cron

CMD crond && php-fpm
