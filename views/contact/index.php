<?php
/* @var $this yii\web\View */
/* @var $contact app\controllers\ContactController */

use yii\helpers\ArrayHelper;

$this->params['wrap_class'] = 'wrap-partner';
$qty = $rating = $feeds = 0;
// quantity
if(!empty($contact['qty'])){
    $qty = preg_replace('#[\.\,\s]+#', '', $contact['qty']);
    if(is_numeric($qty)){
        $qty = intval($qty);
    }
}
// rating
if(!empty($contact['rating'])){
    $rating = preg_replace('#[\,]+#', '.', $contact['rating']);
}
// feeds
if(!empty($contact['feedbacks'])){
    $feeds = intval($contact['feedbacks']);
}

if(!empty($qty) && !empty($feeds) && !empty($rating)){
$js = <<<JS
    var delayy = 5000;

    $('#qty').animateNumber({ number: $qty }, delayy);

    $('#feeds').animateNumber({ number: $feeds }, delayy);

    // how many decimal places allows
    var decimal_places = 1;
    var decimal_factor = decimal_places === 0 ? 1 : Math.pow(10, decimal_places);

    $('#rating')
      .animateNumber(
        {
          number: $rating * decimal_factor,

          numberStep: function(now, tween) {
            var floored_number = Math.floor(now) / decimal_factor,
                target = $(tween.elem);

            if (decimal_places > 0) {
              // force decimal places even if they are 0
              floored_number = floored_number.toFixed(decimal_places);

              // replace '.' separator with ','
              floored_number = floored_number.toString().replace('.', ',');
            }

            target.text(floored_number);
          }
        },
        delayy
      );

JS;


    $this->registerJs($js, \yii\web\View::POS_LOAD, 'animate-numbers');
}
?>

<div class="partner-block">
    <div class="partner-block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                            <h1 class="bmb2-header"><?= ArrayHelper::getValue($contact, 'header'); ?></h1>
                            <?= ArrayHelper::getValue($contact, 'content'); ?>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="about-mail contact-about-mail"></div>
                            <div class="about-mail-address">
                                <a href="mailto:<?= ArrayHelper::getValue($contact, 'email'); ?>">
                                    <span><?= ArrayHelper::getValue($contact, 'email'); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contact-map-content">
                    <img src="<?=\yii\helpers\Url::to(['@web/images/contact_map.png']); ?>" alt="Contact Map"/>
                    <div class="row contact-digits">
                        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 contact-map-data">
                                    <div class="cd-small-block">
                                        <div class="cdsb-num" id="rating">0,0</div>
                                        <div class="cdsb-text"><?= ArrayHelper::getValue($contact, 'rating_text'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 contact-map-data">
                                    <div class="cd-big-block">
                                        <div class="cdsb-num" id="qty">0</div>
                                        <div class="cdsb-text"><?= ArrayHelper::getValue($contact, 'qty_text'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 contact-map-data">
                                    <div class="cd-small-block pull-right">
                                        <div class="cdsb-num" id="feeds">0</div>
                                        <div class="cdsb-text"><?= ArrayHelper::getValue($contact, 'feedbacks_text'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>