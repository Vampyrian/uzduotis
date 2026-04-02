# Task

## dependencies
- composer
- php 8.5




## To install dependencies
```bash
composer install
```


## To start server
```bash
symfony server:start
```
![Result](doc/images/result.png)

## To run phpcs
```bash
vendor/bin/phpcs --standard=PSR12 src/
```
![PHPCS](doc/images/cs.png)

## To run phpstan
```bash
vendor/bin/phpstan analyse
```
![PHPStan](doc/images/phpstan.png)

## To run phpunit
```bash
./vendor/bin/phpunit tests
```
![PHPUnit](doc/images/phpunit.png)
