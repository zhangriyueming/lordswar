FROM php:7-fpm-alpine

RUN echo "Asia/shanghai" > /etc/timezone
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime

# RUN echo 'http://mirrors.aliyun.com/alpine/alpine/v3.4/main/' > /etc/apk/repositories
# RUN echo 'http://mirrors.aliyun.com/alpine/alpine/v3.4/community/' >> /etc/apk/repositories

RUN apk update && apk add \
        freetype-dev \
        libjpeg-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install iconv mcrypt pdo_mysql gd

#RUN docker-php-ext-install opcache
#
#RUN { \
#       		echo 'opcache.memory_consumption=128'; \
#       		echo 'opcache.interned_strings_buffer=8'; \
#       		echo 'opcache.max_accelerated_files=4000'; \
#       		echo 'opcache.revalidate_freq=60'; \
#       		echo 'opcache.fast_shutdown=1'; \
#       		echo 'opcache.enable_cli=1'; \
#       	} > /usr/local/etc/php/conf.d/opcache-recommended.ini

#ADD php-cron /etc/cron.d/php-cron
#RUN chmod 644 /etc/cron.d/php-cron

ADD php-cron /root/php-cron
#RUN crontab -l | { cat; echo "00    00       *       *       *       run-parts /etc/periodic/midnight"; } | crontab -
RUN cat /root/php-cron | crontab -

CMD crond && php-fpm
