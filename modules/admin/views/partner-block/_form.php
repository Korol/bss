<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PartnerBlock */
/* @var $form yii\widgets\ActiveForm */
$hint = 'Optimal: 70x70 px';
?>

<div class="partner-block-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php
    if(Yii::$app->user->can('admin')){
        // admin can select any language
        echo $form->field($model, 'language_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Language::findAll(['enabled' => 1]), 'id', 'title_en'));
    }
    else{
        // other can add element only in his language version!
        echo $form->field($model, 'language_id')->hiddenInput(['value' => $language_id])->label(false);
    }
    ?>

    <?php
    if(!$model->isNewRecord && !empty($model->img)){
        echo Html::img(\yii\helpers\Url::to(['@web/uploads/partner/' . $model->img]), ['width' => '70']) . '<br/>';
    }
    ?>
    <?= $form->field($model, 'img', ['template' => "{label}\n{hint}\n{input}"])->hint($hint)->fileInput() ?>

    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);
    ?>

    <?php
    $model->enabled = ($model->isNewRecord) ? 1 : $model->enabled;
    ?>
    <?= $form->field($model, 'enabled')->radioList([0 => Yii::t('admin', 'Disabled'), 1 => Yii::t('admin', 'Enabled')], ['class' => 'main-page-radio']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
