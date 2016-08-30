#!/bin/sh
#

rsync -h -v -P -t docker-compose_server.yml root@104.236.242.31:/root/docks/lordswar/docker-compose.yml
rsync -h -v -P -t Dockerfile_server root@104.236.242.31:/root/docks/lordswar/Dockerfile
rsync -h -v -P -t php5forum/Dockerfile_server root@104.236.242.31:/root/docks/lordswar/php5forum/Dockerfile
rsync -h -v -P -t Dockerfile_server root@104.236.242.31:/root/docks/lordswar/Dockerfile
rsync -h -v -P -t php-cron root@104.236.242.31:/root/docks/lordswar/php-cron
rsync -h -v -r -P -t forum root@104.236.242.31:/root/docks/lordswar/forum
rsync -h -v -r -P -t web root@104.236.242.31:/root/docks/lordswar/web
rsync -h -v -r -P -t lordswar root@104.236.242.31:/root/docks/lordswar/lordswar

