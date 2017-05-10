<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'devicedetect', 'assetsAutoCompress'],
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
//            'normalizer' => [
//                'class' => 'yii\web\UrlNormalizer',
//                'action' => UrlNormalizer::ACTION_REDIRECT_TEMPORARY, // используем временный редирект вместо постоянного
//            ],
            // List all supported languages here
            // Make sure, you include your app's default language.
//            'languages' => ['ru', 'en', 'ua', 'de'],
            'languages' => require(__DIR__ . '/languages.php'),
            'ignoreLanguageUrlPatterns' => [
                '#^images/#' => '#^images/#', // исключение роутингов и URL типа images/ из области действия модуля, может также быть полезным для AJAX-запросов
                '#^uploads/#' => '#^uploads/#',
                '#^fancybox/#' => '#^fancybox/#',
                '#^js/#' => '#^js/#',
                '#^tr#' => '#^tr#',// временно, пока не заполнена /tr версия сайта
            ],
            'rules' => [
                'news/<id:\d+>' => 'news/view',
                'faq/<id:\d+>' => 'faq/view',
                'privacy-policy' => 'static-pages/privacy',
                'terms-of-use' => 'static-pages/terms',
                'web-version' => 'static-pages/webversion',
                'en' => 'static-pages/en', // временно, пока не заполнена /en версия сайта
                'tr' => 'static-pages/tr', // временно, пока не заполнена /tr версия сайта
                'video' => 'static-pages/video',
                'video/how-to-work' => 'static-pages/how',
                'help/print' => 'static-pages/print_ru',
                'help/print/ru' => 'static-pages/print_ru',
                'help/print/en' => 'static-pages/print_en',
                'help/print/tr' => 'static-pages/print_tr',
                '<url:.+/>' => 'site/redirect',
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
//            'class' => 'yii\web\AssetManager',
//            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'js' => [
//                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
//                    ]
//                ],
//                'yii\bootstrap\BootstrapAsset' => [
//                    'css' => [
//                        YII_ENV_DEV ? 'css/bootstrap.css' :         'css/bootstrap.min.css',
//                    ]
//                ],
//                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'js' => [
//                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
//                    ]
//                ]
//            ],
//            'appendTimestamp' => true, // ОТКЛЮЧИТЬ НА ПРОДАКШЕНЕ!!!!!!!
        ],
        'assetsAutoCompress' =>
            [
                'class'         => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
//                'enabled'                       => true,
//                'readFileTimeout'               => 3,           //Time in seconds for reading each asset file
//
//                'jsCompress'                    => true,        //Enable minification js in html code
//                'jsCompressFlaggedComments'     => true,        //Cut comments during processing js
//
//                'cssCompress'                   => true,        //Enable minification css in html code
//
//                'cssFileCompile'                => true,        //Turning association css files
//                'cssFileRemouteCompile'         => false,       //Trying to get css files to which the specified path as the remote file, skchat him to her.
//                'cssFileCompress'               => true,        //Enable compression and processing before being stored in the css file
//                'cssFileBottom'                 => false,       //Moving down the page css files
//                'cssFileBottomLoadOnJs'         => false,       //Transfer css file down the page and uploading them using js
//
//                'jsFileCompile'                 => true,        //Turning association js files
//                'jsFileRemouteCompile'          => false,       //Trying to get a js files to which the specified path as the remote file, skchat him to her.
//                'jsFileCompress'                => true,        //Enable compression and processing js before saving a file
//                'jsFileCompressFlaggedComments' => true,        //Cut comments during processing js
//
//                'htmlCompress'                  => true,        //Enable compression html
//                'noIncludeJsFilesOnPjax'        => true,        //Do not connect the js files when all pjax requests
//                'htmlCompressOptions'           =>              //options for compressing output result
//                    [
//                        'extra' => false,        //use more compact algorithm
//                        'no-comments' => true   //cut all the html comments
//                    ],
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
                'admin' => 'app\modules\admin\controllers\AdminController',
                'security' => 'app\controllers\SecurityController',
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
