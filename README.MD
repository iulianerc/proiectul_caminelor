## Laravel REST API sample

### Prerequisites
- PHP 7.4^ CLI
- PHP Composer 2.0^
- Docker
- Docker-compose

### How to run project

#### Using shell script
**Change directory to project directory** and **set up database connection** then run script:
 - For Windows `shell\setup.bat`
 - For Linux `shell/setup.sh`

#### Manual
You can use `make` commands if there is Make GNU on your machine

1. Build docker containers
    - `docker-compose build`
    - `make docker.build`
2. Start api services
    - `docker-compose up -d`
    - `make docker.start`
3. Run proxy server service in docker container
    - `docker run -d -p 80:80 -v ~/nginx/vhost.d:/etc/nginx/vhost.d:ro --name nginx-proxy --restart=always -v /var/run/docker.sock:/tmp/docker.sock:ro jwilder/nginx-proxy`
    - `make docker.proxy`
4. Update composer dependencies
    - `docker-compose exec app composer update`
    - `make composer.update`
5. Migrate local database(in docker container)
    - `docker-compose exec app php artisan migrate`
    - `make artisan.migrate`
6. Run seeds
    - `docker-compose exec app php artisan db:seed`
    - `make artisan.seed`
7. Install laravel passport
    - `docker-compose exec app php artisan passport:install`
    - `make passport.install`

### Links
 - [PHP Composer](https://getcomposer.org/download/)
 - [Make GNU for Windows](http://gnuwin32.sourceforge.net/packages/make.htm)
 - [Docker for Windows](https://docs.docker.com/docker-for-windows/install/)
