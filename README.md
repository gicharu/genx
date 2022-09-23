<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Genx Institute Task

## Requirements
- PHP 8.0+
- MySQL 5.6+ / MariaDB 10.*
- Apache 2.4 / Nginx
- npm
- composer
- REST Client

## Installation instructions
- [Clone the repo and save it a folder of your choice](https://github.com/gicharu/genx).
- Create a vHost (It will URLs cleaner especially for the API).
- Copy .env.example to .env and update it with your database settings. Ensure the database set in the config exists
- Run `composer install`
- Run `php artisan migrate --seed` or `php artisan migrate:refresh --seed`
- Run `npm -i` then `npm run dev`

## Usage

### Web

- Navigate to your web root to load the authors page
- The site navigation links are located on the sidebar on the left
- CRUD operations are available for authors and books

### API
- Using a REST client, navigate to [webroot]/api/authors
- Below is a list of some endpoints, to see all endpoints run `php artisan route:list --path=api`

| Method    | Endpoint                                                     | Description                | Params |
|-----------|--------------------------------------------------------------|----------------------------|--------|
| POST      | api/createAuthor                                             | Create author              | `string` first_name, `string` surname|
| GET/HEAD  | api/getAuthor                                                | List authors & their books | N/A|
| GET/HEAD  | api/getBooks| List books & their authors| ==filters== `string` authorName `string` bookName|
