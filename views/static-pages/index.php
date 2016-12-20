<?php
/* @var $this yii\web\View */
/* @var $page app\controllers\StaticPagesController */

use yii\helpers\ArrayHelper;

$this->params['wrap_class'] = 'wrap-partner';
//var_dump($page);
?>
<div class="partner-block">
    <div class="partner-block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="bmb2-header"><?= ArrayHelper::getValue($page, 'title', ''); ?></h1>
                    <?= ArrayHelper::getValue($page, 'content', ''); ?>
                    <?php
                    if(empty($page)){
                    ?>
                    <h3 class="text-center"><?= Yii::t('site', "This page has no content. We know about it - and we're working on it, thank you."); ?></h3>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>