#!/bin/sh
#

rsync -vhtP docker-compose_server.yml root@104.236.242.31:/root/docks/lordswar/docker-compose.yml
rsync -vhtP Dockerfile_server root@104.236.242.31:/root/docks/lordswar/Dockerfile
rsync -vhtP php5forum/Dockerfile_server root@104.236.242.31:/root/docks/lordswar/php5forum/Dockerfile
rsync -vhtP php-cron root@104.236.242.31:/root/docks/lordswar/php-cron
rsync -avhtP forum/ root@104.236.242.31:/root/docks/lordswar/forum
rsync -avhtP web/ root@104.236.242.31:/root/docks/lordswar/web
rsync -avhtP lordswar/ root@104.236.242.31:/root/docks/lordswar/lordswar

