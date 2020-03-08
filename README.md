

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/turahe/blog/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/turahe/blog/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/turahe/blog/badges/build.png?b=master)](https://scrutinizer-ci.com/g/turahe/blog/build-status/master)
[![Build Status](https://travis-ci.org/turahe/blog.svg?branch=master)](https://travis-ci.org/turahe/blog)
[![Latest Stable Version](https://poser.pugx.org/turahe/blog/v/stable)](https://packagist.org/packages/turahe/blog)
[![Total Downloads](https://poser.pugx.org/turahe/blog/downloads)](https://packagist.org/packages/turahe/blog)
[![License](https://poser.pugx.org/turahe/blog/license)](https://packagist.org/packages/turahe/blog)

## About Turahe


## Installation

Development environment requirements :
- [Docker](https://www.docker.com) >= 18.09 CE
- [Docker Compose](https://docs.docker.com/compose/install/)

Setting up your development environment on your local machine :

```bash
$ git clone https://github.com/turahe/blog.git
$ cd blog
$ cp .env.example .env
$ docker-compose run --rm --no-deps blog-server composer install
$ docker-compose run --rm --no-deps blog-server php artisan key:generate
$ docker-compose run --rm --no-deps blog-server php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider"
$ docker-compose run --rm --no-deps blog-server php artisan storage:link
$ docker run --rm -it -v $(pwd):/app -w /app node yarn
$ docker-compose up -d
```

Now you can access the application via [http://localhost:8000](http://localhost:8000).

**There is no need to run ```php artisan serve```. PHP is already running in a dedicated container.**

## Before starting

You need to run the migrations with the seeds :

```bash
$ docker-compose run --rm blog-server php artisan migrate --seed
```

This will create a new user that you can use to sign in :
```yml
email: wachid@outlook.com
password: secret
```

And then, compile the assets :

```bash
$ docker run --rm -it -v $(pwd):/app -w /app node yarn dev
```

Starting job for newsletter :

```
$ docker-compose run blog-server php artisan tinker
> PrepareNewsletterSubscriptionEmail::dispatch();
```

## Useful commands

Seeding the database :

```bash
$ docker-compose run --rm blog-server php artisan db:seed
```

Running tests :

```bash
$ docker-compose run --rm blog-server ./vendor/bin/phpunit --cache-result --order-by=defects --stop-on-defect
```

Running php-cs-fixer :

```bash
$ docker-compose run --rm --no-deps blog-server ./vendor/bin/php-cs-fixer fix --config=.php_cs --verbose --dry-run --diff
```

Generating backup :

```bash
$ docker-compose run --rm blog-server php artisan backup:run
```

Generating fake data :

```bash
$ docker-compose run --rm blog-server php artisan db:seed --class=DevDatabaseSeeder
```

Discover package

```bash
$ docker-compose run --rm --no-deps blog-server php artisan package:discover
```

In development environnement, rebuild the database :

```bash
$ docker-compose run --rm blog-server php artisan migrate:fresh --seed
```

## Accessing the API

Clients can access to the REST API. API requests require authentication via token. You can create a new token in your user profile.

Then, you can use this token either as url parameter or in Authorization header :

```bash
# Url parameter
GET http://blog.wah/api/v1/posts?api_token=your_private_token_here

# Authorization Header
curl --header "Authorization: Bearer your_private_token_here" http://blog.wah/api/v1/posts
```

API are prefixed by ```api``` and the API version number like so ```v1```.

Do not forget to set the ```X-Requested-With``` header to ```XMLHttpRequest```. Otherwise, Laravel won't recognize the call as an AJAX request.

To list all the available routes for API :

```bash
$ docker-compose run --rm --no-deps blog-server php artisan route:list --path=api
```

## License

This project is released under the [MIT](http://opensource.org/licenses/MIT) license.
