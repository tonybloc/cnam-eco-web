<?php

return [
    'settings' => [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => false,
        'doctrine' => [
            'dev_mode' => true,
            'cache_dir' => __DIR__ . '/../var/cache/doctrine',
            'metadata_dirs' => [__DIR__ . '/yaml'],
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'port' => 3306,
                'dbname' => 'db-demo-shop',
                'user' => 'anm',
                'password' => 'wYC0zSq5up3wCOzt'
            ]
        ]
    ]
];

?>