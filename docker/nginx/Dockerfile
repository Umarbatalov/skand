FROM nginx:1.17.5-alpine

LABEL maintainer="umarbatalov@mail.ru"

WORKDIR /srv

ADD docker/nginx/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
