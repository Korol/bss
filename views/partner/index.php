<?php
/* @var $this yii\web\View */
/* @var $partner app\controllers\PartnerController */
/* @var $partner_blocks app\controllers\PartnerController */

use yii\helpers\ArrayHelper;

$this->params['wrap_class'] = 'wrap-partner';
?>

<div class="partner-block">
    <div class="partner-block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <h1 class="bmb2-header"><?= ArrayHelper::getValue($partner, 'header'); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 about-content">
                    <?= ArrayHelper::getValue($partner, 'content'); ?>
                </div>
            </div>
        </div>
    </div>
</div>