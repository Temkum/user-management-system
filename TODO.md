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
