<?php
/* @var $this yii\web\View */
/* @var $about app\controllers\AboutController */
/* @var $about_images app\controllers\AboutController */
/* @var $vacancies app\controllers\AboutController */

use yii\helpers\ArrayHelper;

$this->params['wrap_class'] = 'wrap-about';

$js = <<<JS

    // All images need to be loaded for this plugin to work so
    // we end up waiting for the whole window to load in this example
    $(window).load(function () {
        $(document).ready(function(){
            collage();
            $('.Collage').collageCaption();
        });
    });


    // Here we apply the actual CollagePlus plugin
    function collage() {
        $('.Collage').removeWhitespace().collagePlus(
            {
                'fadeSpeed'     : 1000,
                'targetHeight'  : 200
            }
        );
    };

    // This is just for the case that the browser window is resized
    var resizeTimer = null;
    $(window).bind('resize', function() {
        // hide all the images until we resize them
        $('.Collage .Image_Wrapper').css("opacity", 0);
        // set a timer to re-apply the plugin
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(collage, 200);
    });

JS;
?>

<div class="about-block">
    <div class="about-block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <h1 class="bmb2-header"><?= ArrayHelper::getValue($about, 'header'); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 about-content">
                    <?= ArrayHelper::getValue($about, 'content'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-images-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                <h1 class="bmb2-header"><?= ArrayHelper::getValue($about, 'photo_header'); ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                <div class="about-images grid Collage">
                <?php
                if(!empty($about_images)){
//                    $this->registerCssFile(\yii\helpers\Url::to(['@web/css/jquery-gp-gallery.css']));
//                    $this->registerJsFile(\yii\helpers\Url::to(['@web/js/jquery-gp-gallery.js']), ['depends' => 'yii\web\JqueryAsset']);
                    $this->registerCssFile(\yii\helpers\Url::to(['@web/fancybox/source/jquery.fancybox.css?v=2.1.5']));
                    $this->registerCssFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5']));
                    $this->registerCssFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7']));
//                    $this->registerJsFile(\yii\helpers\Url::to(['@web/js/jquery.kirpi4i.js']), ['depends' => 'yii\web\JqueryAsset']);
//                    $this->registerJsFile(\yii\helpers\Url::to(['@web/js/masonry.pkgd.min.js']), ['depends' => 'yii\web\JqueryAsset']);
                    $this->registerJsFile(\yii\helpers\Url::to(['@web/js/collageplus/jquery.collagePlus.min.js']), ['depends' => 'yii\web\JqueryAsset']);
                    $this->registerJsFile(\yii\helpers\Url::to(['@web/js/collageplus/jquery.collageCaption.min.js']), ['depends' => 'yii\web\JqueryAsset']);
                    $this->registerJsFile(\yii\helpers\Url::to(['@web/js/collageplus/jquery.removeWhitespace.min.js']), ['depends' => 'yii\web\JqueryAsset']);
                    $this->registerJs($js, \yii\web\View::POS_END, 'collage-plus');
                    $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/lib/jquery.mousewheel-3.0.6.pack.js']), ['depends' => 'yii\web\JqueryAsset']);
                    $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/source/jquery.fancybox.pack.js?v=2.1.5']), ['depends' => 'yii\web\JqueryAsset']);
                    $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5']), ['depends' => 'yii\web\JqueryAsset']);
                    $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6']), ['depends' => 'yii\web\JqueryAsset']);
                    $this->registerJsFile(\yii\helpers\Url::to(['@web/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7']), ['depends' => 'yii\web\JqueryAsset']);
                    foreach($about_images as $a_image){
                ?>
                    <?php /* kirpi4i version
                    <a class="fancybox" rel="group" href="<?=\yii\helpers\Url::to(['@web/uploads/about/' . $a_image['img']]); ?>">
                        <img src="<?=\yii\helpers\Url::to(['@web/uploads/about/' . $a_image['img']]); ?>" alt="About Image <?=$a_image['id']; ?>"/>
                    </a> */?>
                    <?php /* masonry version
                    <div class="grid-item">
                        <a class="fancybox" rel="group" href="<?=\yii\helpers\Url::to(['@web/uploads/about/' . $a_image['img']]); ?>">
                            <img src="<?=\yii\helpers\Url::to(['@web/uploads/about/' . $a_image['img']]); ?>" alt="About Image <?=$a_image['id']; ?>"/>
                        </a>
                    </div> */?>
                    <?php /* collagePlus version */ ?>
                    <a class="fancybox" rel="group" href="<?=\yii\helpers\Url::to(['@web/uploads/about/' . $a_image['img']]); ?>">
                        <img src="<?=\yii\helpers\Url::to(['@web/uploads/about/' . $a_image['img']]); ?>" alt="About Image <?=$a_image['id']; ?>"/>
                    </a>
                <?php
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-vacancy">
    <div class="about-vacancy-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <h1 class="bmb2-header"><?= ArrayHelper::getValue($about, 'vacancy_header'); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 about-content">
                    <?= ArrayHelper::getValue($about, 'vacancy_content'); ?>
                </div>
            </div>
            <div class="row about-vacancies">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <?php if(!empty($vacancies)): ?>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <?php foreach($vacancies as $vk => $vacancy): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading<?=$vacancy['id']; ?>">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$vacancy['id']; ?>" aria-expanded="true" aria-controls="collapseOne">
                                                <?= $vacancy['header']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?=$vacancy['id']; ?>" class="panel-collapse collapse <?= ($vk == 0) ? 'in' : ''; ?>" role="tabpanel" aria-labelledby="heading<?=$vacancy['id']; ?>">
                                        <div class="panel-body">
                                            <?= $vacancy['content']; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="about-mail"></div>
                            <div class="about-mail-address">
                                <a href="mailto:<?= ArrayHelper::getValue($about, 'email'); ?>">
                                    <span><?= ArrayHelper::getValue($about, 'email'); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>