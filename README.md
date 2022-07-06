<div align="center">
  <h1>Book catalog</h1>
  
  <br>  
  
  ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
  ![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
  
</div>

<br>

Laravel API to manage a book catalog

Features:

Authors module:
* **C**reate Author
* **R**ead author
* **U**pdate author
* **D**elete author
* Assign book to author
* Remove book to author

Books Module:
* **C**reate book
* **R**ead book
* **U**pdate book
* **D**elete book
* Assign author to book
* Remove author to book

Genres Module:
* **C**reate genre
* **R**ead genre
* **U**pdate genre
* **D**elete genre

## ER Diagram
![ERD](https://user-images.githubusercontent.com/99099658/177426095-69840b58-5ea2-446f-92a8-df6ede1b57b2.png)

## Requeriments
 - [Composer](https://getcomposer.org/download/)

## Installation
### Write permissions:
```bash
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache    
```

### Install dependencies:
```bash
composer install
```

### Generate configuration file
In the root of the folder rename the file `.env.example` to `.env` or use 
```bash
cp .env.example .env
```

### Generate API Key
```bash 
php artisan key:generate
```

### Migrations.
  * Create a database using phpmyadmin or the mysql console.
  * Open the .env file from Generate Configuration File.
  * They are placed in the MySQL section (line 11 approx.)
  * There you edit the value of the DB_DATABASE field, placing the name of the database you created. The result is DB_DATABASE=databaseName.
  * Then just run the migrations with
    ```bash
    php artisan migrate --seed
    ```
    **Generates migrations and populates the DB with default data**

  * Utilities  
    This deletes all the tables from the database
    ```bash
    php artisan db:wipe
    ```

    This deletes all the tables from the database and recreates all the tables. The --seed option populates the DB with default data
    ```bash
    php artisan migrate:refresh --seed
    ```
    
### Starting a local development server
```bash
php artisan server
```


## Funcionality test
### Authors

https://user-images.githubusercontent.com/99099658/177465534-1da00a8d-18f6-482e-815f-51c4b60b3bbe.mp4

https://user-images.githubusercontent.com/99099658/177465565-d24cca36-7d68-4c6b-8ac5-558cefea5e89.mp4

https://user-images.githubusercontent.com/99099658/177465576-99f6e8ee-387a-4846-b205-5122afb49c76.mp4

https://user-images.githubusercontent.com/99099658/177465622-2099af66-a39c-44b1-b894-4a53947d54f9.mp4

https://user-images.githubusercontent.com/99099658/177465637-9c06830e-3ebf-4fa4-930e-ea33f6a5574d.mp4

https://user-images.githubusercontent.com/99099658/177465665-03e3665e-c70c-4eaa-bf12-d0ce9b1d9ffb.mp4

https://user-images.githubusercontent.com/99099658/177465681-6a158da0-e2ec-473c-ba3c-024953e9f731.mp4


### Genres

https://user-images.githubusercontent.com/99099658/177465715-53e6058b-7439-4421-a519-b7a69d60bb94.mp4

https://user-images.githubusercontent.com/99099658/177465724-a2fb765f-dbeb-44f2-b1e3-45594a98153f.mp4

https://user-images.githubusercontent.com/99099658/177465735-dcfe3517-b22b-41cc-9038-1fadd4eef0c3.mp4

https://user-images.githubusercontent.com/99099658/177465746-392c5f2c-b880-4a7d-a1d9-d691913484cb.mp4

https://user-images.githubusercontent.com/99099658/177465759-96fbbf14-2064-4b87-85f3-a2f5d70093fd.mp4


### Books

https://user-images.githubusercontent.com/99099658/177465782-facbce97-2c11-440d-abfa-065a1c902067.mp4

https://user-images.githubusercontent.com/99099658/177465792-72c4cc04-8841-48a7-bc5a-ed20b861b040.mp4

https://user-images.githubusercontent.com/99099658/177465795-234c8454-671b-42f5-8ea3-3768c94da357.mp4

https://user-images.githubusercontent.com/99099658/177465804-b95d94c3-bb30-4ede-a803-ec5b2dc9ebad.mp4

https://user-images.githubusercontent.com/99099658/177465809-a4cde781-2600-4b62-a35f-0bd3086b3b69.mp4

https://user-images.githubusercontent.com/99099658/177465825-f0d37aa0-bcaa-44a5-9b7a-e1ad62f2cff1.mp4

https://user-images.githubusercontent.com/99099658/177465816-1631af3f-16e9-4083-b025-96ffd686b0e7.mp4
