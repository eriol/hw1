pod_name := "wp24-hw1"

start:
    podman pod start {{pod_name}}

stop:
    podman pod stop {{pod_name}}

make-containers:
    #!/usr/bin/env bash
    id=$(buildah from --pull docker.io/php:8.3-apache-bookworm)
    buildah run $id docker-php-ext-install pdo pdo_mysql
    buildah commit $id wp24-php-apache

    mkdir ../mysqldb

    podman run --detach \
        --pod new:{{pod_name}} \
        --publish 127.0.0.1:8080:80 \
        --name hw1-php \
        --volume "$PWD":/var/www/html \
        wp24-php-apache

    podman run \
        --detach \
        --pod {{pod_name}} \
        --name hw1-mysql \
        --env MYSQL_ROOT_PASSWORD=hw1 \
        --volume ../mysqldb:/var/lib/mysql \
        docker.io/mysql:8
