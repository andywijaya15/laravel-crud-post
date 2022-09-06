<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel CRUD

Im learning laravel with CRUD using Laravel Storage to store image to server.

- Go to working directory of this project then type composer install in terminal to install dependencies of composer
- Then rename .env.dev to .env
- Then type ./vendor/bin/sail up -d to run the project to localhost:80
- To upload image to Server we must link storage folder to public/storage folder with command ./vendor/bin/sail php artisan storage:link
- Type ./vendor/bin/sail php artisan migrate to migrate database from laravel to mysql(if error,check your mysql in docker container,maybe its not runinng already)
- Type ./vendor/bin/sail down to stop project