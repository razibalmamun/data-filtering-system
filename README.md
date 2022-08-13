# Data Filtering System Using  Laravel, PostgreSQL & Redis

<p align="center"><a href="https://laravel.com" target="_blank">
<img src="./github/laravel.svg" width="80"></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://redis.io/" target="_blank" rel="noopener noreferrer"><img width="250" src="./github/redis.png" alt="Redis logo"></a>
<a href="https://www.postgresql.org/" target="_blank">
      <img alt="PostgreSQL" width="80" src="./github/postgresql.png">
    </a>
</p>

## Features

> Using Laravel, PostgreSQL, and Redis, implemented a system that allows filtering the attached dataset by person's birth year, or birth month. or both.
> 
> Matching result is cached in Redis for 60 seconds. Following requests for the same combination of filtering parameters (birth year, birth month) do not query database before cache expires. 
> 
> If user changes filter parameters, Redis cache for old results are can invalidated.
> 
> Displaying the users in a paginated table, with 20 rows per page. Pagination retrieves data from Redis cache if it is available.
> 
> Page number is not part of the cache key. Instead, all rows from database that match filtering criteria (month, year) stored in Redis, and pagination retrieves only the required rows from Redis.


## Local Installation

Clone the repository in your local machine using `git clone https://github.com/razibalmamun/data-filtering-system.git`

### Requirements for Local Environment

-   [x] PHP Version 7.4 | 8.1
-   [x] PostgreSQL Version 13.2-2
-   [x] Redis Server Version 3.0.504

### Redis on Laragon
Redis is no longer supported in Windows, but the version 3.2.1 is still available to use [(ref)](https://redis.com/blog/redis-on-windows-8-1-and-previous-versions/#:~:text=Officially%2C%20Redis%20is%20not%20supported,ported%20to%20Windows%20by%20MSOpenTech.), so that's why laragon contains version 3.* only.
So, if you are using Laragon, you can follow this link to install `Redis` --> [Redis on Laragon](https://dev.to/dendihandian/installing-php-redis-extension-on-laragon-2mp3)

### Adding PostgreSQL to Laragon
You can find any version you want to install from [enterprisedb.com/download-postgresql-binaries](https://www.enterprisedb.com/download-postgresql-binaries) and make sure it supports your windows machine. So, if you are using Laragon you can follow this link to install `PostgreSQL` --> [PostgreSQL on Laragon](https://dev.to/dendihandian/adding-postgresql-to-laragon-2kde)

Note: if you face any issue about `pdo_pgsql` extension like laravel error `extension not found`, please write full extension name like `php_pdo_pgsql.dll`, not only `pdo_pgsql` in your `php ini` file.

`extension=php_pdo_pgsql.dll`
`extension=php_pgsql.dll`

### Running the Application

1.  Open terminal/command promt from inside the `project folder` folder
2.  run command `cp .env.example .env`
3.  update `.env` file database information according to your local machine.
4.  run command `composer install`
5.  run command `php artisan migrate`
6.  run command `php artisan serve`
7.  Now it's ready to browse. Just open your browser and enter `http://localhost:8000`

### Import Customer Data From CSV to PostgreSQL
You can find `test-data\test-data.csv` csv file inside the `project folder`. Then you can run `SQL Shell (psql)` or login into your `PostgreSQL`. To connect using database, right click on database name. Now you can click `PSQL Tool`. After clicking `PSQL Tool` a tarminal will open on your right side to write sql command.

<img width="820" src="./github/fsql.jpg" alt="PSQL Tool">

For example my `test-data.csv` file location is `C:\Users\User\Downloads\test-data.csv`. So, run following command on your terminal.

`COPY customers (id, email, name, birthday, phone, ip, country) FROM 'C:\Users\User\Downloads\test-data.csv' DELIMITER ',' CSV HEADER;`

## Development Features
-   Laravel part
    -   Developed by following **SOLID Principles**    
    -   Seperated **Form Request** classes for filtering form
    -   Followed **Service Pattern** in the application
-   Used PostgreSQL
-   Used Redis
-   Unit Testing implemented. run command `php artisan test` 
