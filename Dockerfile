FROM php:7-apache

#COPY php/php.ini /usr/local/etc/php/

RUN echo "Asia/shanghai" > /etc/timezone
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime

RUN echo "deb http://mirrors.ustc.edu.cn/debian/ jessie main contrib non-free" > /etc/apt/sources.list
RUN echo "deb-src http://mirrors.ustc.edu.cn/debian/ jessie main contrib non-free" >> /etc/apt/sources.list
RUN echo "deb http://mirrors.ustc.edu.cn/debian/ jessie-updates main contrib non-free" >> /etc/apt/sources.list
RUN echo "deb-src http://mirrors.ustc.edu.cn/debian/ jessie-updates main contrib non-free" >> /etc/apt/sources.list
RUN echo "deb http://mirrors.ustc.edu.cn/debian/ jessie-backports main contrib non-free" >> /etc/apt/sources.list
RUN echo "deb-src http://mirrors.ustc.edu.cn/debian/ jessie-backports main contrib non-free" >> /etc/apt/sources.list
RUN echo "deb http://mirrors.ustc.edu.cn/debian-security/ jessie/updates main contrib non-free" >> /etc/apt/sources.list
RUN echo "deb-src http://mirrors.ustc.edu.cn/debian-security/ jessie/updates main contrib non-free" >> /etc/apt/sources.list

# COPY sources.list /etc/apt/sources.list

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql

RUN apt-get install -y cron
ADD php-cron /etc/cron.d/php-cron
RUN chmod 644 /etc/cron.d/php-cron

CMD cron && apache2-foreground
