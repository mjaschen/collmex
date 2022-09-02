<?php

if (PHP_SAPI !== 'cli') {
    die('This script supports command line usage only. Please check your command.');
}

$rules = [
    '@PER' => true,
    '@PER:risky' => true,
    '@PHP80Migration:risky' => true,
    '@PHP81Migration' => true,
    'use_arrow_functions' => false, // remove after migrating to PHP 7.4+
];

$finder = \PhpCsFixer\Finder::create()
                            ->exclude('vendor')
                            ->in(__DIR__);

return (new \PhpCsFixer\Config())->setRules($rules)
                                 ->setRiskyAllowed(true)
                                 ->setFinder($finder);
