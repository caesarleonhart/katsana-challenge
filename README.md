## Running The Project

Pre-requisite Apps : Docker

- Clone the repo into your local machine.
- Use terminal to go to the project folder
- Run `docker-compose build` 
- Run `docker-compose up -d` 
- SSH into the project by using `docker exec -it app sh` command
- Run `composer install`
- Run `php artisan migrate`
- Add `127.0.0.1 local-laravel.com` in your host file
- Run `local-laravel.com:8333` in your browser