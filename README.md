# Mr. Watch


Instructions for the  execution of the web app in a local environment
are given asuming that the user has the **xampp** tool installed.

## Steps
- Put the project inside xampp's `htdocs` directory, either directly
  or indirectly.

- Copy the `.env.example` to a new `.env` file:
```bash
$ cp .env.example .env
```

- Move to the app's root directory and run:
```bash
$ composer install
$ composer dumpautoload
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```

After that, the app will be fully configured and ready to run,
so you can access the `localhost/online-store/public/` route and start
using it.
