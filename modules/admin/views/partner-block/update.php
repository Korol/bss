<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PartnerBlock */

$this->title = Yii::t('admin', 'Update {modelClass}: ', [
    'modelClass' => 'Partner Block',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Partner Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Update');
$this->params['container'] = 'container';
?>
<div class="partner-block-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
