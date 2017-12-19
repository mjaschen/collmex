<?php
/**
 * The credentials for Collmex
 *
 * Used by CollmexServiceProvider when running under Laravel 4.
 */
return [
    'client_id' => env('COLLMEX_CLIENT_ID', ''),
    'user'      => env('COLLMEX_USER', ''),
    'password'  => env('COLLMEX_PASSWORD', ''),
    'customer'  => env('COLLMEX_CUSTOMER_ID', ''),
];