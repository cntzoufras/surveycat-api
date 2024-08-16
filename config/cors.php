<?php

return [

    'paths'                    => ['api/*', 'sanctum/csrf-cookie', 'login'],
    'allowed_methods'          => ['*'],
//    'allowed_origins' => ['*'],
    'allowed_origins'          => [
        'http://localhost:3000',
        'http://surveycat.test',
        'http://surveycat.test:3000',
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers'          => ['*'],
    'exposed_headers'          => [],
    'max_age'                  => 0,
    'supports_credentials'     => true,
];