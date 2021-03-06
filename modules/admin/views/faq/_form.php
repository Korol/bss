<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Faq */
/* @var $form yii\widgets\ActiveForm */
$language = \app\models\Language::findOne(['url' => Yii::$app->language]);
?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if(Yii::$app->user->can('admin')){
        // admin can select any language
        echo $form->field($model, 'language_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Language::findAll(['enabled' => 1]), 'id', 'title_en'));
    }
    else{
        // other can add element only in his language version!
        echo $form->field($model, 'language_id')->hiddenInput(['value' => $language->id])->label(false);
    }
    ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'answer')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);
    ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]); ?>

    <?php $model->enabled = ($model->isNewRecord) ? 1 : $model->enabled; ?>
    <?= $form->field($model, 'enabled')->radioList([0 => Yii::t('admin', 'Disabled'), 1 => Yii::t('admin', 'Enabled')], ['class' => 'main-page-radio']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
