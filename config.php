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
            'host' => "127.0.0.1",
            'user' => "dbo282171973",
            'pass' => "MySQL123!",
            'dbname' => "db282171973",
            'socket' => ":/kunden/tmp/mysql5.sock",
        ]
    ],
];
