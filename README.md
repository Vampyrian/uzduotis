# Task

With the help of Symphony dependency injection component and composer implement:

1. Generators
   1.1. Random string generator(a-zA-Z0-9). Possibility to set random string length via dependency injection. Result example: afAs3d
   1.2. Array with random strings generator(a-zA-Z0-9). Possibility to set array size and string length via dependency injection. Result example: ['Av54sD', '123456', 'NN54sM']

2. Converters
   2.1. Can convert string by the following pattern: Input: 22aAcd Output: 22/1/1/3/4
   2.2. Rot13 converter

3. Create Generators collection.

4. Add index.php and add random Generators to your Generators collection. Loop through collection and apply random Converter to every Generator.

Use PHPCodeSniffer, PHPStan and PHPUnit.

## Instruction to run project

### Install dependencies
```bash
composer install
```


### To run code
```bash
php index.php
```
![Result](doc/images/result.png)

### To run phpcs
```bash
vendor/bin/phpcs --standard=PSR12 src/
```
![PHPCS](doc/images/cs.png)

### To run phpstan
```bash
vendor/bin/phpstan analyse
```
![PHPStan](doc/images/phpstan.png)

### To run phpunit
```bash
./vendor/bin/phpunit tests
```
![PHPUnit](doc/images/phpunit.png)
