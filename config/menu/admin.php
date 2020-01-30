<?php

return [
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