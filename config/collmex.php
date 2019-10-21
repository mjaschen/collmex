<?php

declare(strict_types=1);

/*
 * The credentials for Collmex
 *
 * Used by CollmexServiceProvider when running under Laravel 4.
 */
return [
    'user' => env('COLLMEX_USER', ''),
    'password' => env('COLLMEX_PASSWORD', ''),
    'customer' => env('COLLMEX_CUSTOMER_ID', ''),
];
