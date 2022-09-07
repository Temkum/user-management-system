# Laravel fortify

- install laravel
- install fortify `composer require laravel/fortify`
- next publish your assets `php artisan vendor:publish --provider="Laravel\\Fortify\\FortifyServiceProvider"`

> configure your db and migrate db tables

## install bootstrap and configure

```
npm install bootstrap
npm install sass
npm install sass-loader`

```

- modify webpack.mix.js file to compile sass and then run `npm run dev`

## Build the dashboard ui

## User registration - login and logout

## database schema

- add roles using hasMany() relationship btwn users
- create migration `php artisan make:model Role -a`
- create a link table which allows us to link our roles in many to many relationship `php artisan make:migration create_role_user_table`

## Seed data

- to create seeder `php artisan make:seeder UserSeeder`
- also use tinker to test the seeder `User::factory()->make();`
- if you want to seeder a particular number of users then use `User::factory()->count()->make();`

- to create using factory modify the factory file and then use tinker to test `Role::factory()->count(5)->make();`
- after modifying the factory files and db seeders then run: `php artisan db:seed`

> if you want to start off with a clean db run `php artisan migrate:refresh --seed` if you want to also seed after refreshing your db

## display users as admin

- setup routes
- first create controllers with resource flag `php artisan make:controller Admin\\UserController -r`

## create crud UI for admin panel

## delete method and pagination

- seed data using tinker: `User::factory()->count(20)->create();`

## assign roles: edit and create users

> mutators allow you to mutate the state of a given field on a model

## Flash message and form validation

- add a notification system to push messages back to the user

## protecting pages with gates

- check users and grant access to prevent users from performing certain actions using laravel gates
