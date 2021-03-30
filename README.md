<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project
An example of using oauth with laravel and passport.

## How to run the project
```bash
$ docker-compose up
```

### First steps
After running the project, run the command below to install the passport.
```bash
$ docker-compose exec server php artisan passport:install
```

Now we are going to create our key pair for the client.
```bash
$ docker-compose exec server php artisan passport:client

 Which user ID should the client be assigned to?:
 > <press enter>

 What should we name the client?:
 > Laravel Client App

 Where should we redirect the request after authorization? [http://localhost/auth/callback]:
 > http://localhost:8001/auth/callback

New client created successfully.
Client ID: <CLIENT_ID>
Client secret: <CLIENT_SECRET>
```

Copy the CLIENT_ID and CLIENT_SECRET and paste it into the `.env` of the `client` application
```dosini
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=oauth_laravel_client
DB_USERNAME=oauth_laravel_client
DB_PASSWORD=oauth_laravel_client

CLIENT_ID=<CLIENT_ID>
CLIENT_SECRET=<CLIENT_SECRET>
REDIRECT_URL=http://localhost:8001/auth/callback
API_URL=http://localhost:8000/api/
```

And paste this in the `.env` on the `server`

```dosini
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=oauth_laravel_server
DB_USERNAME=oauth_laravel_server
DB_PASSWORD=oauth_laravel_server
```

Now open your browser and access the url [http://localhost:8001/](http://localhost:8001/) which is the client

## and good fun!