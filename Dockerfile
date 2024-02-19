FROM php:8.2-fpm-buster

RUN apt update -y
RUN apt install sudo nginx supervisor curl tar tor -y

RUN mkdir -p /var/log/php-fpm/
COPY default /etc/nginx/sites-enabled/default
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY aut.sh /etc/aut.sh

WORKDIR /var/www/work/
COPY ./main/ /var/www/work/

WORKDIR /var/www/html/
COPY ./tor/ /var/www/html/

RUN chmod -R 777 /var/www/html /var/www/work

RUN sed -i '71, 72 s/^#//' /etc/tor/torrc

RUN chmod -R 777 /var/lib/tor \
    && mkdir -p /var/lib/tor/hidden_service \
    && chmod 700 /var/lib/tor/hidden_service  

RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

CMD [ "/usr/bin/supervisord" ]
