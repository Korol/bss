<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AboutImage */
/* @var $form yii\widgets\ActiveForm */

$hint = 'You may select multiple files at once to upload (max = 4)';

?>

<div class="about-image-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php
    if(!$model->isNewRecord){
        if(!empty($model->img)){
            echo Html::img(\yii\helpers\Url::to(['@web/uploads/about/' . $model->img]), ['width' => '250']) . '<br/>';
        }
        echo $form->field($model, 'img')->fileInput();
    }
    elseif($model->isNewRecord){
        echo $form->field($model, 'img[]', ['template' => "{label}\n{hint}\n{input}"])->hint($hint)->fileInput(['multiple' => true, 'accept' => 'image/*']);
    }
    ?>

    <?php if(!$model->isNewRecord): ?>
    <?= $form->field($model, 'enabled')->radioList([0 => Yii::t('admin', 'Disabled'), 1 => Yii::t('admin', 'Enabled')], ['class' => 'main-page-radio']) ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
