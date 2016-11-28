<?php
/* @var $this yii\web\View */
/* @var $price app\modules\admin\controllers\PriceOptionController */
/* @var $option app\modules\admin\controllers\PriceOptionController */
/* @var $price_option app\modules\admin\controllers\PriceOptionController */
/* @var $list app\modules\admin\controllers\PriceOptionController */

$this->title = Yii::t('admin', 'Set Options by Tariffs');
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
?>
<div class="row">
    <div class="col-lg-12">
        <h2><?= $this->title; ?></h2>
    </div>
</div>
<form method="post" action="<?=\yii\helpers\Url::to(['/admin/price-option/save']); ?>">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped price-option-table">
            <thead>
                <th><?= Yii::t('admin', 'Option'); ?></th>
                <?php foreach($price as $p_row): ?>
                <th><?= $p_row['title']; ?></th>
                <?php endforeach; ?>
            </thead>
            <tbody>
            <?php foreach($option as $o_row): ?>
            <tr>
                <td><?= $o_row['title']; ?></td>
                <?php foreach($price as $op_row): ?>
                <?php //$checked = (!empty($price_option[$o_row['id']][$op_row['id']])) ? $price_option[$o_row['id']][$op_row['id']] : ''; ?>
                <?php $checked = (!empty($price_option[$o_row['id']][$op_row['id']]['value'])) ? $price_option[$o_row['id']][$op_row['id']]['value'] : ''; ?>
                <?php $star = (!empty($price_option[$o_row['id']][$op_row['id']]['star'])) ? 'checked' : ''; ?>
                <td>
                    <?php foreach($list as $l_key => $l_value): ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="options[<?=$o_row['id']; ?>][<?=$op_row['id']; ?>]" id="opr_<?=$o_row['id']; ?>_<?=$op_row['id']; ?>" value="<?=$l_value; ?>" <?=($l_key == $checked) ? 'checked' : ''; ?>>
                            <?= $l_value; ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                    <div class="checkbox top-dotted">
                        <label>
                            <input type="checkbox" name="stars[<?=$o_row['id']; ?>][<?=$op_row['id']; ?>]" id="str_<?=$o_row['id']; ?>_<?=$op_row['id']; ?>" value="1" <?= $star; ?>>
                            <?= Yii::t('admin', 'Star'); ?>
                        </label>
                    </div>
                </td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" type="submit"><?= Yii::t('admin', 'Save Options by Tariffs'); ?></button>
        </div>
    </div>
</form>