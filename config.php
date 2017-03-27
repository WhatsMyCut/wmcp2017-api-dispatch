<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
/*
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . './templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
*/
        // DB settings
        'db' => [
            'host' => "localhost",
            'user' => "db0607588094",
            'pass' => "MySQL123!",
            'dbname' => "db607588094",
            'socket' => ":/kunden/tmp/mysql5.sock",
        ]
    ],
];
