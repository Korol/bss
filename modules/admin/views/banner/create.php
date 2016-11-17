<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Banner */

$this->title = Yii::t('admin', 'Create Banner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
$language = \app\models\Language::findOne(['url' => Yii::$app->language]);
?>
<div class="banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'language_id' => $language->id,
    ]) ?>

</div>
