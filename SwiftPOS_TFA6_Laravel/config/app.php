<?php
return [
    'name' => env('APP_NAME', 'SwiftPOS'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => 'Asia/Manila',
    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => 'en',
    'faker_locale' => 'en_PH',
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),
    'previous_keys' => [],
    'maintenance' => ['driver' => 'file'],
];
