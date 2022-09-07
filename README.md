<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel CRUD

Im learning laravel with CRUD using Laravel Storage to store image to server.

- Go to working directory of this project then type composer install in terminal to install dependencies of composer
- Then rename .env.dev to .env
- Then type ./vendor/bin/sail up -d to run the project to localhost:80
- To upload image to Server we must link storage folder to public/storage folder with command ./vendor/bin/sail php artisan storage:link
- Type ./vendor/bin/sail php artisan migrate to migrate database from laravel to mysql(if error,check your mysql in docker container,maybe its not runinng already)
- Type ./vendor/bin/sail down to stop project

## What i learned from this project

### Laravel Sail
- I can develop laravel easily with Laravel Sail. Laravel Sail is docker-compose that include all i need in laravel.It read .env and make mysql,mailhog,selenium and php so i dont need install it all one by one again.

### Laravel Migration
- I can makes table structure in my laravel and when i run php artisan migrate it will create table in database from what i created in database/migration

### Laravel Traits
- I can make resuabel function with Traits, it makes my controller clean. But there are no artisan command to make it,I must make it manually. After that i can use it in Controller. Dont forget to use class of Traits inside the class of Controller.

### Laravel FormRequest
- Write validation in controller is too long so i seperate it with Laravel FormRequest. First run php artisan make:request nameofYourValidatorNamed then laravel will makes file in app/Http/Requests/nameofYourValidatorNamed.php. Then set the value of authorize function from false to true then set the rules in rules function.