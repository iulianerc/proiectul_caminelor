help:
	@echo "INN"
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  docker.proxy       Start nginx proxy container"
	@echo "  docker.start       Create and start containers"
	@echo "  docker.stop        Stop and clear all services"
	@echo "  docker.logs        Follow log output"
	@echo "  composer.update    Update composer packages"
	@echo "  composer.dump      Update the autoloader because of new classes in a classmap package"
	@echo "  artisan.generate   Generates artisan key"
	@echo "  artisan.migrate    Run migrations"
	@echo "  artisan.seed       Run seeds"
	@echo "  passport.install   Passport install"
	@echo "  route.list         List of routes"
	@echo "  route.clear        Clear all cached routes"
	@echo "  route.cache        Cache routes"
	@echo "  config.clear       Clear config cache"

docker.build:
	@docker-compose build
docker.proxy:
	@docker run -d -p 80:80 -v ~/nginx/vhost.d:/etc/nginx/vhost.d:ro --name nginx-proxy --restart=always -v /var/run/docker.sock:/tmp/docker.sock:ro jwilder/nginx-proxy

docker.start:
	@docker-compose up -d

docker.stop:
	@docker-compose down -v

docker.logs:
	@docker-compose logs

composer.update:
	@docker-compose exec app composer update

composer.install:
	@docker-compose exec app composer install

composer.dump:
	@docker-compose exec app composer dump-autoload

artisan.generate:
	@docker-compose exec app php artisan key:generate

artisan.migrate:
	@docker-compose exec app php artisan migrate

artisan.migrate.rollback:
	@docker-compose exec app php artisan migrate:rollback

artisan.seed:
	@docker-compose exec app php artisan db:seed

route.list:
	@docker-compose exec app php artisan route:list

route.clear:
	@docker-compose exec app php artisan route:clear

route.cache:
	@docker-compose exec app php artisan route:cache

passport.install:
	@docker-compose exec app php artisan passport:install --force

config.clear:
	@docker-compose exec app php artisan config:clear
	@docker-compose exec app php artisan cache:clear

db.cli:
	@docker-compose exec db mysql -u root -p
db.reset:
	@docker-compose exec app php artisan migrate:fresh --seed
	@docker-compose exec app php artisan passport:install --force
