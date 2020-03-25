# Change Log

All notable changes to `mjaschen/collmex` will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).
Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/)
principles.

## [1.2.0]

### Changed

- support for Laravel 7.x in Composer dependencies

## [1.1.3]

### Added

- field `account_id` in `PaymentConfirmation`

## [1.1.2]

### Fixed

- add missing type casting for Collmex response error line value

## [1.1.1]

### Fixed

- type error when trying to extract the CSV data from a `ZipResponse`

## [1.1.0]

### Added

- `ProductionOrder` and `ProductionOrderGet` types

## [1.0.0]

**Warning: Backwards-compatibility-breaking changes**

### Changed

- increase the minimum required PHP version to 7.1
- *prod* dependencies for several used libraries are raised:
    - `"neitanod/forceutf8": "^2.0"`
    - `"symfony/finder": "^4.0"`
    - `"symfony/http-foundation": "^4.0"`
- all *dev* dependencies (except for PHPUnit) are required at their current major release
- upgrade to PHPUnit 7
- use strict comparisons where suitable
- use proper camelCase for all method names (`toJSON()` → `toJson()`, `getJSON()` → `getJson()`)
- use the `strict_types=1` execution directive globally
- use return type hints globally
- use method argument type hints globally (where suitable)
- introduced visibility declarations for all class constants (all constants in the *Type* classes were kept public)
- reduce the visibility of some `Response` methods
- Throw an exception if a Zip cannot be opened: `ZipArchive::open()` returns error codes on failure, not `false`
- change behaviour for invalid Zip responses: If a Zip response doesn't contain the CSV part, an
  `InvalidZipResponseException` is thrown as such a response is invalid
  regarding to the Collmex documentation. The previous behaviour was
  to silently accept such an invalid response and return `null`.
- Hard-code the CSV delimiter and enclosure: As the delimiter and enclosure are not subject to change for Collmex,
  they're hardcoded to reduce code complexity
- update the Collmex API Base URL

### Added

- added @oliverklee to `composer.json` as developer

### Removed

- drop LeagueParser, as `SimpleParser` works well enough for CSV files with current versions of PHP
- remove the deprecated FilterInterface::filter method, as this method has been deprecated in the past
- drop the parser parameter from the request constructor: there is only one parser here, and there is no need for this
  flexibility now.
- drop the generator parameter from the AbstractType constructor: now that there is only one generator,
  there is no need to be flexible about the kind of generator that is used.

## [0.12.0]

**Warning: Backwards-compatibility-breaking changes**

### Changed

- support for PHP 5.6 was dropped, PHP 7.0 is the minimum required version now
- added support for PHP 7.3 for Composer and Travis-CI
- re-enabled Psalm static analysis in Travis-CI runs
- updated Psalm to version 3
- CodeSniffer runs against PSR-2 and PSR-12 rules now
- simplified composer install for Travis-CI; settings moved to `composer.json`

## [0.11.0]

**Warning: Backwards-compatibility-breaking changes**

### Added

- support for `StockChange` in `TypeFactory`. Thanks to @Argee88!
- new field `not_confirmed` in `ShipmentConfirm`

### Changed

- field names renamed in `StockChange`:
  - `supplier_order_id` → `purchase_order_id`
  - `supplier_order_position` → `purchase_order_position`

## [0.10.1]

### Added

- new type `PriceGroupsGet` (`PRICE_GROUPS_GET`). Thanks to @Argee88!
- new type `PriceGroup` (`PRICE_GROUP`). Thanks to @Argee88!

## [0.10.0]

### Added

- add PHP 7.3 to the list of supported versions in Composer config

## [0.9.2]

### Fixed

- typo in field name `quantitiy` → `quantity` in `Delivery` type was introduced again during a merge, it's fixed now – **Warning: breaks backwards compatibility!**

## [0.9.0]

**Warning: Backwards-compatibility-breaking changes**

### Added

- new type `StockChange` (`STOCK_CHANGE`). Thanks to @Argee88!
- new type `StockChangeGet` (`STOCK_CHANGE_GET`). Thanks to @Argee88!
- new type `ShipmentOrdersGet` (`SHIPMENT_ORDERS_GET`). Thanks to @Argee88!

### Fixed

- fix Psalm type warnings. Thanks to @oliverklee!
- add missing required PHP extensions to the `composer.json`. Thanks to @oliverklee!
- field name `quantitiy` → `quantity` in `Delivery` type – **Warning: breaks backwards compatibility!**

### Changed

- misc. code cleanups. Thanks to @oliverklee!

## [0.8.12] - 2018-09-17

### Added

- support for League CSV 9.x alongside 8.x

