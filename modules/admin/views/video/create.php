<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Video */

$this->title = Yii::t('admin', 'Create Video');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
