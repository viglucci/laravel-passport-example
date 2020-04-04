# laravel-passport-example
An example application that leverages Laravel Passport as a identity provider, and an example application that interfaces with this identity provider.

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