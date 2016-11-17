<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Video */

$this->title = Yii::t('admin', 'Create Video');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
$language = \app\models\Language::findOne(['url' => Yii::$app->language]);
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'language_id' => $language->id,
    ]) ?>

</div>
