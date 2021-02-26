## What Is This?

This is a fork of Laravel 4.2 which has stopped receiving any updates for years. Many of us use 4.2 on legacy applications that are nearly impossible to upgrade to Laravel 5+. This fork aims to maintain Laravel 4.2 support for new versions of PHP that are still under Security Support and to address any known security issues with Laravel 4.2.


## Branches

### 4.3 - PHP 7.4 Support & Remove MCrypt

* PHP 7.4 Support.
* Remove hard-coded MCrypt check and convert Encrypter to use OpenSSL instead.

### Installation

1. Open your project's root composer.json file.
2. Find `"laravel/framework": "4.2.22@dev"` and replace with `"laravel/framework": "4.3.x-dev"`.
3. For running your tests locally, we need to update phpunit and mockery. Change `"phpunit/phpunit": "~4.0"` to `"phpunit/phpunit": "~8.0"`. Change `"mockery/mockery": "dev-master@dev"` to `"mockery/mockery": "~1.3.0"`


remove `syntaxCheck` config option from phpunit.xml
Any of your local tests that override phpunit TestCase methods,  will need to be updated to include return type declarations i.e `public function setUp()` to `public function setUp():void` 
