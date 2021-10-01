# P.S. keep in mind that this file is used for local deployment only,
# production Dockerfile is in CI/CD repo http://git.innoscripta.com/devops/innos-microservices/cicd-main-fragenliste-api

FROM php:8.0-alpine AS prebuild
WORKDIR /app
COPY . /app
COPY ./.docker/supervisor.conf /etc/supervisor/supervisord.conf
COPY ./.docker/app-start /usr/local/bin/app-start
RUN chmod +x /usr/local/bin/app-start;

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
	&& docker-php-ext-install pdo_mysql \
	&& apk add --no-cache git \
	&& apk add --no-cache nodejs \
	&& apk add --no-cache npm \
	&& apk add --update busybox-suid supervisor autoconf \
	&& chown -R root:root /app
USER root

FROM prebuild
USER root
RUN cp .env.example .env \
	&& composer i --no-dev -a --no-progress \
	&& composer clear-cache \
	&& php artisan key:generate
USER root
EXPOSE 8000/tcp
#CMD php artisan serve --host=0.0.0.0
CMD app-start
