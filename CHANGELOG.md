# Change Log

All notable changes to `mjaschen/collmex` will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).
Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## [0.6.3] - 2016-09-14

### Changed

* the minimum required version of Symfony components is now 2.5.0 (before: 3.0)
* removed meaningless badges from README

## [0.6.2] - 2016-02-11

### Fixed

* `league/csv` is installed via `require-dev` to be able to run the unit tests

## [0.6.1] - 2016-02-11

### Changed

* the *require*-dependency on `league/csv` was changed to *suggest*, because it's not required
  for using the Collmex library and I'm trying to reduce the dependencies which are pulled
  in by default.

## [0.6.0] - 2016-01-13

### Added

* Integrated *PHP League CSV*, can be used for CSV generation instead of `SimpleGenerator`

## [0.5.3] - 2015-12-08

### Removed

* Removed PHP 5.4 from Travis CI config

## [0.5.1] - 2015-12-08

### Changed

* Updated minimum required PHP version to 5.5.9 (minimum version for Symfony 3.x)

## [0.5.0] - 2015-12-08

### Changed

* Updated to Symfony 3.x packages (use the 0.4 branch if you're using Symfony 2.x packages)

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

* Check if "line" field in error message is set

## [0.3.1] - 2014-11-28

### Added

* TypeFactory supports "CustomerOrder" type

## [0.3.0] - 2014-11-28

### Added

* new record type "CustomerOrder" (CMXORD-2)
* run Travis tests against PHP 5.6

## [0.2.0] - 2014-07-01

### Changed

* Updated dependencies (Symfony components 2.3 → 2.5; new UTF-8 encoding fixer)

## [0.1.0] - 2014-02-26

### Added

* initial Release
