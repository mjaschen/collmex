# Collmex API PHP SDK

[![Latest Stable Version](https://poser.pugx.org/mjaschen/collmex/v)](https://packagist.org/packages/mjaschen/collmex)
[![Total Downloads](https://poser.pugx.org/mjaschen/collmex/downloads)](https://packagist.org/packages/mjaschen/collmex)
[![Build Status](https://scrutinizer-ci.com/g/mjaschen/collmex/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mjaschen/collmex/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mjaschen/collmex/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mjaschen/collmex/?branch=master)
[![License](https://poser.pugx.org/mjaschen/collmex/license)](//packagist.org/packages/mjaschen/collmex)

This library provides a wrapper for the Collmex API. It's not complete yet, some record types (and maybe some features)
are missing.

Please create a pull request if you have implemented a new type/feature or create issues for bugs/feature requests.

There is (or least should be…) a *Type* class for every Collmex record type
("Satzart"). Currently, only the base types (`MESSAGE`, `LOGIN`,
`NEW_OBJECT_ID`) and a few normal record types are implemented:

- `ABO_GET`
- `ACC_BAL`
- `ACCBAL_GET`
- `ACCDOC`
- `ACCDOC_GET`
- `CMXADR`
- `BILL_OF_MATERIAL_GET`
- `CMXABO`
- `CMXBOM`
- `CMXDLV`
- `CMXEPF`
- `CMXINV`
- `CMXKND`
- `CMXMGD`
- `CMXORD-2`
- `CMXPOD`
- `CMXPRD`
- `CMXPRI`
- `CMXPRI_CHANGE`
- `CMXSTK`
- `CMXUMS`
- `CUSTOMER_GET`
- `DELIVERY_GET`
- `INVOICE_GET`
- `INVOICE_OUTPUT_SET`
- `MEMBER_GET`
- `OPEN_ITEM`
- `OPEN_ITEMS_GET`
- `PAYMENT_CONFIRMATION`
- `PRICE_GROUP`
- `PRICE_GROUPS_GET`
- `PRDGRP`
- `PRODUCT_GET`
- `PRODUCT_GROUPS_GET`
- `PRODUCT_PRICE_GET`
- `PRODUCTION_ORDER`
- `PRODUCTION_ORDER_GET`
- `PROJECT_STAFF`
- `PROJECT_STAFF_GET`
- `PURCHASE_ORDER_GET`
- `SALES_ORDER_GET`
- `SHIPMENT_CONFIRM`
- `SHIPMENT_NOTIFICATION_SEND`
- `SHIPMENT_ORDERS_GET`
- `STOCK_AVAILABLE`
- `STOCK_AVAILABLE_GET`
- `STOCK_CHANGE`
- `STOCK_CHANGE_GET`
- `STOCK_GET`
- `TRACKING_NUMBER`
- `VOUCHER`
- `VOUCHER_GET`

## Installation

Using Composer, just add it to your `composer.json` by running:

```shell
composer require mjaschen/collmex
```

If you want to use the included Laravel service provider
`CollmexServiceProvider`, add it to the `config/app.php` providers array:

```php
<?php
return [

    // ...

    'providers' => [
        // ...
        \MarcusJaschen\Collmex\CollmexServiceProvider::class,
    ],

    // ...
];
```

## Compatibility

The Collmex PHP SDK requires PHP >= 7.1. If you're still using an ancient PHP version, you can install older versions of
the Collmex PHP SDK:

- for PHP 7.0 compatibility: use the 0.12.x branch (`composer require mjaschen/collmex:~0.12`)
- for PHP 5.6 compatibility: use the 0.11.x branch (`composer require mjaschen/collmex:~0.11`)
- for PHP 5.5 compatibility: use the 0.6.x branch (`composer require mjaschen/collmex:~0.6`)
- for PHP 5.4 compatibility: use the 0.4.x branch (`composer require mjaschen/collmex:~0.4`)
- for PHP 5.3 compatibility: use the 0.3.x branch (`composer require mjaschen/collmex:~0.3`)

New features will only go into the master.

## Usage/Examples

### Fetch from Collmex API

Load a Collmex *Customer* record:

```php
<?php

use MarcusJaschen\Collmex\Client\Curl as CurlClient;
use MarcusJaschen\Collmex\Request;
use MarcusJaschen\Collmex\Type\CustomerGet;

// initialize HTTP client
$collmexClient = new CurlClient('USER', 'PASSWORD', 'CUSTOMER_ID');

// create request object
$collmexRequest = new Request($collmexClient);

// create a record type; we're querying the API for customer with ID=12345
$getCustomerType = new CustomerGet(array('customer_id' => '12345'));

// send HTTP request and get response object
$collmexResponse = $collmexRequest->send($getCustomerType->getCsv());

if ($collmexResponse->isError()) {
    echo 'Collmex error: ' . $collmexResponse->getErrorMessage() . '; Code=' . $collmexResponse->getErrorCode() . PHP_EOL;

    return;
}

$records = $collmexResponse->getRecords();

foreach ($records as $record) {
    // contains one Customer object and the Message object(s)
    var_dump($record->getData());
}

// show unparsed response contents:
var_dump($collmexResponse->getResponseRaw());
```

### Send Data to Collmex

Create a new Collmex *Customer* record and get the Collmex customer ID from the response data:

```php
<?php

use MarcusJaschen\Collmex\Client\Curl as CurlClient;
use MarcusJaschen\Collmex\Request;
use MarcusJaschen\Collmex\Type\Customer;

// initialize HTTP client
$collmexClient = new CurlClient('USER', 'PASSWORD', 'CUSTOMER_ID');

// create request object
$collmexRequest = new Request($collmexClient);

// create a record type; we create a customer with some basic fields
$customer = new Customer(
    [
        'client_id' => '1',
        'salutation' => 'Herr',
        'forename' => 'Charly',
        'lastname' => 'Cash',
        'street' => 'Hauptstraße 12',
        'zipcode' => '12222',
        'city' => 'Berlin',
        'inactive' => Customer::STATUS_ACTIVE,
        'country' => 'DE',
        'phone' => '+49300000000',
        'email' => 'cash@example.org',
        'output_medium' => Customer::OUTPUT_MEDIUM_EMAIL,
    ]
);

// send HTTP request and get response object
$collmexResponse = $collmexRequest->send($customer->getCsv());

if ($collmexResponse->isError()) {
    echo 'Collmex error: ' . $collmexResponse->getErrorMessage() . '; Code=' . $collmexResponse->getErrorCode() . PHP_EOL;

    return;
} 

  $newObject = $collmexResponse->getFirstRecord();
  echo 'New Collmex customer ID=' . $newObject->new_id . PHP_EOL;

  $records = $collmexResponse->getRecords();

  foreach ($records as $record) {
      // contains one NewObject object and the Message object(s)
      var_dump($record->getData());
  }
```

### Send Multiple Records at Once

The Collmex API accepts requests containing multiple records.

For example, a customer order with three line-items is sent as three CSV records/lines within a single request.

The `MultiRequest` class provides a simple way to send multiple records to Collmex at once. Any valid `Type` (or an
array of valid `Type` instances) can be added to a queue and eventually sent to the Collmex API.

```php
<?php

use MarcusJaschen\Collmex\Client\Curl as CurlClient;
use MarcusJaschen\Collmex\MultiRequest;
use MarcusJaschen\Collmex\Type\CustomerOrder;

// initialize HTTP client
$collmexClient = new CurlClient('USER', 'PASSWORD', 'CUSTOMER_ID');

// create request object
$collmexMultiRequest = new MultiRequest($collmexClient);

// create a record type; we create a CustomerOrder with some basic fields
$customerOrderData = [
    'client_id' => '1',
    'customer_salutation' => 'Herr',
    'customer_forename' => 'Charly',
    'customer_lastname' => 'Cash',
    'customer_street' => 'Hauptstraße 12',
    'customer_zipcode' => '12222',
    'customer_city' => 'Berlin',
    'customer_country' => 'DE',
    'customer_phone' => '+49300000000',
    'customer_email' => 'cash@example.org',
    'order_date' => '01.01.1970',
    'status' => CustomerOrder::STATUS_CONFIRMED,
];

// set several item positions
$customerOrderItem = new CustomerOrder(
    array_merge(
        $customerOrderData,
        [
            'product_description' => 'erster Artikel',
            'quantity' => 1,
            'price' => 10.5,
            'tax_rate' => CustomerOrder::TAX_RATE_FULL,
        ]
    )
);
$collmexMultiRequest->add($customerOrderItem);

$customerOrderItem = new CustomerOrder(
    array_merge(
        $customerOrderData,
        [
            'product_description' => 'zweiter Artikel',
            'quantity' => 10,
            'price' => 37.99,
            'tax_rate' => CustomerOrder::TAX_RATE_REDUCED,
        ]
    )
);
$collmexMultiRequest->add($customerOrderItem);

$customerOrderItem = new CustomerOrder(
    array_merge(
        $customerOrderData,
        [
            'product_description' => 'Artikel Nummer drei',
            'quantity' => 3,
            'price' => 1250,
            'tax_rate' => CustomerOrder::TAX_RATE_FULL,
        ]
    )
);
$collmexMultiRequest->add($customerOrderItem);

// send HTTP request and get response object
$collmexResponse = $collmexMultiRequest->send();

if ($collmexResponse->isError()) {
    echo 'Collmex error: ' . $collmexResponse->getErrorMessage() . '; Code=' . $collmexResponse->getErrorCode() . PHP_EOL;

    return;
}

$newObject = $collmexResponse->getFirstRecord();
echo 'New Collmex order ID=' . $newObject->new_id . PHP_EOL;

$records = $collmexResponse->getRecords();

foreach ($records as $record) {
    // contains one NewObject object and the Message object(s)
    var_dump($record->getData());
}
```

## Notes

Collmex expects all strings encoded in code page 1252 (Windows) while the Collmex PHP SDK expects all inputs as UTF-8
and outputs everything as UTF-8. The conversion of string encodings is done transparently with the [forceutf8]
library before sending a request to the Collmex API and after receiving the response from the API.

## Development

### Run code checks

To run checks and tests, it's the easiest to use the provided Composer scripts:

- lint PHP files for syntax errors: `composer ci:lint`
- run static analysis with [Psalm] and report errors: `composer ci:psalm`
- run unit tests with PHPUnit: `composer ci:tests`
- check the code style with
  [PHP_CodeSniffer]:
  `composer ci:sniff`

To run all checks and tests at once, just use `composer ci`.

Of course, it's possible to use the test runners directly, e.g. for PHPUnit:

```shell
./vendor/bin/phpunit
```

Psalm:

```shell
./vendor/bin/psalm
```

### Autoformat the code

You can use a Composer script to autoformat the code:

```shell
composer fix:php-cs
```

## Collmex API Documentation

<https://www.collmex.de/cgi-bin/cgi.exe?1005,1,help,api>

[forceutf8]: https://github.com/neitanod/forceutf8

[PHP_CodeSniffer]: https://github.com/squizlabs/PHP_CodeSniffer

[Psalm]: https://github.com/vimeo/psalm
