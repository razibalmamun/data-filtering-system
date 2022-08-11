# Top Secret CIA Database

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
> Matching results cached in Redis for 60 seconds. Following requests for the same combination of filtering parameters (birth year, birth month) not query database before cache expires. 
> 
> If user changes filter parameters, Redis cache for old results can invalidated.
> 
> Displaying the users in a paginated table, with 20 rows per page. Pagination retrieved data from Redis cache if it is available.
> 
> Yes, Page number must not part of cache key. Instead, all rows from database that match filtering criteria (month, year) stored in Redis, and pagination retrieved only the required rows from Redis.


## Functionalities

-   [x] Generate Short URL with unique 6 character alphanumeric hash per each long URL.
-   [x] Recognizes duplicate long url, and returns previously generated short URL instead of creating a new.
-   [x] All submitted Long URL's are validated by "Google Safe Browsing" API. Unsafe URLs are not processed.
-   [x] Upon opening the short URL, user gets permanent redirect (301) to the long URL.
-   [x] Short URLs are still valid even if a subfolder/string inserted before the shortcode in short url (e.g.: example.com/something/[hash]).
-   [x] Developed using Laravel + VueJs + TailwindCSS

## Demo

**Visit for Demo** ---> [https://ushort.ashrafulislam.info](https://ushort.ashrafulislam.info)

## Local Installation

Clone the repository in your local machine using `git clone https://github.com/razibalmamun/top-secret-cia.git`

### _Requirements_ for Local Environment

-   [x] PHP Version 8.0
-   [x] NodeJs Version 14 (Have tested on v14, but should be okay with v12 also)
-   [x] MySql version 5.7

### Running the Application

1.  Open terminal/command promt from inside the `project folder` folder
2.  run command `cp .env.example .env`
3.  update `.env` file database informations according to your local machine.
4.  run command `composer install`
5.  run command `php artisan migrate`
6.  run command `npm install`
7.  run command `npm run dev` or `npm run prod`
8.  run command `php artisan serve`
    > At this point you have the application ready to short urls
    > ready to browse. Just open your browser and navigate to
    > `http://localhost:8000` and you should see the URL-Shortener site home page

-   Laravel part
    -   Developed following **SOLID** _Principles_
    -   Followed **Service** _Pattern_ where application
    -   Seperate **Form Request** classes for each forms
-   VueJs part
    -   **Reusable Component** based structure
    -   **Loader** on Axios call
    -   **Vue3 Composition API** used
-   Used TailwindCSS

## Scope of Improvements

1. **Unit Testing** shoudld be implemented.
2. **User Authentication and Api** can be provided to use this in a bigger scale.

## To Do

-   [ ] Unit Test Cases
