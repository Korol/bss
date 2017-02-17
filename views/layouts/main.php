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
            'title' => Yii::t('site', 'Main Page'),
            'url' => '/',
        ],
        'about' => [
            'title' => Yii::t('site', 'About Boss'),
            'url' => '/about',
        ],
        'price' => [
            'title' => Yii::t('site', 'Price'),
            'url' => '/price',
        ],
        'feedback' => [
            'title' => Yii::t('site', 'Feedback'),
            'url' => '/feedback',
        ],
        'faq' => [
            'title' => Yii::t('site', 'FAQ'),
            'url' => '/faq',
        ],
    ],
    'right' => [
        'news' => [
            'title' => Yii::t('site', 'News'),
            'url' => '/news',
        ],
        'partner' => [
            'title' => Yii::t('site', 'Become a partner'),
            'url' => '/partner',
        ],
        'contact' => [
            'title' => Yii::t('site', 'Contact'),
            'url' => '/contact',
        ],
    ],
];
$seo = (!empty($this->params['seo'][$this->params['active_top_menu']])) ? $this->params['seo'][$this->params['active_top_menu']] : ['keywords' => '', 'description' => '', 'title' => ''];
$this->registerMetaTag(['name' => 'keywords', 'content' => $seo['keywords']]);
$this->registerMetaTag(['name' => 'description', 'content' => $seo['description']]);
$this->registerMetaTag(['name' => 'title', 'content' => $seo['title']]);
$this->title = (!empty($seo['title'])) ? $seo['title'] : $this->title;
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
    <?php
    if(!empty($this->params['site_settings']['head'])){
        foreach($this->params['site_settings']['head'] as $head_param){
            echo $head_param;
        }
    }
    ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
