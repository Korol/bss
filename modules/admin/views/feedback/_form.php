<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
$code_hint = htmlentities('YouTube video embed code, by this template: <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/') . '<b style="color: #000;">4cTGrUQIYeo</b>' . htmlentities('" allowfullscreen></iframe>');
$language = \app\models\Language::findOne(['url' => Yii::$app->language]);
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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

    <?= $form->field($model, 'type')->dropDownList([ 'text' => 'Text', 'video' => 'Video', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'code', ['template' => "{label}\n{hint}\n{input}"])->hint($code_hint)->textInput(['maxlength' => true, 'placeholder' => '4cTGrUQIYeo']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php
    if(!$model->isNewRecord && !empty($model->img)){
        echo Html::img(\yii\helpers\Url::to(['@web/uploads/feedbacks/' . $model->img]), ['width' => '100']) . '<br/>';
    }
    ?>
    <?= $form->field($model, 'img')->fileInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php $model->mainpage = ($model->isNewRecord) ? 1 : $model->mainpage; ?>
    <?= $form->field($model, 'mainpage')->radioList([0 => Yii::t('admin', 'No'), 1 => Yii::t('admin', 'Yes')], ['class' => 'main-page-radio']) ?>

    <?php $model->enabled = ($model->isNewRecord) ? 1 : $model->enabled; ?>
    <?= $form->field($model, 'enabled')->radioList([0 => Yii::t('admin', 'Disabled'), 1 => Yii::t('admin', 'Enabled')], ['class' => 'main-page-radio']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
