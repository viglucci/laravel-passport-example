# laravel-passport-example

This repository contains:
- An example application that leverages Laravel Passport as a identity provider.
- An example application that consumes the identity provider via OAuth without a users database.

## Prerequisites

- PHP (7.2.7)
- Composer (1.10.x)

## Setup

### Identity Server

Dependency and environment setup:

```bash
cd identity-server \
&& composer install \
&& cp .env.example .env \
&& php artisan key:generate \
&& php artisan passport:install \
&& touch ./database/database.sqlite \
&& php artisan migrate \
&& npm install \
&& npm run dev \
&& cd ..
```

Create an OAuth Client:

```bash
php artisan passport:client --name="App Server OAuth Client" --redirect_uri="http://localhost:8000/login/oauth/callback"
```

Run the server when ready:

```bash
php artisan serve --port=8001
```

### App Server

Dependency and environment setup:

```bash
cd app-server \
&& composer install \
&& cp .env.example .env \
&& php artisan key:generate \
&& touch ./database/database.sqlite \
&& php artisan migrate \
&& npm install \
&& npm run dev \
&& cd ..
```

Update values for `LARAVELPASSPORT_KEY` and `LARAVELPASSPORT_SECRET` in `.env` with the values from the client created during the identity-server setup.

Run the server when ready (default port 8000):

```bash
php artisan serve
```