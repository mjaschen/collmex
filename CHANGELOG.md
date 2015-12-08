CHANGELOG
=========

0.5.3
-----

  * Removed PHP 5.4 from Travis CI config

0.5.1
-----

  * Updated minimum required PHP version to 5.5.9 (minimum version for Symfony 3.x)

0.5.0
-----

  * Updated to Symfony 3.x packages (use the 0.4 branch if you're using Symfony 2.x packages)

0.4.1
-----

  * Bugfix: missing return statement in CsvResponse::isError()

0.4.0
-----

 * PHP 5.4 as minimum required PHP version

0.3.5
-----

 * introduced `toJSON()` method for types

0.3.4
-----

 * PSR-2 fixes

0.3.3
-----

 * Check if "line" field in error message is set

0.3.1
-----

 * TypeFactory supports "CustomerOrder" type

0.3.0
-----

 * new record type "CustomerOrder" (CMXORD-2)
 * run Travis tests against PHP 5.6

0.2.0
-----

 * Updated dependencies (Symfony components 2.3 → 2.5; new UTF-8 encoding fixer)

0.1.0
-----

 * initial Release
