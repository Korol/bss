<?php
/* @var $this yii\web\View */
/* @var $video_feedback app\controllers\FeedbackController */
/* @var $text_feedback app\controllers\FeedbackController */

use yii\helpers\Url;

$this->params['wrap_class'] = 'wrap-feedback';
?>

<div class="boss-feedback-block">
    <div class="feedback-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="bmb2-header"><?= $page_header; ?></h1>
                </div>
            </div>
            <?php if(!empty($video_feedback)): ?>
                <?php $video_chunked = array_chunk($video_feedback, 4); ?>
                <div class="vfeed-carousel-wrapper">
                    <div id="video_feedback_carousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php foreach($video_chunked as $v_chunk_key => $v_chunk): ?>
                                <div class="item <?= ($v_chunk_key == 0) ? 'active' : ''; ?>">
                                    <div class="row">
                                        <?php foreach($v_chunk as $v_key => $v_item): ?>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="embed-responsive embed-responsive-4by3">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $v_item['code']; ?>?rel=0&amp;controls=0&amp;modestbranding=1&amp;showinfo=0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Controls -->
                        <?php //if(count($video_feedback) > 4): ?>
                        <a class="left carousel-control" href="#video_feedback_carousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#video_feedback_carousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <?php //endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($text_feedback)): ?>
                <?php
                $text_chunked = array_chunk($text_feedback, 4);
                $feed_img_path = '@web/uploads/feedbacks/';
                ?>
                <div class="vfeed-carousel-wrapper">
                    <div id="text_feedback_carousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php foreach($text_chunked as $t_chunk_key => $t_chunk): ?>
                                <div class="item <?= ($t_chunk_key == 0) ? 'active' : ''; ?>">
                                    <div class="row">
                                        <?php foreach($t_chunk as $t_key => $t_item): ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="thumbnail bmb6-thumb">
                                                <img class="img-circle pull-left" src="<?= \yii\helpers\Url::to([$feed_img_path . $t_item['img']]); ?>" alt="Image <?=$t_item['username']; ?>">
                                                <div class="clearfix"></div>
                                                <div class="caption">
                                                    <h3><?= $t_item['username']; ?></h3>
                                                    <div class="bmb6-thumb-text">
                                                        <p><?= $t_item['content']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Controls -->
                        <?php //if(count($video_feedback) > 4): ?>
                        <a class="left carousel-control" href="#text_feedback_carousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#text_feedback_carousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <?php //endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row feed-buttons">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                            <a href="<?= $this->params['page_links']['play']; ?>" class="bmb4-btn-link" target="_blank">
                                <div class="bmb1-yellow-gplay">
                                    <span><?= $this->params['gplay_text']; ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <div class="feed-about-gplay"><?= Yii::t('site', 'Feedback text to the right of the button'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>