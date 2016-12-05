<?php
/* @var $this yii\web\View */
/* @var $contact app\controllers\ContactController */

use yii\helpers\ArrayHelper;

$this->params['wrap_class'] = 'wrap-partner';
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
                                        <div class="cdsb-num"><?= ArrayHelper::getValue($contact, 'rating'); ?></div>
                                        <div class="cdsb-text"><?= ArrayHelper::getValue($contact, 'rating_text'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 contact-map-data">
                                    <div class="cd-big-block">
                                        <div class="cdsb-num"><?= ArrayHelper::getValue($contact, 'qty'); ?></div>
                                        <div class="cdsb-text"><?= ArrayHelper::getValue($contact, 'qty_text'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 contact-map-data">
                                    <div class="cd-small-block pull-right">
                                        <div class="cdsb-num"><?= ArrayHelper::getValue($contact, 'feedbacks'); ?></div>
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