# laravel-passport-example

This repository contains:
- An example application that leverages Laravel Passport as a identity provider.
- An example application that consumes the identity provider via OAuth without a users database.

## Setup

```bash
cd identity-server \
&& composer install \
&& cp .env.example .env \
&& php artisan key:generate \
&& cd ..
```

```bash
cd app-server \
&& composer install \
&& cp .env.example .env \
&& php artisan key:generate \
&& cd ..
```
