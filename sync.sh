#!/bin/sh
#

rsync -vhtP docker-compose_server.yml root@104.236.242.31:/root/docks/lordswar/docker-compose.yml
rsync -vhtP Dockerfile_server root@104.236.242.31:/root/docks/lordswar/Dockerfile
rsync -vhtP php5forum/Dockerfile_server root@104.236.242.31:/root/docks/lordswar/php5forum/Dockerfile
rsync -vhtP php-cron root@104.236.242.31:/root/docks/lordswar/php-cron
rsync -rvhtP forum/ root@104.236.242.31:/root/docks/lordswar/forum
rsync -avhtP web/ root@104.236.242.31:/root/docks/lordswar/web
rsync -avhtP lordswar/ root@104.236.242.31:/root/docks/lordswar/lordswar
rsync -vhtP server_main_config.php root@104.236.242.31:/root/docks/lordswar/lordswar/include/config.php
rsync -vhtP server_world_config.php root@104.236.242.31:/root/docks/lordswar/lordswar/world1/include/config.php

ssh root@104.236.242.31 'chown -R www-data:www-data /root/docks/lordswar/forum'

ssh root@104.236.242.31 'sed -i -e "s/error_reporting/#error_reporting/g" /root/docks/lordswar/lordswar/index.php'
ssh root@104.236.242.31 'sed -i -e "s/error_reporting/#error_reporting/g" /root/docks/lordswar/lordswar/include.inc.php'
ssh root@104.236.242.31 'sed -i -e "s/error_reporting/#error_reporting/g" /root/docks/lordswar/lordswar/world1/include.inc.php'
ssh root@104.236.242.31 'sed -i -e "s/ini_set/#ini_set/g" /root/docks/lordswar/lordswar/world1/include.inc.php'
