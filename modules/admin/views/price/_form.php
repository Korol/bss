<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Price */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true, 'placeholder' => 'Free or amount, like: 4,99 or 4.99']) ?>
    <?= $form->field($model, 'annually')->textInput(['maxlength' => true, 'placeholder' => 'Free or amount, like: 4,99 or 4.99']) ?>
    <?= $form->field($model, 'year_cost')->textInput(['maxlength' => true, 'placeholder' => 'Free or amount, like: 47,99 or 47.99']) ?>
    <?= $form->field($model, 'discount')->textInput(['placeholder' => 'Percentage of discount as an integer, like: 25, or 30, or 50']) ?>

    <?php $model->enabled = ($model->isNewRecord) ? 1 : $model->enabled; ?>
    <?= $form->field($model, 'enabled')->radioList([0 => Yii::t('admin', 'Disabled'), 1 => Yii::t('admin', 'Enabled')], ['class' => 'main-page-radio']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
