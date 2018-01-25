# Change Log

All notable changes to `mjaschen/collmex` will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).
Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/)
principles.

## [0.7.1] - 2018-01-25

### Added

* Support for Laravel package auto-discovery. Thanks to @Naoray!
* Links to Packagist and Travis CI in the README. Thanks to @oliverklee!

### Changed

* Make the runtime dependencies more lenient. Thanks to @oliverklee!
* Announce PHP compatibility only up to 7.2.x. Thanks to @oliverklee!

## [0.7.0] - 2018-01-07

### Changed

* As of version 0.7.0 the Collmex SDK requires at least PHP 5.6.

## [0.6.21] - 2018-01-07

### Added

* new types: `PurchaseOrder` (`CMXPOD`) and `PurchaseOrderGet`
  (`PURCHASE_ORDER_GET`). Thanks to @Argee88!

## [0.6.20] - 2018-01-05

### Added

* new methods `toArray()` and `toJSON()` for types.

### Fixed

* return type hint for `getCSV()` in doc block.

## [0.6.19] - 2017-12-20

### Changed

* updated the included Laravel service provider for compatibility with
  Laravel 5.x. Thanks to Naoray!

## [0.6.18] - 2017-11-21

### Added

* new types: `Member` (`CMXMGD`), `MemberGet` (`MEMBER_GET`). Thanks to
  Sebastian Gunreben!

## [0.6.17] - 2017-09-22

### Added

* new type: `TrackingNumber` (`TRACKING_NUMBER`). Thanks @Argee88!

## [0.6.16] - 2017-09-14

### Added

* The unparsed contents of the Collmex response can be accessed with
  `CsvResponse::getResponseRaw()`.

## [0.6.15] - 2017-09-11

### Added

* new type: `ProductPriceChange` (`CMXPRI_CHANGE`). Thanks @Argee88!

## [0.6.14] - 2017-03-28

### Added

* new type: `PaymentConfirmation` (`PAYMENT_CONFIRMATION`). Thanks @Argee88!

## [0.6.13] - 2017-03-24

### Added

* new types: `Delivery` (`CMXDLV`), `DeliveryGet` (`DELIVERY_GET`),
  `DifferentShippingAddress` (`CMXEPF`). Thanks @Argee88!
* new fields in `Customer` type. Thanks @Argee88!

## [0.6.12] - 2017-03-14

### Added

* new types: `ProductPrice` (`CMXPRI`), `ProductPriceGet`
  (`PRODUCT_PRICE_GET`), `Stock` (`CMXSTK`), `StockAvailable`
  (`STOCK_AVAILABLE`), `StockAvailableGet` (`STOCK_AVAILABLE_GET`),
  `StockGet (`STOCK_GET`)`. Thanks @Argee88!

## [0.6.11] - 2017-03-08

### Fixed

* Verifying field names in mass-assignment (`populateData()`)

## [0.6.10] - 2017-02-17

### Changed

* Travis-CI: add PHP 7.1 and remove HHVM.

## [0.6.9] - 2017-02-17

### Added

* new type: `SalesOrderGet` (`SALES_ORDER_GET`). Thanks @cryshell!

## [0.6.8] - 2017-01-10

### Changed

* Throw `InvalidResponseMimeTypeException` instead of `\RuntimeException`.

## [0.6.7] - 2017-01-10

### Added

* `ResponseInterface`
* The ResponseFactory throws an exception if the MIME type can't be determined.

## [0.6.6] - 2016-12-13

### Added

* new type: `SubscriptionGet` (`ABO_GET`). Thanks @karameloso!

## [0.6.5] - 2016-11-17

### Added

* new types: `Product` and `ProductGet`. Thanks @tojibon!

## [0.6.4] - 2016-09-14

### Fixed

* #2: Invalid CSV is no longer generated if a CSV field contains a backslash
  directly followed by a double-quote (fixed only in the `SimpleGenerator`
  class, `LeagueCsvGenerator` still produces invalid CSV)

## [0.6.3] - 2016-09-14

### Changed

* the minimum required version of Symfony components is now 2.5.0 (before: 3.0)
* removed meaningless badges from README

## [0.6.2] - 2016-02-11

### Fixed

* `league/csv` is installed via `require-dev` to be able to run the unit tests

## [0.6.1] - 2016-02-11

### Changed

* the *require*-dependency on `league/csv` was changed to *suggest*, because
  it's not required for using the Collmex library and I'm trying to reduce the
  dependencies which are pulled in by default.

## [0.6.0] - 2016-01-13

### Added

* Integrated *PHP League CSV*, can be used for CSV generation instead of
  `SimpleGenerator`

## [0.5.3] - 2015-12-08

### Removed

* Removed PHP 5.4 from Travis CI config

## [0.5.1] - 2015-12-08

### Changed

* Updated minimum required PHP version to 5.5.9 (minimum version for
  Symfony 3.x)

## [0.5.0] - 2015-12-08

### Changed

* Updated to Symfony 3.x packages (use the 0.4 branch if you're using
  Symfony 2.x packages)

## [0.4.1] - 2015-11-15

### Fixed

* Bugfix: missing return statement in CsvResponse::isError()

## [0.4.0] - 2015-05-12

### Removed

* removed support for PHP 5.3; PHP 5.4 is the minimum required PHP version now

## [0.3.5] - 2015-01-13

### Added

* introduced `toJSON()` method for types

## [0.3.4] - 2011-11-30

### Changed

* code style fixes to comply with PSR-2

## [0.3.3] - 2014-11-30

### Fixed

* Check if `line` field in error message is set

## [0.3.1] - 2014-11-28

### Added

* TypeFactory supports `CustomerOrder` type

## [0.3.0] - 2014-11-28

### Added

* new record type `CustomerOrder` (CMXORD-2)
* run Travis tests against PHP 5.6

## [0.2.0] - 2014-07-01

### Changed

* Updated dependencies (Symfony components 2.3 → 2.5; new UTF-8 encoding fixer)

## [0.1.0] - 2014-02-26

### Added

* initial Release
