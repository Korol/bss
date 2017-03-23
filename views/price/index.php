<?php
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
// 'prices', 'options', 'prices_lang', 'options_lang', 'prices_options', 'price_format'
/* @var $prices app\controllers\PriceController */
/* @var $options app\controllers\PriceController */
/* @var $prices_lang app\controllers\PriceController */
/* @var $options_lang app\controllers\PriceController */
/* @var $prices_options app\controllers\PriceController */
/* @var $price_format app\controllers\PriceController */
/* @var $price_header app\controllers\PriceController */
/* @var $option_note app\controllers\PriceController */
/* @var $price_note app\controllers\PriceController */
//var_dump($options, $prices_options);
$this->params['wrap_class'] = 'wrap-price';
$js = <<<JS

    function setEqualHeight(columns)
    {
        var tallestcolumn = 0;
        columns.each(
            function()
            {
                currentHeight = $(this).height();
                if(currentHeight > tallestcolumn)
                {
                tallestcolumn = currentHeight;
                }
            }
        );
        columns.height(tallestcolumn);
    }
    $(document).ready(function() {
        setEqualHeight($(".pi-content"));
    });

JS;

$this->registerJs($js, \yii\web\View::POS_END, 'new-price');
?>

<div class="boss-price-block">
    <div class="price-wrapper">
        <div class="container">
            <div class="row price-blocks-container clearfix">
                <?php
                if(!empty($prices)):
                    foreach($prices as $price):
                ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 price-item">
                        <div class="pi-header"><?= ArrayHelper::getValue($prices_lang, $price['id'].'.title', $price['title']); ?></div>
                        <div class="pi-content">
                            <div class="pic-content">
                                <?php
                                if(!empty($options)):
                                    foreach($options as $option):
                                        if(
                                            !empty($prices_options[$option['id']][$price['id']])
                                            && ($prices_options[$option['id']][$price['id']]['value'] == 'Yes')
                                        ):
                                ?>
                                <div class="picc-item clearfix vcentered-price-block">
                                    <div class="picci-img">
                                        <img src="<?= \yii\helpers\Url::to(['images/new_price_check.png']); ?>" alt="Pic icon"/>
                                    </div>
                                    <div class="picci-text vcentered-price-content">
                                        <span>
                                            <?= ArrayHelper::getValue($options_lang, $option['id'].'.title', $option['title']); ?>
                                        </span>
                                    </div>
                                </div>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="pi-footer-block">
                            <div class="pi-footer">
                                <div class="pif-circle"></div>
                                <div class="pif-month">
                                    <?= str_replace('{sum}', $price['cost'], $price_format['format']); ?>
                                </div>
                                <div class="pif-annually">
                                    <?= str_replace('{sum}', $price['annually'], $price_format['format']) . ' ' . Yii::t('site', 'annually'); ?>
                                </div>
                                <div class="pif-discount">
                                    <?php
                                    $price_year = str_replace('{sum}', $price['year_cost'], $price_format['format']);
                                    $price_year_ex = explode('/', $price_year);
                                    ?>
                                    (<?= $price_year_ex[0]; ?>) = <span><?= $price['discount']; ?>% <?= Yii::t('site', 'off'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>

            <?php if(!empty($option_note['note'])): ?>
                <div class="row option-note-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?= $option_note['note']; ?></div>
                </div>
            <?php endif; ?>

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

