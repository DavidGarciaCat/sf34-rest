# Symfony 3.4 RESTful API

Please note this project was built just for testing and educational purposes.

## Prerequisites

Download and install Docker: https://www.docker.com/community-edition

### Docker schema

This project provides by default the following Docker Containers:
- Nginx v1.12 on port 80
- PHP v7.0 FPM on port 9000
- MySQL v5.5 on port 3306 with `root` user and `password` password

![Docker Containers Schema](https://github.com/DavidGarciaCat/sf34-rest/blob/master/Docker/Resources/image/docker-containers-schema.jpg)

## Download and install

Clone this Git repository:

```bash
git clone git@github.com:DavidGarciaCat/sf34-rest.git
```

Go to the project's folder:

```bash
cd sf34-rest
```

And create your `.env` file based on `.env.dist` (feel free to update the provided details by the ones you need to run your project):

```bash
cp .env.dist .env
```

Build and run all Docker containers: 

```bash
docker-compose build
docker-compose up
```

Alternatively, you can build and start all Docker containers:

```bash
docker-compose build
docker-compose start
```

If you opted to start - instead of run - the containers, then you might need to stop them:

```bash
docker-compose stop
```

You can get a list of all containers and their current status (please note that container names might change on your own environment):

```bash
docker-compose ps

     Name                    Command              State           Ports
--------------------------------------------------------------------------------
sf34_database_1   docker-entrypoint.sh mysqld     Up      0.0.0.0:3306->3306/tcp
sf34_nginx_1      nginx -g daemon off;            Up      0.0.0.0:80->80/tcp
sf34_php_1        docker-php-entrypoint php-fpm   Up      9000/tcp
```

So you can run commands for a given container, like run the container's shell:

```bash
docker exec -it sf34_php_1 bash
```

Or you can use it to generate your own database, that will be used through your database connection:

```bash
docker exec -it sf34_php_1 php /code/bin/console doctrine:database:create --if-not-exists
```

## How to access to the API endpoints

Given Nginx runs on port 80, you can browse your own local environment (http://localhost/api/ping) to verify if the installation worked, where you should see the following output:

```json
{
    "ping": "pong"
}
```

Or you can browse the Environment endpoint (http://localhost/api/environment) to check the installed versions of Nginx and PHP, where you should see an output like this:

```json
{
    "web_server_version": "nginx/1.12.2",
    "php_version": "7.0.27"
}
```

## How To Remove Docker Images, Containers, and Volumes

Docker provides a single command that will clean up any resources — images, containers, volumes, and networks — that are dangling (not associated with a container):

```bash
docker system prune
```

To additionally remove any stopped containers and all unused images (not just dangling images), add the -a flag to the command:

```bash
docker system prune -a
```

## How to add more Docker containers and services

### Upgrade your PHP version

In the event you want to use Symfony 4.x instead of Symfony 3.4 (or if your project has other dependencies that require a newer PHP version) then you can update the required PHP image on your `Docker/Config/PHP/Dockerfile` file, replacing the PHP image from...

```dockerfile
FROM php:7.0-fpm
```

...to...

```dockerfile
FROM php:7.1-fpm
```

...or - alternatively - you can just get the latest PHP version:

```dockerfile
FROM php:fpm
```

### PHP My Admin

You might need to check your MySQL database. If that's the case then you might want to download the Docker Container for PHP My Admin, a well known PHP tool to manage your MySQL database.

You will need to update your `docker-compose.yml` file in order to add this content:

```yaml
services:
  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    links:
      - database:db
    ports:
      - 8082:80
    environment:
      - PMA_USER=root
      - PMA_PASSWORD=password
      - PHP_UPLOAD_MAX_FILESIZE=100MB
```

## Thanks

This repository has been created just for testing and educational purposes, based on these 2 examples:
- https://gist.github.com/michaelneu/2ca7987ef00fa3fbe4fd7b9c07834cc7
- https://github.com/maxpou/docker-symfony
