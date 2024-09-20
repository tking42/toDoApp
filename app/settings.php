<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'renderer' => [
                'template_path' => __DIR__ . '/../templates/',
            ],
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'db' => [
                'host' => 'mysql:host=db;',
                'name' => 'dbname=toDo',
                'user' => 'root',
                'password' => 'password',
                'debug' => true,
                'options' => [
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            ]
        ],
    ]);
};
