<?php
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $page app\controllers\StaticPagesController */
/* @var $banners app\controllers\StaticPagesController */
//var_dump($page, $banners);
$this->params['wrap_class'] = 'wrap-faq';
$banners_classes = [
    0 => [
        'left' => 'col-lg-8 col-md-8 col-sm-6 col-xs-12',
        'right' => 'col-lg-4 col-md-4 col-sm-6 col-xs-12',
    ],
    1 => [
        'left' => 'col-lg-8 col-lg-push-4 col-md-8 col-md-push-4 col-sm-6 col-sm-push-6 col-xs-12',
        'right' => 'col-lg-4 col-lg-pull-8 col-md-4 col-md-pull-8 col-sm-6 col-sm-pull-6 col-xs-12',
    ],
];
$banners_path = '@web/uploads/banners/';
?>

<div class="faq-block">
    <div class="faq-block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="bmb2-header"><?= ArrayHelper::getValue($page, 'title', 'Web version'); ?></h1>
                </div>
            </div>
            <?php if(!empty($banners)): ?>
                <?php
                // Fancybox
                $this->registerCssFile(\yii\helpers\Url::to(['@web/fancybox/source/jquery.fancybox.css?v=2.1.5']));
                $this->registerCssFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5']));
                $this->registerCssFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7']));
                $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/lib/jquery.mousewheel-3.0.6.pack.js']), ['depends' => 'yii\web\JqueryAsset']);
                $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/source/jquery.fancybox.pack.js?v=2.1.5']), ['depends' => 'yii\web\JqueryAsset']);
                $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5']), ['depends' => 'yii\web\JqueryAsset']);
                $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6']), ['depends' => 'yii\web\JqueryAsset']);
                $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7']), ['depends' => 'yii\web\JqueryAsset']);

                foreach($banners as $bk => $banner):
                    $b_classes = (($bk % 2) == 0) ? $banners_classes[0] : $banners_classes[1];
                ?>
            <div class="row wv-screens">
                <div class="<?= $b_classes['left']; ?>">
                    <a class="fancybox" rel="group" href="<?=\yii\helpers\Url::to([$banners_path . $banner['img']]); ?>">
                        <img src="<?=\yii\helpers\Url::to([$banners_path . $banner['img']]); ?>" class="img-responsive" alt="Web version screenshot <?=++$bk; ?>">
                    </a>
                </div>
                <div class="<?= $b_classes['right']; ?>">
                    <?= ArrayHelper::getValue($banner, 'content', ''); ?>
                </div>
            </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="row wv-text">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?= ArrayHelper::getValue($page, 'content', ''); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 price-buttons">
                    <h1 class="bmb2-header price-header"><?= Yii::t('site', 'Download Boss for free'); ?></h1>
                    <a href="<?= $this->params['page_links']['itunes']; ?>" class="bmb4-btn-link" target="_blank">
                        <div class="bmb4-black-appstore">
                            <span><?= $this->params['appstore_text']; ?></span>
                        </div>
                    </a>
                    <a href="<?= $this->params['page_links']['play']; ?>" class="bmb4-btn-link" target="_blank">
                        <div class="bmb4-black-gplay">
                            <span><?= $this->params['gplay_text']; ?></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>