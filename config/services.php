<?php

return [

    /*
      |--------------------------------------------------------------------------
      | Third Party Services
      |--------------------------------------------------------------------------
      |
      | This file is for storing the credentials for third party services such
      | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
      | default location for this type of information, allowing packages
      | to have a conventional place to find your various credentials.
      |
     */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],
    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],
    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    /**
     * add facebook ID 
     */
    'facebook' => [
        'client_id'     => '1212597675425450',
        'client_secret' => '17b9a15d03236486d1835959ca2a7ed2',
        'redirect'      => 'http://cuahangbachhoa247.com/laravel-onlineshop/public/callback'
    ],
];
//http://blog.damirmiladinov.com/laravel/laravel-5.2-socialite-facebook-login.html#.V2yPlfmLTcs
//'http://localhost:8888/laravel-onlineshop/public/callback',