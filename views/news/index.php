<?php
/* @var $this yii\web\View */
/* @var $current_news app\controllers\NewsController */
/* @var $news app\controllers\NewsController */
/* @var $videos app\controllers\NewsController */

//use yii\helpers\Html;
use yii\helpers\Url;

$this->params['wrap_class'] = 'wrap-news';
?>
<?= $this->renderFile('@app/views/site/_subscribe_form.php'); ?>
<div class="boss-news-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h1 class="bmb2-header"><?= $news_header; ?></h1>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="row bmb5-subscribe-block">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bmb5-subscribe-img">
                        <img src="<?= \yii\helpers\Url::to(['images/cnub_mail.png']); ?>" alt="Subscribe Image"/>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        <a href="#" class="bmb5-subscribe-link" data-toggle="modal" data-target="#subscribeModal">
                            <span class="bmb5-subscribe-text"><?= $this->params['subscribe_text']; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($current_news)): ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 current-news-header">
                    <h3 class="news-title nt-border-btm">
                        <?= $current_news['header']; ?>
                        <span class="news-pubdate"><?= Yii::$app->formatter->asDate($current_news['pubdate'], 'short'); ?></span>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?= $current_news['content']; ?></div>
            </div>
        <?php endif; ?>
        <?php if(!empty($news)): ?>
            <div class="row news-other">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding-left">
                <?php foreach($news as $news_item): ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="news-title">
                                <a href="<?= Url::to(['news/' . $news_item['id']]); ?>" title="<?= $news_item['header']; ?>">
                                    <?= $news_item['header']; ?>
                                </a>
                                <span class="news-pubdate"><?= Yii::$app->formatter->asDate($news_item['pubdate'], 'short'); ?></span>
                            </h3>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row news-buttons">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1 class="bmb2-header"><?= $news_header; ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
                        <a href="<?= $this->params['page_links']['itunes']; ?>" class="bmb4-btn-link">
                            <div class="bmb4-black-appstore">
                                <span><?= $this->params['appstore_text']; ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                        <a href="<?= $this->params['page_links']['play']; ?>" class="bmb4-btn-link">
                            <div class="bmb4-black-gplay news-gplay-btn">
                                <span><?= $this->params['gplay_text']; ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>