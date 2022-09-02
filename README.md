# Collmex API PHP SDK

[![Latest Stable Version](https://poser.pugx.org/mjaschen/collmex/v)](https://packagist.org/packages/mjaschen/collmex)
[![Total Downloads](https://poser.pugx.org/mjaschen/collmex/downloads)](https://packagist.org/packages/mjaschen/collmex)
[![CI Status](https://github.com/mjaschen/collmex/workflows/Collmex%20PHP%20SDK%20Tests/badge.svg)](https://github.com/mjaschen/collmex/actions)
[![Build Status](https://scrutinizer-ci.com/g/mjaschen/collmex/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mjaschen/collmex/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mjaschen/collmex/badges/quality-score.png)](https://scrutinizer-ci.com/g/mjaschen/collmex/)
[![License](https://poser.pugx.org/mjaschen/collmex/license)](https://packagist.org/packages/mjaschen/collmex)

This library provides a wrapper for the Collmex API. It's not complete yet, some record types (and maybe some features)
are missing.

## Table of Contents
- [Collmex API PHP SDK](#collmex-api-php-sdk)
  - [Table of Contents](#table-of-contents)
  - [Compatibility](#compatibility)
  - [Installation](#installation)
  - [Upgrading](#upgrading)
    - [Version 1.x to 2.x](#version-1x-to-2x)
  - [Usage/Examples](#usageexamples)
    - [Fetch from Collmex API](#fetch-from-collmex-api)
    - [Send Data to Collmex](#send-data-to-collmex)
    - [Send Multiple Records at Once](#send-multiple-records-at-once)
  - [Notes](#notes)
    - [Numeric / money values](#numeric--money-values)
  - [Development](#development)
    - [Run code checks](#run-code-checks)
    - [Autoformat the code](#autoformat-the-code)
  - [Collmex API Documentation](#collmex-api-documentation)

Please create a pull request if you have implemented a new type/feature or create issues for bugs/feature requests.

There is (or least should be…) a *Type* class for every Collmex record type
("Satzart"). Currently, only the base types (`MESSAGE`, `LOGIN`,
`NEW_OBJECT_ID`) and a few normal record types are implemented:

- `ABO_GET`
- `ACC_BAL`
- `ACCBAL_GET`
- `ACCDOC`
- `ACCDOC_GET`
- `ADDRESS_GROUPS_GET`
- `API_NOTIFICATION`
- `CMXADR`
- `ADRGRP`
- `BANK_STATEMENT_GET_FROM_BANK`
- `BATCH_GET`
- `BILL_OF_MATERIAL_GET`
- `CMXABO`
- `CMXADR`
- `CMXBOM`
- `CMXBTC`
- `CMXDLV`
- `CMXEPF`
- `CMXINV`
- `CMXKND`
- `CMXLRN`
- `CMXMGD`
- `CMXORD-2`
- `CMXPOD`
- `CMXPRD`
- `CMXPRI`
- `CMXPRI_CHANGE`
- `CMXQTN`
- `CMXSTK`
- `CMXUMS`
- `CUSTOMER_GET`
- `DELIVERY_GET`
- `INVOICE_GET`
- `INVOICE_PAYMENT`
- `INVOICE_PAYMENT_GET`
- `INVOICE_OUTPUT`
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

## Compatibility

The Collmex PHP SDK requires PHP >= 7.3. If you're still using an ancient PHP
version, you can install older versions of the Collmex PHP SDK:

- for PHP 7.2 compatibility: use the 1.x tags (`composer require mjaschen/collmex:^1.0`); this version will receive security updates until version 3.0 is released.
- for PHP 7.0 compatibility: use the 0.12.x tags (`composer require mjaschen/collmex:^0.12`); this version won't receive any updates.
- for PHP 5.6 compatibility: use the 0.11.x tags (`composer require mjaschen/collmex:^0.11`); this version won't receive any updates.

New features will only go into the main branch and won't be backported.

## Installation

Using Composer, just add it to your `composer.json` by running:

```shell
composer require mjaschen/collmex
```

If you want to use the included Laravel service provider
`CollmexServiceProvider`, add it to the `config/app.php` providers array:

```php
return [

    // ...

    'providers' => [
        // ...
        \MarcusJaschen\Collmex\CollmexServiceProvider::class,
    ],

    // ...
];
```

## Upgrading

### Version 1.x to 2.x

1. Read the [change log](https://github.com/mjaschen/collmex/blob/main/CHANGELOG.md).
You will see the list of everything changed between versions 1 and 2.
1. Ensure your codebase is compatible with all requirements in `composer.json`.
1. Rename attributes which are used in your codebase. Some attributes
in the type classes have been renamed. If you use these attributes, you have
to adjust your code as well. A simple search-and-replace is sufficient for
this. Below you will find the complete list of renamed attributes:

| Class                      | Old Name                      | New Name                     |
|----------------------------|-------------------------------|------------------------------|
| `Stock`                    | `charge_number`               | `batch_number`               |
| `Stock`                    | `charge_description`          | `batch_description`          |
| `StockChange`              | `destination_charge`          | `destination_batch`          |
| `StockChange`              | `destination_charge_labeling` | `destination_batch_labeling` |
| `StockChange`              | `source_charge`               | `source_batch`               |
| `AccountDocumentGet`       | `only_changed`                | `changed_only`               |
| `CustomerGet`              | `only_changed`                | `changed_only`               |
| `MemberGet`                | `only_changed`                | `changed_only`               |
| `SalesOrderGet`            | `only_changed`                | `changed_only`               |
| `StockGet`                 | `only_changed`                | `changed_only`               |
| `VoucherGet`               | `only_changed`                | `changed_only`               |
| `Customer`                 | `forename`                    | `firstname`                  |
| `CustomerOrder`            | `forename`                    | `firstname`                  |
| `Invoice`                  | `forename`                    | `firstname`                  |
| `Member`                   | `forename`                    | `firstname`                  |
| `Customer`                 | `firm`                        | `company`                    |
| `DifferentShippingAddress` | `firm`                        | `company`                    |
| `Member`                   | `firm`                        | `company`                    |
| `CustomerOrder`            | `customer_firm`               | `customer_company`           |
| `Invoice`                  | `customer_firm`               | `customer_company`           |
| `CustomerOrder`            | `delivery_firm`               | `delivery_company`           |
| `Invoice`                  | `delivery_firm`               | `delivery_company`           |

## Usage/Examples

### Fetch from Collmex API

Load a Collmex *Customer* record:

```php
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
        'firstname' => 'Charly',
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
    'customer_firstname' => 'Charly',
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
            'quantity' => '1',
            'price' => '10,50',
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
            'quantity' => '10',
            'price' => '37,99',
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
            'quantity' => '3',
            'price' => '1250,00',
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

Collmex expects all strings encoded in code page 1252 (Windows) while the
Collmex PHP SDK expects all inputs as UTF-8 and outputs everything as UTF-8.
The conversion of string encodings is done transparently by using the
Symfony String Component and PHP's `mb_convert_encoding()` function before
sending a request to the Collmex API and after receiving the response from
the API.

### Numeric / money values

This SDK does not convert numeric values to the string format required by
the Collmex API by default.

For more information on format requirements, see the [offical API documentation](https://www.collmex.de/c.cmx?1005,1,help,daten_importieren_datentypen_felder).

The library provides helpers for simple conversion from several types to
the Collmex money format:

| type                                     | example value                                | call                      | result (string) |
|------------------------------------------|----------------------------------------------|---------------------------|-----------------|
| *float*                                  | `19.99`                                      | `Money::fromFloat(19.99)` | `19,99` |
| *integer* (cents)                        | `1999`                                       | `Money::fromCents(1999)` | `19,99` |
| [Money for PHP](https://www.moneyphp.org/en/stable/) | `$money = new \Money\Money(1999, $currency)` | `Money::fromMoney($money)` | `19,99` |

Fully qualified class name for the helper: `\MarcusJaschen\Collmex\CollmexField\Money`.

See the unit tests for [more examples](tests/Unit/CollmexField/MoneyTest.php).

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
