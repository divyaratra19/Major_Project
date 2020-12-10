FROM ubuntu:16.04
MAINTAINER Abhinav Rawat <rawatabhinav99@gmail.com>

RUN apt-get update -y

RUN apt-get install -y apache2

RUN apt-get install -y php7.0 libapache2-mod-php7.0 php7.0-cli php7.0-common php7.0-mbstring php7.0-gd php7.0-intl php7.0-xml php7.0-mysql php7.0-mcrypt php7.0-zip

RUN rm -rf /var/www/html/*
ADD auth2 /var/www/html

RUN chown -R www-data:www-data /var/www
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

EXPOSE 80

CMD ["usr/sbin/apache2ctl", "-D", "FOREGROUND"]
