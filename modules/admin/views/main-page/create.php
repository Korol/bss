<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MainPage */

$this->title = Yii::t('admin', 'Create Main Page element');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Main Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
$language = \app\models\Language::findOne(['url' => Yii::$app->language]);
?>
<div class="main-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'blocks_filter' => $blocks_filter,
        'language_id' => $language->id,
    ]) ?>

</div>
