include .env

start:
	make build up prepare seed

up:
	sudo docker-compose up -d

down:
	sudo docker compose down -v

build:
	sudo docker-compose build

restart:
	sudo docker-compose restart $(filter-out $@,$(MAKECMDGOALS))

prepare:
	sudo docker-compose exec php composer install
	sudo docker-compose exec php php artisan migrate
	sudo docker-compose exec php php artisan optimize:clear
	sudo docker-compose exec php php artisan key:generate

seed:
	sudo docker-compose exec php php artisan migrate:fresh --seed

logs:
	sudo docker-compose logs $(filter-out $@,$(MAKECMDGOALS))

db:	
	sudo docker compose exec mysql mysql -u$(DB_USERNAME) -p$(DB_PASSWORD) $(DB_DATABASE)

exec: 
	sudo docker-compose exec $(filter-out $@,$(MAKECMDGOALS))