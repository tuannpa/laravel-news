# Laravel News App

**Prerequisites**

- Install php 8 or above, composer 2.0.
- Install GIT.

---------------
**Project setup**

1. Copy .env.example to .env

2. Run composer install to fetch all necessary Laravel dependencies.

````
composer install
````

3. Run the following command to generate application key.

````
php artisan key:generate
````

4. Set permissions to storage directory (If you want to build oauth feature).

````
sudo chmod 775 -R storage // Give read permission to storage folder as the oauth key is stored in here
````

5. Run migration and data seeder.

````
php artisan migrate && php artisan db:seed
````

6. Run application.

````
php artisan serve
````

7. The application should be up and running at: ``http://127.0.0.1:8000/``