## [0.8.11] - 2018-09-03

### Changed

- update `DeliveryGet` to match fields with the documentation
- update README with an example on how to use a custom CSV parser for API responses

## [0.8.10] - 2018-08-14

### Added

- new type `ShipmentConfirm` (`SHIPMENT_CONFIRM`). Thanks to @Argee88!

## [0.8.9] - 2018-07-19

### Added

- new type `SendShipmentNotification` (`SHIPMENT_NOTIFICATION_SEND`). Thanks to @Argee88!

## [0.8.8] - 2018-06-29

### Added

- new field `output_required` in `InvoiceGet` type

## [0.8.7] - 2018-06-26

### Added

- class constants for output media (type `InvoiceOutputSet`)

## [0.8.6] - 2018-06-26

### Added

- new type `InvoiceOutputSet` (`INVOICE_OUTPUT_SET`)

## [0.8.5] - 2018-06-08

### Added

- new types `BillOfMaterial` (`CMXBOM`) and `BillOfMaterialGet` (`BILL_OF_MATERIAL_GET`). Thanks to @Argee88!

## [0.8.4] - 2018-04-25

### Added

- new types `ProjectStaff` (`PROJECT_STAFF`) and `ProjectStaffGet` (`PROJECT_STAFF_GET`). Thanks to @Naoray!

## [0.8.3] - 2018-04-11

### Added

- new `AccountDocument` (`ACCDOC`), `AccountDocumentGet` (`ACCDOC_GET`). Thanks to @Naoray!

## [0.8.2] - 2018-04-09

### Fixed

- Typo in type identifier (`ACCBAL` → `ACC_BAL`). Thanks to @Naoray!

## [0.8.1] - 2018-03-27

### Added

- Types `OPEN_ITEM` and `OPEN_ITEMS_GET`. Thanks to @Argee88!

## [0.8.0] - 2018-03-27

### Added

- [Psalm][] static analyzer to dev requirements.
- Composer scripts for running static analyzer.

### Changed

- Updated some internals after running a static analysis
    - splitted filter method into separate methods for filtering strings and arrays
    - removed code duplication
    - removed setting attribute with the result of a method which returns void
    - replaced switch statement with a simple if
- Updated some PHPDoc blocks after running a static analysis.
- Replaced double quotes with single quotes.

## [0.7.7] - 2018-03-27

### Fixed

- Typo in type identifier. Thanks to @Naoray!

## [0.7.6] - 2018-03-25

### Added

- New field `storage_bin` in `Product`. Thanks to @Argee88!

### Changed

- Class names are no longer built dynamically in `TypeFactory`.

## [0.7.5] - 2018-03-23

### Added

- Composer scripts for PHP linting and running tests. Thanks to @oliverklee!

## [0.7.4] - 2018-03-23

### Added

- @property tags in all `Type` doc blocks for better support in IDEs.

## [0.7.3] - 2018-03-21

### Added

