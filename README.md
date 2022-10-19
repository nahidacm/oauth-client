### oAuth client for id.sslwireless.com

#### Installation
1. Clone the repo
2. `cd <clone directory>`
3. Run following command to install application's dependency
``` 
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
4. copy `.env.example` to `.env` and update following env data if needed
```
APP_PORT=3059
FORWARD_DB_PORT=3060
FORWARD_DBADMIN_PORT=3061
COMPOSE_PROJECT_NAME=oauth_client

OAUTH_AUTHORIZE_URL=http://localhost:3056/oauth/authorize
OAUTH_TOKEN_URL=http://localhost:3056/oauth/token
OAUTH_CLIENT_ID=9787a23c-22a3-4746-b402-0712f1ff8c01
OAUTH_CLIENT_SECRET=BwNKwOqg2cArLbf8n6xnmLZhTWJUV8rr04oSUiz2
OAUTH_CALLBACK_URL=http://localhost:3059/auth/callback
```
5. `./vendor/bin/sail up -d`
6. Make the `sail` alias if you need https://laravel.com/docs/9.x/sail#configuring-a-shell-alias
7. `sail artisan migrate`