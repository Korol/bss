<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$is_mobile = ((Yii::$app->devicedetect->isMobile()) || (Yii::$app->devicedetect->isTablet())) ? true : false;

$top_menu = [
    'left' => [
        'main' => [
            'title' => 'Main Page',
            'url' => '/',
        ],
        'about' => [
            'title' => 'About Boss',
            'url' => '/about',
        ],
        'price' => [
            'title' => 'Price',
            'url' => '/price',
        ],
        'feedback' => [
            'title' => 'Feedback',
            'url' => '/feedback',
        ],
        'faq' => [
            'title' => 'FAQ',
            'url' => '/faq',
        ],
    ],
    'right' => [
        'news' => [
            'title' => 'News',
            'url' => '/news',
        ],
        'partner' => [
            'title' => 'Become a partner',
            'url' => '/#',
        ],
        'contact' => [
            'title' => 'Contact',
            'url' => '/#',
        ],
    ],
];
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

<div class="wrap <?= (!empty($this->params['wrap_class'])) ? $this->params['wrap_class'] : ''; ?>">
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
                    <div class="col-lg-5 col-md-5">
                        <ul class="nav navbar-nav pull-right">
<!--                            <li class="active"><a href="#">Главная</a></li>-->
                            <?php foreach($top_menu['left'] as $tml_key => $tm_left): ?>
                            <li <?=($tml_key == $this->params['active_top_menu']) ? 'class="active"' : ''; ?>>
                                <a href="<?= \yii\helpers\Url::to([$tm_left['url']]); ?>"><?= $tm_left['title']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-2 col-md-2 blb">
                        <div id="top_logo" class="boss-logo-block">

                        </div>
                        <p id="blb_title">boss</p>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <ul class="nav navbar-nav navbar-left">
                            <?php foreach($top_menu['right'] as $tmr_key =>$tm_right): ?>
                                <li <?=($tmr_key == $this->params['active_top_menu']) ? 'class="active"' : ''; ?>>
                                    <a href="<?= \yii\helpers\Url::to([$tm_right['url']]); ?>"><?= $tm_right['title']; ?></a>
                                </li>
                            <?php endforeach; ?>
                            <li class="dropdown flags-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="flag flag-<?= $this->params['current_language']['flag']; ?>" alt="<?= $this->params['current_language']['title_en']; ?>"></span>
                                    <span class="glyphicon glyphicon-menu-down boss-countries-icon" aria-hidden="true"></span>
                                </a>
                            <?php
                            if(!empty($this->params['all_languages'])):
                            ?>
                                <ul class="dropdown-menu boss-countries">
                                <?php foreach($this->params['all_languages'] as $lang): ?>
                                    <li>
                                        <a href="<?= '/' . $lang['url']; ?>" title="<?= $lang['title_en']; ?>">
                                            <span class="flag flag-<?= $lang['flag']; ?>" alt="<?= $lang['title_en']; ?>"></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <?php else: ?>
        <nav class="navbar navbar-inverse navbar-fixed-top navbar-boss-mobile">
            <div class="container-fluid">
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
                                <?php foreach($top_menu['left'] as $tml_key => $tm_left): ?>
                                    <li <?=($tml_key == $this->params['active_top_menu']) ? 'class="active"' : ''; ?>>
                                        <a href="<?= \yii\helpers\Url::to([$tm_left['url']]); ?>"><?= $tm_left['title']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                                <?php foreach($top_menu['right'] as $tmr_key =>$tm_right): ?>
                                    <li <?=($tmr_key == $this->params['active_top_menu']) ? 'class="active"' : ''; ?>>
                                        <a href="<?= \yii\helpers\Url::to([$tm_right['url']]); ?>"><?= $tm_right['title']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span class="flag flag-<?= $this->params['current_language']['flag']; ?>" alt="<?= $this->params['current_language']['title_en']; ?>"></span>
                                        <span class="glyphicon glyphicon-menu-down boss-countries-icon" aria-hidden="true"></span>
                                    </a>
                                    <?php
                                    if(!empty($this->params['all_languages'])):
                                        ?>
                                        <ul class="dropdown-menu boss-countries">
                                            <?php foreach($this->params['all_languages'] as $lang): ?>
                                                <li>
                                                    <a href="<?= '/' . $lang['url']; ?>" title="<?= $lang['title_en']; ?>">
                                                        <span class="flag flag-<?= $lang['flag']; ?>" alt="<?= $lang['title_en']; ?>"></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
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

