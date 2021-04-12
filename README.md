## About This Project

This project is an ad scheduler


## Manual Setup

requirements :
-php >= 7.x
-composer
-mysql


Steps :
1- run the following commands :
- "composer install"
- "cp .env.example .env"
- "php artisan key:generate"
- "php artisan storage:link"
2- create your database
3- edit .env file with your environment variables
4- run the following commands 
- "php artisan migrate --seed"
- "php artisan serve"
5- open a new terminal inside main project dir and run this command "php artisan schedule:work"


## Docker Setup

requirements :
-docker
-docker-compose
-php >= 7.x
-composer

1- run the following commands :
- "cp .sail.env.example .env"
- "composer install"
2- if required, edit .env file with your environment variables
3- run the following command :
- "./vendor/bin/sail up -d && ./vendor/bin/sail artisan migrate --seed && ./vendor/bin/sail artisan schedule:work"

## Usage 

1- visit the home page
2- register and you will be redirected to the admin panel
3- click on 'add new ad' button on upper right side
4- fill in the data and submit
5- visit the home page again and see the results