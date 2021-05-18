echo 'Start project setup';

# Build all docker services
docker-compose build;

# Start all docker services
docker-compose up -d;

# Start proxy container
PROXY_CONTAINER=$(docker ps | grep 'jwilder/nginx-proxy');
if [ ! "$PROXY_CONTAINER" ]
then
	docker run -d \
		-p 80:80 \
		-v ~/nginx/vhost.d:/etc/nginx/vhost.d:ro \
		--name nginx-proxy \
		--restart=always \
		-v /var/run/docker.sock:/tmp/docker.sock:ro jwilder/nginx-proxy;
fi

# Update composer dependencies
docker-compose exec app composer update;

# Migrate local database(in docker container)
docker-compose exec app php artisan migrate;

# Run seeds
docker-compose exec app php artisan db:seed;

# Install laravel passport
docker-compose exec app php artisan passport:install --force;

echo -e '\033[0;32mDone';
