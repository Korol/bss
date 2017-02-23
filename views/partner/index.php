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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 partner-dbutton-block">
                    <?php $file_link = (!empty($partner['file'])) ? \yii\helpers\Url::to(['@web/uploads/partner/' . $partner['file']]) : '#'; ?>
                    <?php /*a href="<?=$file_link; ?>" target="<?=($file_link == '#') ? '_self' : '_blank'; ?>">
                        <div class="partner-dbutton">
                            <div class="partner-dbutton-text"><?= ArrayHelper::getValue($partner, 'button_text'); ?></div>
                        </div>
                    </a*/?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="row">
                <?php
                $block_columns = 3;
                if(!empty($partner_blocks)){
                    $pki = 1;
                    foreach($partner_blocks as $p_key => $p_block){
                        if(($p_key > 0) && (($p_key % $block_columns) == 0)){
                            //echo '</div><div class="row">';
                            $pki = 1;
                        }
                        $block_class = '';
                        switch ($pki) {
                            case 1:
                                $block_class = ''; break;
                            case 2:
                                $block_class = ' partn-block-center'; break;
                            case 3:
                                $block_class = ' pull-right'; break;
                        }
                ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="partn-block<?=$block_class; ?>">
                                <div class="partn-block-icon">
                                    <img src="<?=\yii\helpers\Url::to(['@web/uploads/partner/' . $p_block['img']]); ?>" alt="Partner Block <?=$p_key; ?>"/>
                                </div>
                                <div class="partn-block-text"><?= $p_block['content']; ?></div>
                            </div>
                        </div>
                <?php
                        $pki++;
                    }
                }
                ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="partner-email-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <?= ArrayHelper::getValue($partner, 'email_text'); ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="partner-mail"></div>
                        <div class="partner-mail-address">
                            <a href="mailto:<?= ArrayHelper::getValue($partner, 'email'); ?>">
                                <span><?= ArrayHelper::getValue($partner, 'email'); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>