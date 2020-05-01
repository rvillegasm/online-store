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

- Edit the `.env` file with your own values:
```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

- Move to the app's root directory and run:
```bash
$ composer install
$ composer dumpautoload
$ php artisan key:generate
$ php artisan storage:link
$ php artisan migrate
$ php artisan db:seed
```

After that, the app will be fully configured and ready to run,
so you can access the `localhost/online-store/public/` route and start
using it.

## Image storage with S3
- Edit the `.env` file with your own values:
```
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_SESSION_TOKEN= # For AWS Educate account
AWS_DEFAULT_REGION=
AWS_BUCKET=
```
- Go to app/Providers/ImageServiceProvider.php:
```php
# Replace the following line
return new ImageLocalStorage();
# With this
return new ImageS3Storage();
```
## Login with Google
- We recommend you follow `Step 3` of this [tutorial](https://www.itsolutionstuff.com/post/laravel-6-socialite-login-with-google-gmail-accountexample.html)
- Edit the `.env` file with your own values:
```
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
```
