# laravelBlog

## Reason

This project was made with the purpose to study and put in practice more advanced Laravel concepts.

## The idea

Well, this project is a blog, where a user can create posts and have his own profile with his posts,
every post has a creator that is the user who made the post, and accept an image, a title and a text that explain
the post itself.
<br>
A user also can update his profile, with his bio (description), have his own username which can also be changed
and have his image profile, that by default is a pikachu image, who doesn't like pikachu!? right?
<br>
The project have a simple authorization layer, that is made by policies, the policies only authorize the post
creator to change or delete a post information, and only the user itself can change his information.

## Install the project

to install the project in your machine follow the steps below

```
# clone the project
$ git clone git@github.com:thalesmengue/laravelBlog.git

# install the dependencies
$ composer install

# make a copy of the .env file
$ cp .env.example .env

# set the environment variables from your database to the .env file

# generate a new key to the project
$ php artisan key:generate

# run the migrations
$ php artisan migrate

# seed the database with the categories
$ php artisan db:seed --Class=CategorySeeder

# run the application
$ php artisan serve
```

## Technologies
- [PHP 8.0.2](https://www.php.net/docs.php)
- [Laravel 9.19](https://laravel.com/docs/9.x)
- [TailwindCSS 3.1.0](https://tailwindcss.com/docs/installation)
