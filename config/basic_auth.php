<?php

return [
    'enabled' => env('BASIC_AUTH_ENABLED', true), // 'true' to enable, 'false' to disable
    'username' => 'admin', // config username
    'password' => 'password', // config password
    'error_message' => 'Unauthorized', // custom error message
    'headers' => [ // config headers
        'WWW-Authenticate' => 'Basic realm="Sample Private Page"',
        'Content-Type' => 'text/plain; charset=utf-8'
    ],
];
