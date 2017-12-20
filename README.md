# Collmex API PHP SDK

This library provides a wrapper for the Collmex API. It's not complete yet, some record types (and maybe
some features) are missing.

Please create a Pull Request if you've implemented a new type/feature or create Issues for bugs/feature requests.

There is (or least should be…) a *Type* class for every Collmex record type ("Satzart"). Currently only the base types (`MESSAGE`, `LOGIN`, `NEW_OBJECT_ID`) and a few normal record types are implemented:

- `ABO_GET`
- `CMXABO`
- `CMXDLV`
- `CMXEPF`
- `CMXINV`
- `CMXKND`
- `CMXMGD`
- `CMXORD-2`
- `CMXPRD`
- `CMXPRI`
- `CMXPRI_CHANGE`
- `CMXSTK`
- `CMXUMS`
- `CUSTOMER_GET`
- `DELIVERY_GET`
- `INVOICE_GET`
- `MEMBER_GET`
- `PAYMENT_CONFIRMATION`
- `PRODUCT_GET`
- `PRODUCT_PRICE_GET`
- `SALES_ORDER_GET`
- `STOCK_AVAILABLE`
- `STOCK_AVAILABLE_GET`
- `STOCK_GET`
- `TRACKING_NUMBER`

## Installation

Using Composer, just add it to your `composer.json` by running:

```shell
composer require mjaschen/collmex
```

If you want to use the included Laravel service provider `CollmexServiceProvider`, add it to the `config/app.php` providers array:

```php
return [

    // ...

    'providers' => [
        // ...
        MarcusJaschen\Collmex\CollmexServiceProvider::class,
    ],

    // ...
];
```

## Compatibility

The Collmex PHP SDK requires PHP 5.5.9. If you're still using older PHP versions, you can install the 0.4 branch
for PHP 5.4 compatibility or the 0.3 branch for PHP 5.3 compatibility. New features will only go into the current
branch.

## Usage/Examples

### Request information from Collmex API

Load a Collmex *Customer* record:

```php
<?php

use \MarcusJaschen\Collmex\Client\Curl as CurlClient;
use \MarcusJaschen\Collmex\Request;
use \MarcusJaschen\Collmex\Type\CustomerGet;

// initialize HTTP client
$collmexClient = new CurlClient("USER", "PASSWORD", "CUSTOMER_ID");

// create request object
$collmexRequest = new Request($collmexClient);

// create a record type; we're querying the API for customer with ID=12345
$getCustomerType = new CustomerGet(array('customer_id' => '12345'));

// send HTTP request and get response object
$collmexResponse = $collmexRequest->send($getCustomerType->getCsv());

if ($collmexResponse->isError()) {
    echo "Collmex error: " . $collmexResponse->getErrorMessage() . "; Code=" . $collmexResponse->getErrorCode() . PHP_EOL;
} else {
    $records = $collmexResponse->getRecords();

    foreach ($records as $record) {
        var_dump($record->getData()); // contains one Customer object and the Message object(s)
    }
}

// show unparsed reponse contents:
var_dump($collmexResponse->getResponseRaw());
```

### Create a new Collmex customer record

Create a new Collmex *Customer* record and get the Collmex Customer-ID from the response data:

```php
<?php

use \MarcusJaschen\Collmex\Client\Curl as CurlClient;
use \MarcusJaschen\Collmex\Request;
use \MarcusJaschen\Collmex\Type\Customer;

// initialize HTTP client
$collmexClient = new CurlClient("USER", "PASSWORD", "CUSTOMER_ID");

// create request object
$collmexRequest = new Request($collmexClient);

// create a record type; we create a customer with some basic fields
$customer = new Customer(
    array(
        'client_id'                      => "2",
        'salutation'                     => "Herr",
        'forename'                       => "Charly",
        'lastname'                       => "Cash",
        'street'                         => "Hauptstraße 12",
        'zipcode'                        => "12222",
        'city'                           => "Berlin",
        'inactive'                       => Customer::STATUS_ACTIVE,
        'country'                        => "DE",
        'phone'                          => "+49300000000",
        'email'                          => "cash@example.org",
        'output_medium'                  => Customer::OUTPUT_MEDIUM_EMAIL,
    )
);

// send HTTP request and get response object
$collmexResponse = $collmexRequest->send($customer->getCsv());

if ($collmexResponse->isError()) {
    echo "Collmex error: " . $collmexResponse->getErrorMessage() . "; Code=" . $collmexResponse->getErrorCode() . PHP_EOL;
} else {
    $newObject = $collmexResponse->getFirstRecord();
    echo "New Collmex customer ID=" . $newObject->new_id . PHP_EOL;

    $records = $collmexResponse->getRecords();

    foreach ($records as $record) {
        var_dump($record->getData()); // contains one NewObject object and the Message object(s)
    }
}
```

## Notes

Collmex expects all strings encoded in Codepage 1252 (Windows) while the Collmex PHP SDK expects
all inputs as UTF-8 and outputs everything as UTF-8. The conversion of string encodings is done
transparently before sending an request to the Collmex API and after receiving the response from
the API.

## Run Tests

- Install with `--dev` option: `php composer.phar install --dev` or `php composer.phar update --dev`
- run `./vendor/bin/phpunit`

## Collmex API Documentation

- [http://www.collmex.de/cgi-bin/cgi.exe?1005,1,help,api](http://www.collmex.de/cgi-bin/cgi.exe?1005,1,help,api)

## Contributions

- [String Encoding Converter/Fixer](https://github.com/neitanod/forceutf8) by [Sebastián Grignoli](https://github.com/neitanod)
