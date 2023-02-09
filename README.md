# Installation

```composer install```

```yarn install``` or ```npm install```

```docker-compose up``` [starts laravel and mysql (mariadb) containers]

Inside laravel container, open terminal, run migrations

Inside another container terminal, run ```yarn dev``` to start vite

phpstan, unit tests, pint can all be run adhoc locally (look into how this can be automated)


# In reality don't do the above on windows. Docker desktop with that docker compose file is slower than:
```php artisan serve```

```npm run dev```
