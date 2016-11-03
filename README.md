## PHP Raja Ongkir API

[![Latest Version](https://img.shields.io/github/release/ncaneldiee/rajaongkir.svg?style=flat-square)](https://github.com/ncaneldiee/rajaongkir/releases)
[![Total Download](https://img.shields.io/packagist/dt/ncaneldiee/rajaongkir.svg?style=flat-square)](https://packagist.org/packages/ncaneldiee/rajaongkir)
[![Software License](https://img.shields.io/github/license/ncaneldiee/rajaongkir.svg?style=flat-square)](https://github.com/ncaneldiee/rajaongkir/blob/master/LICENSE.md)

A PHP library which implement the complete functionality of [Raja Ongkir API](http://rajaongkir.com/dokumentasi).

## Requirements

1. PHP 5.6+ with [cURL](http://php.net/manual/en/curl.installation.php) and [mbstring](http://php.net/manual/en/mbstring.installation.php) extension
2. [Composer](http://getcomposer.org)

## Installation

Using composer.

```bash
$ composer require ncaneldiee/rajaongkir
```

## Example

```php
use Ncaneldiee\Rajaongkir;

$rajaongkir = new Rajaongkir\Domestic(YOUR_API_KEY);

$rajaongkir->cost($origin, $destination, $weight, $courier);

$rajaongkir->waybill($tracking_number, $courier);
```

Full documentation can be found at the [wiki](http://github.com/ncaneldiee/rajaongkir/wiki).

## License

The MIT License (MIT). Please see [LICENSE](http://github.com/ncaneldiee/rajaongkir/blob/master/LICENSE.md) for more information.
