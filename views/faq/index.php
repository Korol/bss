<?php
/* @var $this yii\web\View */
/* @var $faqs app\controllers\FaqController */
/* @var $faq_info app\controllers\FaqController */

use yii\helpers\ArrayHelper;

$this->params['wrap_class'] = 'wrap-faq';
?>

<div class="faq-block">
    <div class="faq-block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="bmb2-header"><?= ArrayHelper::getValue($faq_info, 'header'); ?></h1>
                </div>
            </div>
            <div class="row about-vacancies">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if(!empty($faqs)): ?>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php foreach($faqs as $fk => $faq): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading<?=$faq['id']; ?>">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$faq['id']; ?>" aria-expanded="true" aria-controls="collapseOne">
                                                <?= $faq['question']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?=$faq['id']; ?>" class="panel-collapse collapse <?= ($fk == 0) ? 'in' : ''; ?>" role="tabpanel" aria-labelledby="heading<?=$faq['id']; ?>">
                                        <div class="panel-body">
                                            <?= $faq['answer']; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row faq-email-block">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="about-mail"></div>
                    <div class="about-mail-address">
                        <a href="mailto:<?= ArrayHelper::getValue($faq_info, 'email'); ?>">
                            <span><?= ArrayHelper::getValue($faq_info, 'email'); ?></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 faq-email-text"><?= $faq_info['email_text']; ?></div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 price-buttons">
                    <h1 class="bmb2-header price-header"><?= Yii::t('site', 'Download Boss for free'); ?></h1>
                    <a href="<?= $this->params['page_links']['itunes']; ?>" class="bmb4-btn-link">
                        <div class="bmb4-black-appstore">
                            <span><?= $this->params['appstore_text']; ?></span>
                        </div>
                    </a>
                    <a href="<?= $this->params['page_links']['play']; ?>" class="bmb4-btn-link">
                        <div class="bmb4-black-gplay">
                            <span><?= $this->params['gplay_text']; ?></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>