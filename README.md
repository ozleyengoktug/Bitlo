<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Route

    api/company/register : Add new company to database if email/company_name is not exist
    api/company/add-package : Assign package to company if company has not have any package
    api/company/packages : Get all packages of company and their informations

## Middleware

    ValidationMiddleware : Handle all controls (If company exist, request is null, ...)

## Seeder

    Faker is generate synthetic data (name, date etc.)   
    I use 1 seeder on this project which can handle primary key very easy.

## Config

    Timezone : Europe/Istanbul

## Bitlo.sql

    DB Schema's .sql file

## Bitlo.postman_collection.json

    Postman json data