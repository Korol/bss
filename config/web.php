<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'devicedetect'],
    'language' => 'ru',
    'components' => [
        'devicedetect' => [
            'class' => 'alexandernst\devicedetect\DeviceDetect',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'DbKWw9j29RYV7LxM5Wr3P7s9tsejNZyq',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'user' => [
//            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
//        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'rules' => [
//            ],
//        ],
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // List all supported languages here
            // Make sure, you include your app's default language.
//            'languages' => ['ru', 'en', 'ua', 'de'],
            'languages' => require(__DIR__ . '/languages.php'),
            'ignoreLanguageUrlPatterns' => [
                '#^images/#' => '#^images/#', // исключение роутингов и URL типа images/ из области действия модуля, может также быть полезным для AJAX-запросов
                '#^uploads/#' => '#^uploads/#',
            ],
            'rules' => [
                'news/<id:\d+>' => 'news/view',
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/modules/admin/views/user',
                ],
            ],
        ],
        // Yii2
        'i18n' => [
            'translations' => [
                'admin' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation']
                ],
                'site' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation']
                ],
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true, // ОТКЛЮЧИТЬ НА ПРОДАКШЕНЕ!!!!!!!
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin', 'language_manager'],
                    ]
                ]
            ],
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
//            'admins' => ['andkorol'],
            'adminPermission' => 'rbacAdminAccess',
            'layout' => '@app/modules/admin/views/layouts/admin',
            'modelMap' => [
                'User' => 'app\modules\admin\models\User',
            ],
            'controllerMap' => [
                'admin' => 'app\modules\admin\controllers\AdminController'
            ],
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\RbacWebModule',
            'layout' => '@app/modules/admin/views/layouts/admin',
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
//            'access' => ['@'],
            'access' => ['admin', 'language_manager'],
            'root' => [
                'baseUrl'=>'/web',
//                'baseUrl'=>'@web',
//                'basePath'=>'@webroot',
                'path' => 'uploads/global',
                'name' => 'Global'
            ],
//            'watermark' => [
//                'source'         => __DIR__.'/logo.png', // Path to Water mark image
//                'marginRight'    => 5,          // Margin right pixel
//                'marginBottom'   => 5,          // Margin bottom pixel
//                'quality'        => 95,         // JPEG image save quality
//                'transparency'   => 70,         // Water mark image transparency ( other than PNG )
//                'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
//                'targetMinPixel' => 200         // Target image minimum pixel size
//            ]
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
