@echo off

echo Start project setup

:: Build all docker services
docker-compose build;


:: Start all docker services
docker-compose up -d

:: Start proxy container

docker run -d ^
    -p 80:80 ^
	-v ~/nginx/vhost.d:/etc/nginx/vhost.d:ro ^
	--name nginx-proxy ^
	--restart=always ^
	-v /var/run/docker.sock:/tmp/docker.sock:ro jwilder/nginx-proxy

:: Update composer dependencies
docker-compose exec app composer update

:: Migrate local database(in docker container)
docker-compose exec app php artisan migrate

:: Run seeds
docker-compose exec app php artisan db:seed

:: Install laravel passport
docker-compose exec app php artisan passport:install --force

echo Done