- new parser class using the [CSV library](http://csv.thephpleague.com/) from *The PHP League*.

## [0.7.2] - 2018-03-14

### Added

- Type `ACCBAL_GET`. Thanks to @Naoray!
- Type `ACCBAL`.

### Changed

- Updated Invoice type fields to match API. Thanks to @Argee88!

## [0.7.1] - 2018-01-25

### Added

- Support for Laravel package auto-discovery. Thanks to @Naoray!
- Links to Packagist and Travis CI in the README. Thanks to @oliverklee!

### Changed

- Make the runtime dependencies more lenient. Thanks to @oliverklee!
- Announce PHP compatibility only up to 7.2.x. Thanks to @oliverklee!

## [0.7.0] - 2018-01-07

### Changed

- As of version 0.7.0 the Collmex SDK requires at least PHP 5.6.

## [0.6.21] - 2018-01-07

### Added

- new types: `PurchaseOrder` (`CMXPOD`) and `PurchaseOrderGet`
  (`PURCHASE_ORDER_GET`). Thanks to @Argee88!

## [0.6.20] - 2018-01-05

### Added

- new methods `toArray()` and `toJSON()` for types.

### Fixed

- return type hint for `getCSV()` in doc block.

## [0.6.19] - 2017-12-20

### Changed

- updated the included Laravel service provider for compatibility with
  Laravel 5.x. Thanks to Naoray!

## [0.6.18] - 2017-11-21

### Added

- new types: `Member` (`CMXMGD`), `MemberGet` (`MEMBER_GET`). Thanks to
  Sebastian Gunreben!

## [0.6.17] - 2017-09-22

### Added

- new type: `TrackingNumber` (`TRACKING_NUMBER`). Thanks @Argee88!

## [0.6.16] - 2017-09-14

### Added

- The unparsed contents of the Collmex response can be accessed with
  `CsvResponse::getResponseRaw()`.

## [0.6.15] - 2017-09-11

### Added

- new type: `ProductPriceChange` (`CMXPRI_CHANGE`). Thanks @Argee88!

## [0.6.14] - 2017-03-28

### Added

- new type: `PaymentConfirmation` (`PAYMENT_CONFIRMATION`). Thanks @Argee88!

## [0.6.13] - 2017-03-24

### Added

- new types: `Delivery` (`CMXDLV`), `DeliveryGet` (`DELIVERY_GET`),
  `DifferentShippingAddress` (`CMXEPF`). Thanks @Argee88!
- new fields in `Customer` type. Thanks @Argee88!

## [0.6.12] - 2017-03-14

### Added

- new types: `ProductPrice` (`CMXPRI`), `ProductPriceGet`
  (`PRODUCT_PRICE_GET`), `Stock` (`CMXSTK`), `StockAvailable`
  (`STOCK_AVAILABLE`), `StockAvailableGet` (`STOCK_AVAILABLE_GET`),
  `StockGet (`STOCK_GET`)`. Thanks @Argee88!

## [0.6.11] - 2017-03-08

### Fixed

- Verifying field names in mass-assignment (`populateData()`)

## [0.6.10] - 2017-02-17

### Changed

- Travis-CI: add PHP 7.1 and remove HHVM.

## [0.6.9] - 2017-02-17

### Added

- new type: `SalesOrderGet` (`SALES_ORDER_GET`). Thanks @cryshell!

## [0.6.8] - 2017-01-10

### Changed

- Throw `InvalidResponseMimeTypeException` instead of `\RuntimeException`.

## [0.6.7] - 2017-01-10

### Added

- `ResponseInterface`
- The ResponseFactory throws an exception if the MIME type can't be determined.

## [0.6.6] - 2016-12-13

### Added

- new type: `SubscriptionGet` (`ABO_GET`). Thanks @karameloso!

## [0.6.5] - 2016-11-17

### Added

- new types: `Product` and `ProductGet`. Thanks @tojibon!

## [0.6.4] - 2016-09-14

### Fixed

- #2: Invalid CSV is no longer generated if a CSV field contains a backslash
  directly followed by a double-quote (fixed only in the `SimpleGenerator`
  class, `LeagueCsvGenerator` still produces invalid CSV)

## [0.6.3] - 2016-09-14

### Changed

- the minimum required version of Symfony components is now 2.5.0 (before: 3.0)
- removed meaningless badges from README

## [0.6.2] - 2016-02-11

### Fixed

- `league/csv` is installed via `require-dev` to be able to run the unit tests

## [0.6.1] - 2016-02-11

### Changed

- the *require*-dependency on `league/csv` was changed to *suggest*, because
  it's not required for using the Collmex library and I'm trying to reduce the
  dependencies which are pulled in by default.

## [0.6.0] - 2016-01-13

### Added

- Integrated *PHP League CSV*, can be used for CSV generation instead of
  `SimpleGenerator`

## [0.5.3] - 2015-12-08

### Removed

- Removed PHP 5.4 from Travis CI config

## [0.5.1] - 2015-12-08

### Changed

- Updated minimum required PHP version to 5.5.9 (minimum version for
  Symfony 3.x)

## [0.5.0] - 2015-12-08

### Changed

- Updated to Symfony 3.x packages (use the 0.4 branch if you're using
  Symfony 2.x packages)

## [0.4.1] - 2015-11-15

### Fixed

- Bugfix: missing return statement in CsvResponse::isError()

## [0.4.0] - 2015-05-12

### Removed

- removed support for PHP 5.3; PHP 5.4 is the minimum required PHP version now

## [0.3.5] - 2015-01-13

### Added

- introduced `toJSON()` method for types

## [0.3.4] - 2011-11-30

### Changed

- code style fixes to comply with PSR-2

## [0.3.3] - 2014-11-30

### Fixed

- Check if `line` field in error message is set

## [0.3.1] - 2014-11-28

### Added

- `TypeFactory` supports `CustomerOrder` type

## [0.3.0] - 2014-11-28

### Added

- new record type `CustomerOrder` (CMXORD-2)
- run Travis tests against PHP 5.6

## [0.2.0] - 2014-07-01

### Changed

- Updated dependencies (Symfony components 2.3 → 2.5; new UTF-8 encoding fixer)

## [0.1.0] - 2014-02-26

### Added

- initial release


[Psalm]: https://github.com/vimeo/psalm
