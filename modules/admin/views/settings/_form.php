<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Settings */
/* @var $form yii\widgets\ActiveForm */
$settings = new \app\modules\admin\models\Settings();
$positions = $settings->getPositions();
?>
<a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseEn" aria-expanded="false" aria-controls="collapseEn">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> EN
</a>
<a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseRu" aria-expanded="false" aria-controls="collapseRu">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> RU
</a>
<div class="collapse" id="collapseEn">
    <br/>
    <div class="well">
        <p>Settings for which specified their exact positions – are displayed in the appropriate places on each page of the site.</p>
        <p>Settings for which the position is defined as "No position" – are used only for their direct call in the code of the site (like some Email-addresses, for example).<br/>Therefore, be very careful when editing these settings and do not change them Key's unless absolutely necessary!</p>
    </div>
</div>
<div class="collapse" id="collapseRu">
    <br/>
    <div class="well">
        <p>Настройки, для которых указана их точная позиция – будут отображены в соответствующих местах на каждой странице сайта.</p>
        <p>Настройки, для которых их Позиция определена как «Нет позиции» – будут использованы только при прямом обращении к ним в исходном коде сайта (как например, некоторые Email-адреса).<br/>Поэтому, будьте очень внимательны при редактировании таких настроек, и не изменяйте параметр «Ключ» («Key») для таких настроек без крайней необходимости!</p>
    </div>
</div>
<br/><br/>
<div class="settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true, 'placeholder' => 'A word or phrase in the Latin alphabet with an underscore between words, like: facebook, google_analytics, etc...']) ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6, 'placeholder' => 'This can be email, or some code (like for Google Analytics or Yandex Metrika), or something else...']) ?>

    <?php $model->position = ($model->isNewRecord) ? 'none' : $model->position; ?>
    <?= $form->field($model, 'position')->dropDownList($positions); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
