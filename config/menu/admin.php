<?php

return [
    [
        'title' => \Yii::t('app', 'Заявки'),
        'url' => ['/admin/requests/request/index'],
        'active' => ['module' => 'requests'],
        'icon' => 'plus-square',
        'isVisible' => ['admin']
    ],
    [
        'title' => \Yii::t('app', 'Заявка'),
        'url' => ['/admin/request_items/request-items/index'],
        'active' => ['module' => 'request_items'],
        'icon' => 'random',
        'isVisible' => ['admin']
    ],
    [
        'title' => \Yii::t('app', 'Рестораны'),
        'url' => ['/admin/restaurants/restaurants/index'],
        'active' => ['module' => 'restaurants'],
        'icon' => 'cutlery',
        'isVisible' => ['admin']
    ],
    [
        'title' => \Yii::t('app', 'Столы'),
        'url' => ['/admin/tables/tables/index'],
        'active' => ['module' => 'tables'],
        'icon' => 'coffee',
        'isVisible' => ['admin']
    ],
    [
        'title' => \Yii::t('app', 'Меню'),
        'url' => ['/admin/menu_items/menu-items/index'],
        'active' => ['module' => 'menu_items'],
        'icon' => 'navicon',
        'isVisible' => ['admin']
    ],
    [
        'title' => \Yii::t('admin', 'Справочник'),
        'icon' => 'bookmark',
        'isVisible' => ['admin'],
        'items' => [
            [
                'title' => \Yii::t('app', 'Типы меню'),
                'url' => ['/admin/menu_types/menu-types/index'],
                'active' => ['module' => 'menu_types'],
                'icon' => 'puzzle-piece',
                'isVisible' => ['admin']
            ],
            [
                'title' => \Yii::t('app', 'Статусы заявок'),
                'url' => ['/admin/request_statuses/request-statuses/index'],
                'active' => ['module' => 'request_statuses'],
                'icon' => 'puzzle-piece',
                'isVisible' => ['admin']
            ],
        ]
    ],
    [
        'title' => \Yii::t('admin', 'Система'),
        'icon' => 'gear',
        'isVisible' => ['admin'],
        'items' => [
            [
                'title' => \Yii::t('app', 'Настройки'),
                'url' => ['/admin/settings/index'],
                'active' => ['module' => 'admin', 'controller' => 'settings'],
                'icon' => 'wrench',
                'isVisible' => ['admin']
            ],
            [
                'title' => \Yii::t('app', 'Файловый менеджер'),
                'url' => ['/admin/default/elfinder'],
                'active' => ['module' => 'admin', 'controller' => 'default', 'action' => 'elfinder'],
                'icon' => 'file-zip-o',
                'isVisible' => ['admin']
            ],
            [
                'title' => \Yii::t('app', 'Переводы'),
                'url' => ['/admin/i18n/default'],
                'active' => ['module' => 'i18n', 'controller' => 'default'],
                'icon' => 'language',
                'isVisible' => ['admin']
            ],
            [
                'title' => \Yii::t('app', 'Мета-теги'),
                'url' => ['/admin/meta-page/index'],
                'active' => ['module' => 'admin', 'controller' => 'meta-page'],
                'icon' => 'tags',
                'isVisible' => ['admin']
            ],
        ]
    ]
];