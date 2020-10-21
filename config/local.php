<?php
$params = require __DIR__ . '/params.php';

$db = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=mariadb;dbname=restaurant',
    'username' => 'root',
    'password' => 'docker',
    'charset' => 'utf8mb4',
];

return [
    'yiiDebug' => true,
    'yiiEnv' => 'stage',
    'web' => [
        'bootstrap' => ['debug'],
        'components' => [
            'log' => [
                'traceLevel' => 3,
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'db' => $db,
        ],
        'modules' => [
            'gii' => ['class' => \yii\gii\Module::class],
            'debug' => ['class' => \yii\debug\Module::class]
        ],
        'params' => $params,
    ],
    'console' => [
        'components' => [
            'db' => $db,
        ],
        'params' => $params,
    ]
];