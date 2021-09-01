# forum-associatif-numerique

## Installation

### Create your .env file

Make a copy of `.env.exemple` named `.env`. You'll need to change your database connection information

```
# If you use MariaDB
DATABASE_URL="mysql://dbuser:dbpass@127.0.0.1:3306/dbname?serverVersion=mariadb-10.5.5"
```
```
# If you use MySQL
DATABASE_URL="mysql://dbuser:dbpass@127.0.0.1:3306/dbname?serverVersion=5.7"
```

### Install PHP Dependencies

Make sure you've installed the project dependencies 

```
composer install
```

### Migrate data

First of all, create a migration file with

```
php bin/console make:migration
```

Then, you can migrate data
```
php bin/console doctrine:migrations:migrate
```

### Install front dependencies (webpack encore)
If you're frontend dev. in the project you'll need JS dependencies

```
npm install -g yarn
```
```
yarn install
```

## Start server 

```
symfony serve
```

```
yarn encore dev --watch
```

ENJOY ;)