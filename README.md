# php-mvc-framework
Clone this project.
```
git clone https://github.com/yutotakakura/php-mvc-framework.git
cd php-mvc-framework
```
Start the container and go inside.
```
docker-compose up -d
docker-compose exec app bash
```
Start the build-in server.
```
composer update
cd public
php -S 0.0.0.0:8000
```