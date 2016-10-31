## PHP Raja Ongkir API

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
use Ncaneldiee\Rajaongkir\Rajaongkir;

$rajaongkir = new Rajaongkir(YOUR_API_KEY);

$rajaongkir->cost($origin, $destination, $weight, $courier);

$rajaongkir->waybill($tracking_number, $courier);
```

Full documentation can be found at the [wiki](http://github.com/ncaneldiee/rajaongkir/wiki).

# License

The MIT License (MIT). Please see [LICENSE](http://github.com/ncaneldiee/rajaongkir/blob/master/LICENSE.md) for more information.
