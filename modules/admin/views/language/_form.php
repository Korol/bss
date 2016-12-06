<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Language */
/* @var $form yii\widgets\ActiveForm */
$flag_hint = 'In lowercase, use Code of Country from <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2#Officially_assigned_code_elements" target="_blank">this table</a> only!';
?>

<div class="language-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true, 'placeholder' => 'Like ru, en, de']) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true, 'placeholder' => 'Like Russian, English, Deutsch']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Like Русский, English, Deutsch']) ?>

    <?= $form->field($model, 'flag', ['template' => "{label}\n{hint}\n{input}"])->hint($flag_hint)->textInput(['maxlength' => true, 'placeholder' => 'Like ru, en, de']) ?>

    <?php $model->enabled = ($model->isNewRecord) ? 1 : $model->enabled; ?>
    <?= $form->field($model, 'enabled')->radioList([0 => Yii::t('admin', 'Disabled'), 1 => Yii::t('admin', 'Enabled')], ['class' => 'main-page-radio']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
