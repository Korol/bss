<?php
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

$this->params['wrap_class'] = 'wrap-price';
$circle_classes = [
    'Yes' => 'option-circle-yes',
    'No' => 'option-circle-no',
    'Planned' => 'option-circle-planned',
];
?>

<div class="boss-price-block">
    <div class="price-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                    <table class="table price-table">
                        <tr>
                            <td><h1 class="bmb2-header price-header"><?= $price_header; ?></h1></td>
                            <?php
                            if(!empty($prices)){
                                foreach($prices as $price){
                                    if($price['cost'] == 'Free'){
                                        $price['cost'] = '<span class="price-cost-span">' . Yii::t('site', 'Free') . '</span>';
                                    }
                                    else{
                                        if(!empty($price_format['format'])){
                                            $price['cost'] = str_replace('{sum}', '<span class="price-cost-span">' . $price['cost'] . '</span>', $price_format['format']);
                                        }
                                        else{
                                            $price['cost'] = '$<span class="price-cost-span">' . $price['cost'] . '</span>/month';
                                        }
                                    }
                            ?>
                            <td class="option-td-circle">
                                <div class="price-title">
                                    <?= (!empty($prices_lang[$price['id']]['title'])) ? $prices_lang[$price['id']]['title'] : $price['title']; ?>
                                </div>
                                <div class="price-cost"><?= $price['cost']; ?></div>
                            </td>
                            <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                        if(!empty($options)){
                            $oi = 1;
                            foreach($options as $option){
                                $tr_class = (($oi % 2) == 0) ? 'price-tr-light' : 'price-tr-dark';
                        ?>
                        <tr class="<?= $tr_class; ?>">
                            <td class="option-title"><?= (!empty($options_lang[$option['id']]['title'])) ? $options_lang[$option['id']]['title'] : $option['']; ?></td>
                            <?php
                            if(!empty($prices)){
                                foreach($prices as $o_price){
                            ?>
                            <td class="option-td-circle">
                                <?php if(!empty($prices_options[$option['id']][$o_price['id']]['star'])): ?>
                                    <div class="price-star">*</div>
                                <?php endif; ?>
                                <div class="price-circle <?= (!empty($prices_options[$option['id']][$o_price['id']]['value'])) ? $circle_classes[$prices_options[$option['id']][$o_price['id']]['value']] : $circle_classes['No']; ?>"></div>
                            </td>
                            <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                                $oi++;
                            }
                        }
                        ?>
                        <tr>
                            <td class="option-title"><?= (!empty($price_note['note'])) ? '<span class="price-note">' . $price_note['note'] . '</span>' : ''; ?></td>
                            <?php
                            $last_price = count($prices);
                            for($i = 1; $i <= $last_price; $i++){
                                if($i == $last_price){
                                    echo '<td class="option-td-circle with-note"><span class="price-note">(' . Yii::t('site', 'planned') . ')</span></td>';
                                }
                                else{
                                    echo '<td class="option-td-circle"></td>';
                                }
                            }
                            ?>
                        </tr>
                    </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <?php if(!empty($option_note['note'])): ?>
                <div class="row option-note-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?= $option_note['note']; ?></div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 price-buttons">
                    <h1 class="bmb2-header price-header"><?= Yii::t('site', 'Download Boss for free'); ?></h1>
                    <a href="#" class="bmb4-btn-link">
                        <div class="bmb4-black-appstore">
                            <span><?= $this->params['appstore_text']; ?></span>
                        </div>
                    </a>
                    <a href="#" class="bmb4-btn-link">
                        <div class="bmb4-black-gplay">
                            <span><?= $this->params['gplay_text']; ?></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

