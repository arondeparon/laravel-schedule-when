# A Command that tells you what the Scheduler will run.

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

This Laravel package provides a command tells you the scheduler would do at a given moment in time.

In some applications, the schedule can quickly grow to dozens of scheduled commands, making it harder
and harder to see what the Scheduler will do a give moment in time.

This command will help you to see what the Scheduler will or will not do so that you can stop guessing.

## Installation and use
This package requires PHP 7.2 and Laravel 5.5 or higher.

## Getting started
Install via Composer

``` bash
$ composer require arondeparon/laravel-schedule-when
```

## Usage

``` php
php artisan schedule:when "2019-01-01 08:05"
```

## Testing

``` bash
$ composer test
```

## License

MIT license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/arondeparon/laravel-schedule-when.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/arondeparon/laravel-schedule-when.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/arondeparon/laravel-schedule-when/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/arondeparon/laravel-schedule-when
[link-downloads]: https://packagist.org/packages/arondeparon/laravel-schedule-when
[link-travis]: https://travis-ci.org/ArondeParon/laravel-schedule-when
[link-author]: https://github.com/arondeparon
[link-contributors]: ../../contributors
