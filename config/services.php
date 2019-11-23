<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '493539495825-pqsjdauq30o9v684352lbg7cs7ttah2q.apps.googleusercontent.com',
        'client_secret' => 'ZYQw5hg_My931fti6TcRpTmg',
        'redirect' => 'http://localhost/storekobe/public/google/callback',
    ],
    'facebook' => [
        'client_id' => '581916289003288',
        'client_secret' => '2fc10f779c1a127fe321f5de30b108ca',
        'redirect' => 'http://localhost/storekobe/public/facebook/callback',
    ],

];
