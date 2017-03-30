<?php
/* @var $this yii\web\View */
/* @var $faqs app\controllers\FaqController */
/* @var $faq_info app\controllers\FaqController */
/* @var $current_faq app\controllers\FaqController */

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

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
                    <?php if(!empty($current_faq)): ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 current-news-header">
                                <h3 class="news-title nt-border-btm">
                                    <?= $current_faq['question']; ?>
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?= $current_faq['answer']; ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($faqs)): ?>
                        <div class="row news-other">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding-left">
                                <?php foreach($faqs as $faq_item): ?>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h3 class="news-title">
                                                <a href="<?= Url::to(['faq/' . $faq_item['id']]); ?>" title="<?= $faq_item['question']; ?>">
                                                    <?= $faq_item['question']; ?>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
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