<!--BLOCK 9-->
<div class="boss-main-block9">
    <div class="container">
        <?php
        if(!empty($this->params['videos'])){
            $block9 = $this->params['videos'];
            $block9_header = $this->params['videos'][0]['header'];
        }
        else {
            $block9_header = 'Узнай больше о boss';
            $block9 = [
                0 => [
                    'code' => '4cTGrUQIYeo',
                ],
                1 => [
                    'code' => 'X78wiDUt9SM',
                ],
                2 => [
                    'code' => 'rXKVYb59uhA',
                ],
                3 => [
                    'code' => 'rXKVYb59uhA',
                ],
                4 => [
                    'code' => '4cTGrUQIYeo',
                ],
                5 => [
                    'code' => 'X78wiDUt9SM',
                ],
            ];
        }
        $block9_chunked = array_chunk($block9, 3);
        ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="bmb3-header header-white text-left ml30"><?= $block9_header; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="bmb9-carousel-wrapper">
                    <div id="block9_carousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php foreach($block9_chunked as $b9_chunk_key => $b9_chunk): ?>
                                <div class="item <?= ($b9_chunk_key == 0) ? 'active' : ''; ?>">
                                    <div class="row">
                                        <?php foreach($b9_chunk as $b9_key => $b9_item): ?>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $b9_item['code']; ?>?rel=0&amp;controls=2&amp;modestbranding=1&amp;showinfo=0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#block9_carousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#block9_carousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 10-->
<div class="boss-main-block10">
    <div class="container">
        <?php
        $block10_left = 'Подписывайтесь<br/>на наш канал';
        $block10_right = 'Будем рады подружиться с вами<br/>в социальных сетях';
        $block10_img_path = '@web/images/';
        ?>
        <div class="row bmb10-content">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <p class="bmb10-p text-right"><?= $block10_left; ?></p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb10-social-icon">
                        <a href="#">
                            <img src="<?=\yii\helpers\Url::to([$block10_img_path . 'ubob_youtube.png']); ?>" alt="Youtube Icon"/>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb10-social-icon">
                        <a href="#">
                            <img src="<?=\yii\helpers\Url::to([$block10_img_path . 'ubob_fb.png']); ?>" alt="Facebook Icon"/>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb10-social-icon">
                        <a href="#">
                            <img src="<?=\yii\helpers\Url::to([$block10_img_path . 'ubob_vk.png']); ?>" alt="VK Icon"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-4">
                <p class="bmb10-p text-left"><?= $block10_right; ?></p>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 11-->
<div class="boss-main-block11">
    <div class="container">
        <?php
        $block11_header = 'Boss';
        $block11_img_path = '@web/images/';
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
            <div class="col-lg-3 col-md-3 col-sm-3 bmb11-content">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <h1 class="bmb11-header"><?= $block11_header; ?></h1>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb11-social-icon">
                                <a href="#">
                                    <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_fb.png']); ?>" alt="Youtube Icon"/>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb11-social-icon">
                                <a href="#">
                                    <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_vk.png']); ?>" alt="Youtube Icon"/>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb11-social-icon">
                                <a href="#">
                                    <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_youtube.png']); ?>" alt="Youtube Icon"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 bmb11-content">
                <div class="row">
                    <?php foreach($block11 as $b11_key => $b11_part): ?>
                        <div class="col-lg-<?=($b11_key < 2) ? 3 : 6; ?> col-md-<?=($b11_key < 2) ? 3 : 6; ?> col-sm-<?=($b11_key < 2) ? 3 : 6; ?>">
                            <?php /*if($b11_key == 2): ?>
                                <div class="bmb11-private-area">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                            <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_case.png']); ?>" alt="Footer Case Icon"/>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 text-left">
                                            <a href="#" class="b11-pa-text"><?= $block11_pa_text; ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;*/ ?>
                            <?php foreach($b11_part as $b11_item): ?>
                                <div class="b11-row">
                                    <a href="<?=\yii\helpers\Url::to([$b11_item['url']]); ?>"><?= $b11_item['title']; ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 text-right bmb11-center">
                <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'warta_logo.png']); ?>" alt="Warta Logo"/>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
