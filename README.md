# Codes Unleash

## Setup Project
Make a copy of `.env` using the file `env.example` and then add your MySQL database credentials to establish a connection.

```
DB_CONNECTION=mysql
DB_HOST=<database host>
DB_PORT=<database port>
DB_DATABASE=<database name>
DB_USERNAME=<database username>
DB_PASSWORD=<database password>
```


After setting up the `.env` run the following commands:
```bash
# Install package dependencies 
$ composer install
$ npm i

# Generate the APP_KEY
$ php artisan key:generate

# Clear all composer's cache directories, Update Autoloader and Remove the cached bootstrap files
$ composer clear
$ composer dump-autoload
$ php artisan optimize:clear

# Run the migrations
$ php artisan migrate

# Drop all tables and re-run all migrations with seeders
$ php artisan migrate:fresh --seed

# Check for computer's ip address
$ ipconfig

# Copy the ipv4 address and change the ip-address parameter
$ php artisan serve --host=ip-address --port=8000.

```
