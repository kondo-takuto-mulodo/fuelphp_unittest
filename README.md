# Example FuelPHP Unit test

* Fuelphp Version: 1.7.2
* PHPUnit Version: ~4.0
* Mockery Version: 0.9
* fuelphp-phpcs Version: ~1

## How do use it

* Step 1: run install plugin by composer
```
php composer.phar install
```
* Step 2: setup .env
* Step 3: run migrate to generate database
```
php oil refine migrate:current
```
* Step 4: run PHPunit
```
php composer.phar test
```
* Step 5: view coverage DOC_ROOT/coverage-html/index.html

## Some Script

* Run PHPUnit :
```
 php composer.phar test
```
or
```
 php oil test
```
* Run fuelphpcs :
```
 php composer.phar fuelphpcs
```
or
```
 ./fuel/vendor/eviweb/fuelphp-phpcs/bin/fuelphpcs --standard=FuelPHP fuel/app/classes/
```