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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table price-table">
                    <tr>
                        <td><?= $price_header; ?></td>
                        <?php
                        if(!empty($prices)){
                            foreach($prices as $price){
                                if($price['cost'] == 'Free'){
                                    $price['cost'] = '<span class="price-cost">' . Yii::t('site', 'Free') . '</span>';
                                }
                                else{
                                    if(!empty($price_format['format'])){
                                        $price['cost'] = str_replace('{sum}', '<span class="price-cost">' . $price['cost'] . '</span>', $price_format['format']);
                                    }
                                    else{
                                        $price['cost'] = '$<span class="price-cost">' . $price['cost'] . '</span>/month';
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
                            <div class="price-circle <?= (!empty($prices_options[$option['id']][$o_price['id']])) ? $circle_classes[$prices_options[$option['id']][$o_price['id']]] : $circle_classes['No']; ?>"></div>
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
                </table>
            </div>
        </div>
    </div>
</div>