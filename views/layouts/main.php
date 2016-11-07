<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$is_mobile = ((Yii::$app->devicedetect->isMobile()) || (Yii::$app->devicedetect->isMobile())) ? true : false;
//var_dump($is_mobile);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?=\yii\helpers\Url::to(['images/favicon.ico']); ?>" type="image/x-icon">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php /*
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();*/
    ?>
    <?php if(!$is_mobile): ?>
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-boss">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="row">
                    <div class="col-lg-5">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Главная</a></li>
                            <li><a href="#">Кто такой Boss</a></li>
                            <li><a href="#">Тарифы</a></li>
                            <li><a href="#">Отзывы</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 blb">
                        <div id="top_logo" class="boss-logo-block">

                        </div>
                        <p id="blb_title">boss</p>
                    </div>
                    <div class="col-lg-5">
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="#">Наши новости</a></li>
                            <li><a href="#">Стать партнером</a></li>
                            <li><a href="#">Мы на связи</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="flag flag-ua" alt="Ukraine"></span>
                                    <span class="glyphicon glyphicon-menu-down boss-countries-icon" aria-hidden="true"></span>
                                </a>
                                <ul class="dropdown-menu boss-countries">
                                    <li><a href="/"><span class="flag flag-ua" alt="Ukraine"></span></a></li>
                                    <li><a href="/ru/"><span class="flag flag-ru" alt="Russia"></span></a></li>
                                    <li><a href="/en/"><span class="flag flag-us" alt="United States"></span></a></li>
                                    <li><a href="/de/"><span class="flag flag-de" alt="Germany"></span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <?php else: ?>
        <nav class="navbar navbar-inverse navbar-fixed-top navbar-boss-mobile">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand boss-mobile-title" href="#">Boss</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Главная</a></li>
                                <li><a href="#">Кто такой Boss</a></li>
                                <li><a href="#">Тарифы</a></li>
                                <li><a href="#">Отзывы</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Наши новости</a></li>
                                <li><a href="#">Стать партнером</a></li>
                                <li><a href="#">Мы на связи</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span class="flag flag-ua" alt="Ukraine"></span>  <span class="caret boss-yellow-color"></span>
                                    </a>
                                    <ul class="dropdown-menu boss-countries">
                                        <li><a href="/"><span class="flag flag-ua" alt="Ukraine"></span></a></li>
                                        <li><a href="/ru/"><span class="flag flag-ru" alt="Russia"></span></a></li>
                                        <li><a href="/en/"><span class="flag flag-us" alt="United States"></span></a></li>
                                        <li><a href="/de/"><span class="flag flag-de" alt="Germany"></span></a></li>
                                        <li><a href="/"><span class="flag flag-ua" alt="Ukraine"></span></a></li>
                                        <li><a href="/ru/"><span class="flag flag-ru" alt="Russia"></span></a></li>
                                        <li><a href="/en/"><span class="flag flag-us" alt="United States"></span></a></li>
                                        <li><a href="/de/"><span class="flag flag-de" alt="Germany"></span></a></li>
                                        <li><a href="/"><span class="flag flag-ua" alt="Ukraine"></span></a></li>
                                        <li><a href="/ru/"><span class="flag flag-ru" alt="Russia"></span></a></li>
                                        <li><a href="/en/"><span class="flag flag-us" alt="United States"></span></a></li>
                                        <li><a href="/de/"><span class="flag flag-de" alt="Germany"></span></a></li>
                                        <li><a href="/"><span class="flag flag-ua" alt="Ukraine"></span></a></li>
                                        <li><a href="/ru/"><span class="flag flag-ru" alt="Russia"></span></a></li>
                                        <li><a href="/en/"><span class="flag flag-us" alt="United States"></span></a></li>
                                        <li><a href="/de/"><span class="flag flag-de" alt="Germany"></span></a></li>
                                        <li><a href="/"><span class="flag flag-ua" alt="Ukraine"></span></a></li>
                                        <li><a href="/ru/"><span class="flag flag-ru" alt="Russia"></span></a></li>
                                        <li><a href="/en/"><span class="flag flag-us" alt="United States"></span></a></li>
                                        <li><a href="/de/"><span class="flag flag-de" alt="Germany"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    <?php endif; ?>

<!--    <div class="container" id="page_content">-->
        <?php /*echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])*/ ?>
        <?= $content ?>
<!--    </div>-->
</div>

<!--BLOCK 11-->
<div class="boss-main-block11">
    <div class="container">
        <?php
        $block11_header = 'Boss';
        $block11_img_path = 'images/';
        $block11_pa_text = 'Кабинет';
        $block11 = [
            0 => [
                0 => [
                    'title' => 'Главная',
                    'url' => '#',
                ],
                1 => [
                    'title' => 'Кто такой Boss',
                    'url' => '#',
                ],
                2 => [
                    'title' => 'Тарифы',
                    'url' => '#',
                ],
                3 => [
                    'title' => 'Отзывы',
                    'url' => '#',
                ],
            ],
            1 => [
                0 => [
                    'title' => 'FAQ',
                    'url' => '#',
                ],
                1 => [
                    'title' => 'Наши новости',
                    'url' => '#',
                ],
                2 => [
                    'title' => 'Стать партнёром',
                    'url' => '#',
                ],
                3 => [
                    'title' => 'Мы на связи',
                    'url' => '#',
                ],
            ],
            2 => [
                0 => [
                    'title' => 'Пользовательское соглашение',
                    'url' => '#',
                ],
                1 => [
                    'title' => 'Политика конфиденциальности',
                    'url' => '#',
                ],
            ],
        ];
        ?>
        <div class="row">
            <div class="col-lg-3 bmb11-content">
                <div class="row">
                    <div class="col-lg-9">
                        <h1 class="bmb11-header"><?= $block11_header; ?></h1>
                        <div class="row">
                            <div class="col-lg-4">
                                <a href="#">
                                    <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_fb.png']); ?>" alt="Youtube Icon"/>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_vk.png']); ?>" alt="Youtube Icon"/>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_youtube.png']); ?>" alt="Youtube Icon"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 bmb11-content">
                <diw class="row">
                    <?php foreach($block11 as $b11_key => $b11_part): ?>
                        <div class="col-lg-<?=($b11_key < 2) ? 3 : 6; ?>">
                            <?php if($b11_key == 2): ?>
                                <div class="bmb11-private-area">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_case.png']); ?>" alt="Footer Case Icon"/>
                                        </div>
                                        <div class="col-lg-10 text-left">
                                            <a href="#" class="b11-pa-text"><?= $block11_pa_text; ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php foreach($b11_part as $b11_item): ?>
                                <div class="b11-row">
                                    <a href="<?=\yii\helpers\Url::to([$b11_item['url']]); ?>"><?= $b11_item['title']; ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </diw>
            </div>
            <div class="col-lg-2 text-right">
                <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'warta_logo.png']); ?>" alt="Warta Logo"/>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
