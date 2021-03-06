<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAdminAsset;

AppAdminAsset::register($this);

$menu = [
    'admin' => [
        [
            'label' => Yii::t('admin', 'Main page'),
            'items' => [
                ['label' => Yii::t('admin', 'Blocks'), 'url' => ['/admin/main-page/index']],
                ['label' => Yii::t('admin', 'Banners'), 'url' => ['/admin/banner/index']],
                ['label' => Yii::t('admin', 'Videos'), 'url' => ['/admin/video/index']],
            ],
        ],
        ['label' => Yii::t('admin', 'News'), 'url' => ['/admin/news/index']],
        ['label' => Yii::t('admin', 'Feedbacks'), 'url' => ['/admin/feedback/index']],
        [
            'label' => Yii::t('admin', 'Price'),
            'items' => [
                ['label' => Yii::t('admin', 'Tariffs'), 'url' => ['/admin/price/index']],
                ['label' => Yii::t('admin', 'Options'), 'url' => ['/admin/option/index']],
                ['label' => Yii::t('admin', 'Tariffs <-> Options'), 'url' => ['/admin/price-option/index']],
                ['label' => Yii::t('admin', 'Translation Tariffs'), 'url' => ['/admin/price-lang/index']],
                ['label' => Yii::t('admin', 'Translation Options'), 'url' => ['/admin/option-lang/index']],
            ],
        ],
        [
            'label' => Yii::t('admin', 'About'),
            'items' => [
                ['label' => Yii::t('admin', 'About'), 'url' => ['/admin/about/index']],
                ['label' => Yii::t('admin', 'Photos'), 'url' => ['/admin/about-image/index']],
                ['label' => Yii::t('admin', 'Vacancies'), 'url' => ['/admin/vacancy/index']],
            ],
        ],
        [
            'label' => Yii::t('admin', 'FAQ'),
            'items' => [
                ['label' => Yii::t('admin', 'Question/Answer'), 'url' => ['/admin/faq/index']],
                ['label' => Yii::t('admin', 'Questions Order'), 'url' => ['/admin/faq/sorting']],
                ['label' => Yii::t('admin', 'Info'), 'url' => ['/admin/faq-info/index']],
            ],
        ],
        [
            'label' => Yii::t('admin', 'Partner'),
            'items' => [
                ['label' => Yii::t('admin', 'Partner Info'), 'url' => ['/admin/partner/index']],
                ['label' => Yii::t('admin', 'Blocks'), 'url' => ['/admin/partner-block/index']],
            ],
        ],
        ['label' => Yii::t('admin', 'Contact'), 'url' => ['/admin/contact/index']],
        [
            'label' => Yii::t('admin', 'Languages'),
            'items' => [
                ['label' => Yii::t('admin', 'Languages'), 'url' => ['/admin/language/index']],
                ['label' => Yii::t('admin', 'Source Messages'), 'url' => ['/admin/source-message/index']],
                ['label' => Yii::t('admin', 'Translation Messages'), 'url' => ['/admin/message/index']],
            ],
        ],
        ['label' => Yii::t('admin', 'Pages'), 'url' => ['/admin/static-pages/index']],
        ['label' => Yii::t('admin', 'SEO'), 'url' => ['/admin/seo/index']],
        ['label' => Yii::t('admin', 'Settings'), 'url' => ['/admin/settings/index']],
        ['label' => Yii::t('admin', 'Users'), 'url' => ['/user/admin/index']],
    ],
    'language_manager' => [
        [
            'label' => Yii::t('admin', 'Main page'),
            'items' => [
                ['label' => Yii::t('admin', 'Blocks'), 'url' => ['/admin/main-page/index']],
                ['label' => Yii::t('admin', 'Banners'), 'url' => ['/admin/banner/index']],
                ['label' => Yii::t('admin', 'Videos'), 'url' => ['/admin/video/index']],
            ],
        ],
        ['label' => Yii::t('admin', 'News'), 'url' => ['/admin/news/index']],
        ['label' => Yii::t('admin', 'Feedbacks'), 'url' => ['/admin/feedback/index']],
        [
            'label' => Yii::t('admin', 'Price'),
            'items' => [
                ['label' => Yii::t('admin', 'Translation Tariffs'), 'url' => ['/admin/price-lang/index']],
                ['label' => Yii::t('admin', 'Translation Options'), 'url' => ['/admin/option-lang/index']],
            ],
        ],
        [
            'label' => Yii::t('admin', 'About'),
            'items' => [
                ['label' => Yii::t('admin', 'About'), 'url' => ['/admin/about/index']],
                ['label' => Yii::t('admin', 'Vacancies'), 'url' => ['/admin/vacancy/index']],
            ],
        ],
        [
            'label' => Yii::t('admin', 'FAQ'),
            'items' => [
                ['label' => Yii::t('admin', 'Question/Answer'), 'url' => ['/admin/faq/index']],
                ['label' => Yii::t('admin', 'Questions Order'), 'url' => ['/admin/faq/sorting']],
                ['label' => Yii::t('admin', 'Info'), 'url' => ['/admin/faq-info/index']],
            ],
        ],
        [
            'label' => Yii::t('admin', 'Partner'),
            'items' => [
                ['label' => Yii::t('admin', 'Partner Info'), 'url' => ['/admin/partner/index']],
                ['label' => Yii::t('admin', 'Blocks'), 'url' => ['/admin/partner-block/index']],
            ],
        ],
        ['label' => Yii::t('admin', 'Contact'), 'url' => ['/admin/contact/index']],
        [
            'label' => Yii::t('admin', 'Language'),
            'items' => [
                ['label' => Yii::t('admin', 'Translation Messages'), 'url' => ['/admin/message/index']],
            ],
        ],
        ['label' => Yii::t('admin', 'Pages'), 'url' => ['/admin/static-pages/index']],
        ['label' => Yii::t('admin', 'SEO'), 'url' => ['/admin/seo/index']],
    ],
    'guest' => [],
];
$menu['admin'][] = $menu['language_manager'][] = $menu['guest'][] = (Yii::$app->user->isGuest)
    ? ['label' => Yii::t('admin', 'Login'), 'url' => ['/user/login']]
    : '<li>'
    . Html::beginForm(['/user/logout'], 'post')
    . Html::submitButton(
        Yii::t('admin', 'Logout') . '(' . Yii::$app->user->identity->username . ')',
        ['class' => 'btn btn-link logout']
    )
    . Html::endForm()
    . '</li>';
