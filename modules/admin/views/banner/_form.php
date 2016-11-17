<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Banner */
/* @var $form yii\widgets\ActiveForm */
$code_hint = htmlentities('YouTube video embed code, by this template: <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/') . '<b style="color: #000;">4cTGrUQIYeo</b>' . htmlentities('" allowfullscreen></iframe>');
?>

<div class="banner-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    if(Yii::$app->user->can('admin')){
        // admin can select any language
        echo $form->field($model, 'language_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Language::findAll(['enabled' => 1]), 'id', 'title_en'));
    }
    else{
        // other can add element only in his language version!
        echo $form->field($model, 'language_id')->hiddenInput(['value' => $language_id]);
    }
    ?>

    <?php $model->type = ($model->isNewRecord) ? 'image' : $model->type; ?>
    <?= $form->field($model, 'type')->dropDownList($model::getTypes(), ['prompt' => '']) ?>

    <?php $model->position = ($model->isNewRecord) ? 'main_top' : $model->position; ?>
    <?= $form->field($model, 'position')->dropDownList($model::getPositions(), ['prompt' => '']) ?>

    <?= $form->field($model, 'code', ['template' => "{label}\n{hint}\n{input}"])->hint($code_hint)->textInput(['maxlength' => true, 'placeholder' => '4cTGrUQIYeo']) ?>

    <?php
    if(!$model->isNewRecord && !empty($model->img)){
        echo Html::img(\yii\helpers\Url::to(['@web/uploads/banners/' . $model->img]), ['width' => '300']) . '<br/>';
    }
    ?>
    <?= $form->field($model, 'img')->fileInput() ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php
    $model->buttons = ($model->isNewRecord) ? 0 : $model->buttons;
    ?>
    <?= $form->field($model, 'buttons')->radioList([0 => Yii::t('admin', 'No'), 1 => Yii::t('admin', 'Yes')], ['class' => 'main-page-radio']) ?>

    <?php
    $model->enabled = ($model->isNewRecord) ? 1 : $model->enabled;
    ?>
    <?= $form->field($model, 'enabled')->radioList([0 => Yii::t('admin', 'Disabled'), 1 => Yii::t('admin', 'Enabled')], ['class' => 'main-page-radio']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
