# AJAX CRUD for Laravel 5.6
## Installation

Clone the repo
```
https://github.com/7arona/laravel-crud-record.git
```

Move to the newly created folder and install all dependencies:
```
cd laravel-crud-record
composer install
```

Create a new database, for example with phpMyAdmin. Then open the .env.example file, edit it to match your database name, username and password and save it as .env file. Once done, build tables with the following command:
```
php artisan migrate
```
Finally, generate the application key 
```
php artisan key:generate
```

Open your favorite browser and visit the newly created app.

## Features
1. Create a new post
2. Show a post
3. Edit a post
4. Delete a post
5. Mark a post as published/unpublished

## Demo
```
https://www.youtube.com/watch?v=VrDXEECXkNU
```
