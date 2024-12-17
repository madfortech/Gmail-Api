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
        'scheme' => 'https',
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
        'application_name' => env('GOOGLE_APPLICATION_NAME', 'Gmail-Api'),
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'gmail_api_key' =>env('GMAIL_API_KEY'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'), // Ensure this line is present
        'redirect' => env('GOOGLE_REDIRECT_URI'),
        'project_id' => env('GOOGLE_PROJECT_ID'),
        'scopes'           => [\Google\Service\Gmail::MAIL_GOOGLE_COM],
        'access_type'      => 'offline',
        'approval_prompt'  => 'force',
    ],
];
