Welcome to my Symfony CQRS project!

This project is a simple example of how to use CQRS with Symfony.

CQRS is a pattern that separates the read and write operations of an application.

This project uses the following technologies:
- Symfony 6.*
- PHP 8.*
- Docker
- PostgreSQL

---

### Installation

Step 1: Run Docker 
```
$ docker-compose up -d
```

Step 2: Run the Server
```
$ symfony server:start --port=5000
```

Step 3: Run the Migrations
```
$ php bin/console doctrine:migrations:migrate
```

Step 4: Run the Fixtures
```
$ php bin/console doctrine:fixtures:load --append
```

**OK! You're ready to go!**

Access the application in your browser: http://localhost:8000

---

Useful commands

### Tests
Run the tests
```
$ php bin/phpunit
```

### Database & Migrations
Create a new migration
```
$ php bin/console make:migration
```

Run the migrations
```
$ php bin/console doctrine:migrations:migrate
```