$menu_user = (Yii::$app->user->can('admin')) ? 'admin' : ((Yii::$app->user->can('language_manager')) ? 'language_manager' : 'guest');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?=\yii\helpers\Url::to(['/images/favicon.ico']); ?>" type="image/x-icon">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Boss',
        'brandUrl' => \yii\helpers\Url::to(['/admin/default/index']),
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
        'innerContainerOptions' => ['class'=>'container-fluid'],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menu[$menu_user],
//        'items' => [
//            [
//                'label' => Yii::t('admin', 'Main page'),
//                'items' => [
//                    ['label' => Yii::t('admin', 'Blocks'), 'url' => ['/admin/main-page/index']],
//                    ['label' => Yii::t('admin', 'Banners'), 'url' => ['/admin/banner/index']],
//                ],
//            ],
//            ['label' => Yii::t('admin', 'Users'), 'url' => ['/user/admin/index']],
//            Yii::$app->user->isGuest ? (
//            ['label' => 'Login', 'url' => ['/user/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/user/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//        ],
    ]);
    NavBar::end();
    ?>

    <div class="<?= (!empty($this->params['container'])) ? $this->params['container'] : 'container-fluid'; ?>">
        <?= Breadcrumbs::widget([
            'homeLink' => ['label' => Yii::t('admin', 'Main page'), 'url' => \yii\helpers\Url::to(['/admin/default/index'])],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; Boss <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
