FROM nginx:alpine

RUN echo "Asia/shanghai" > /etc/timezone
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime

COPY assets /usr/share/nginx/html/assets
COPY nginx.conf /etc/nginx/nginx.conf
COPY 404.html  /usr/share/nginx/html/404.html