if(!empty($this->params['site_settings']['body_start'])){
    foreach($this->params['site_settings']['body_start'] as $body_start_param){
        echo $body_start_param;
    }
}
?>
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
                <a class="navbar-brand" href="#">BOSS</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 top-menu-leftside">
                        <ul class="nav navbar-nav pull-right">
                            <?php foreach($top_menu['left'] as $tml_key => $tm_left): ?>
                            <li <?=($tml_key == $this->params['active_top_menu']) ? 'class="active"' : ''; ?>>
                                <a href="<?= \yii\helpers\Url::to([$tm_left['url']]); ?>"><?= $tm_left['title']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 blb">
                        <div id="top_logo" class="boss-logo-block"></div>
                        <p id="blb_title">boss</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 top-menu-rightside">
                        <ul class="nav navbar-nav navbar-left">
                            <?php foreach($top_menu['right'] as $tmr_key =>$tm_right): ?>
                                <li <?=($tmr_key == $this->params['active_top_menu']) ? 'class="active"' : ''; ?>>
                                    <a href="<?= \yii\helpers\Url::to([$tm_right['url']]); ?>"><?= $tm_right['title']; ?></a>
                                </li>
                            <?php endforeach; ?>
                            <li class="dropdown flags-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="flag flag-<?= $this->params['current_language']['flag']; ?>" alt="<?= $this->params['current_language']['title_en']; ?>"></span>
                                    <?php if(!empty($this->params['all_languages'])): ?>
                                    <span class="glyphicon glyphicon-menu-down boss-countries-icon" aria-hidden="true"></span>
                                    <?php endif; ?>
                                </a>
                            <?php
                            if(!empty($this->params['all_languages'])):
                            ?>
                                <ul class="dropdown-menu boss-countries">
                                <?php foreach($this->params['all_languages'] as $lang): ?>
                                    <li>
                                        <a href="<?= '/' . $lang['url']; ?>" title="<?= $lang['title_en']; ?>">
                                            <span class="flag flag-<?= $lang['flag']; ?>" alt="<?= $lang['title_en']; ?>"></span> <?= $lang['title_en']; ?>
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
                    <a class="navbar-brand boss-mobile-title" href="<?=\yii\helpers\Url::to(['/']); ?>">Boss</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="row">
                        <div class="col-lg-12 top-menu-leftside">
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
                                        <?php if(!empty($this->params['all_languages'])): ?>
                                        <span class="glyphicon glyphicon-menu-down boss-countries-icon" aria-hidden="true"></span>
                                        <?php endif; ?>
                                    </a>
                                    <?php
                                    if(!empty($this->params['all_languages'])):
                                        ?>
                                        <ul class="dropdown-menu boss-countries">
                                            <?php foreach($this->params['all_languages'] as $lang): ?>
                                                <li>
                                                    <a href="<?= '/' . $lang['url']; ?>" title="<?= $lang['title_en']; ?>">
                                                        <span class="flag flag-<?= $lang['flag']; ?>" alt="<?= $lang['title_en']; ?>"></span> <?= $lang['title_en']; ?>
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
        $block10_left = 'Subscribe<br/>to our channel';
        $block10_right = 'We will be glad to make friends<br/>with you on social networks';
        $block10_img_path = '@web/images/';
        ?>
        <div class="row bmb10-content">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <p class="bmb10-p text-right"><?= Yii::t('site', $block10_left); ?></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb10-social-icon text-center">
                        <a href="<?= $this->params['page_links']['youtube']; ?>" target="_blank">
                            <img src="<?=\yii\helpers\Url::to([$block10_img_path . 'ubob_youtube_new.png']); ?>" alt="Youtube Icon"/>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb10-social-icon text-center">
                        <a href="<?= $this->params['page_links']['facebook']; ?>" target="_blank">
                            <img src="<?=\yii\helpers\Url::to([$block10_img_path . 'ubob_fb2_new.png']); ?>" alt="Facebook Icon"/>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb10-social-icon text-center">
                        <a href="<?= $this->params['page_links']['vk']; ?>" target="_blank">
                            <img src="<?=\yii\helpers\Url::to([$block10_img_path . 'ubob_vk2_new.png']); ?>" alt="VK Icon"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-4 col-sm-4">
                <p class="bmb10-p text-left"><?= Yii::t('site', $block10_right); ?></p>
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
                    'title' => Yii::t('site', 'Main Page'),
                    'url' => '/',
                ],
                1 => [
                    'title' => Yii::t('site', 'About Boss'),
                    'url' => '/about',
                ],
                2 => [
                    'title' => Yii::t('site', 'Price'),
                    'url' => '/price',
                ],
                3 => [
                    'title' => Yii::t('site', 'Feedback'),
                    'url' => '/feedback',
                ],
            ],
            1 => [
                0 => [
                    'title' => Yii::t('site', 'FAQ'),
                    'url' => '/faq',
                ],
                1 => [
                    'title' => Yii::t('site', 'News'),
                    'url' => '/news',
                ],
                2 => [
                    'title' => Yii::t('site', 'Become a partner'),
                    'url' => '/partner',
                ],
                3 => [
                    'title' => Yii::t('site', 'Contact'),
                    'url' => '/contact',
                ],
            ],
            2 => [
                0 => [
                    'title' => Yii::t('site', 'Terms of use'),
                    'url' => '/terms-of-use',
                ],
                1 => [
                    'title' => Yii::t('site', 'Privacy policy'),
                    'url' => '/privacy-policy',
                ],
                2 => [
                    'title' => $this->params['page_links']['email_help'],
                    'url' => $this->params['page_links']['email_help'],
                ],
            ],
        ];
        ?>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 bmb11-content">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <?php /*h1 class="bmb11-header"><?= $block11_header; ?></h1*/?>
                        <div class="row footer-boss">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_boss.png']); ?>" class="footer-boss-img" alt="Boss Icon"/>
                            </div>
                        </div>
                        <div class="row footer-boss-socials">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb11-social-icon">
                                <a href="<?= $this->params['page_links']['facebook']; ?>" target="_blank">
                                    <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_fb.png']); ?>" alt="Youtube Icon"/>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb11-social-icon">
                                <a href="<?= $this->params['page_links']['vk']; ?>" target="_blank">
                                    <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'footer_vk.png']); ?>" alt="Youtube Icon"/>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bmb11-social-icon">
                                <a href="<?= $this->params['page_links']['youtube']; ?>" target="_blank">
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
                                    <?= (strpos($b11_item['url'], '@') !== false) ? Html::mailto($b11_item['url'], $b11_item['url']) : Html::a($b11_item['title'], \yii\helpers\Url::to([$b11_item['url']])); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 text-right bmb11-center">
                <img src="<?=\yii\helpers\Url::to([$block11_img_path . 'warta_logo.png']); ?>" alt="Warta Logo" class="warta-logo-img"/>
            </div>
        </div>
    </div>
</div>
<a href="#" id="scrollup">Наверх</a>

<?php $this->endBody() ?>
<?php
if(!empty($this->params['site_settings']['body_end'])){
    foreach($this->params['site_settings']['body_end'] as $body_end_param){
        echo $body_end_param;
    }
}
?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-83863531-1', 'auto');
    ga('send', 'pageview');

</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter39494765 = new Ya.Metrika({
                    id:39494765,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39494765" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- {literal} -->
<!-- <script type='text/javascript'>
window['li'+'ve'+'T'+'ex'] = true,
window['liv'+'eTe'+'xID'] = 120368,
window['live'+'T'+'ex_'+'obj'+'ect'] = true;
(function() {
var t = document['c'+'reate'+'Eleme'+'nt']('script');
t.type ='text/javascript';
t.async = true;
t.src = '//cs15.li'+'vetex.ru/j'+'s/cli'+'ent.js';
var c = document['getElement'+'sByT'+'a'+'gNam'+'e']('script')[0];
if ( c ) c['pare'+'ntNod'+'e']['ins'+'ert'+'Before'](t, c);
else document['do'+'cumentE'+'leme'+'n'+'t']['fi'+'rstCh'+'ild']['a'+'p'+'pen'+'d'+'C'+'hil'+'d'](t);
})();
</script> -->
<!-- {/literal} -->
</body>
</html>
<?php $this->endPage() ?>
