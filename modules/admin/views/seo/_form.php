<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Seo */
/* @var $form yii\widgets\ActiveForm */
$language = \app\models\Language::findOne(['url' => Yii::$app->language]);
$seo = new \app\modules\admin\models\Seo();
$pages = $seo->getPages();
?>

<div class="seo-form">

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

    <?= $form->field($model, 'page')->dropDownList($pages) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
