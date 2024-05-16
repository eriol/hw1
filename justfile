pod_name := "wp24-hw1"
php_container_name := "hw1-php"
database_container_name := "hw1-mysql"
database_data_path := "../mysqldb-hw1"

start:
    podman pod start {{pod_name}}

stop:
    podman pod stop {{pod_name}}

mysql:
    podman exec -ti {{database_container_name}} /bin/sh

make-containers:
    #!/usr/bin/env bash
    set -euxo pipefail

    id=$(buildah from --pull docker.io/php:8.3-apache-bookworm)
    buildah run $id docker-php-ext-install pdo pdo_mysql
    buildah commit $id wp24-php-apache

    id=$(buildah from --pull docker.io/mysql:8)
    buildah copy $id hw1.sql /docker-entrypoint-initdb.d
    buildah commit $id wp24-mysql

    mkdir {{database_data_path}}

    podman run --detach \
        --pod new:{{pod_name}} \
        --publish 127.0.0.1:8080:80 \
        --name {{php_container_name}} \
        --volume "$PWD":/var/www/html \
        wp24-php-apache

    podman run \
        --detach \
        --pod {{pod_name}} \
        --name {{database_container_name}} \
        --env MYSQL_ROOT_PASSWORD=${MYSQL_ROOT_PASSWORD} \
        --volume {{database_data_path}}:/var/lib/mysql \
        wp24-mysql

[confirm]
destroy: stop
    podman rm {{php_container_name}}
    podman rm {{database_container_name}}
    podman pod rm {{pod_name}}
    rm -rf {{database_data_path}}
