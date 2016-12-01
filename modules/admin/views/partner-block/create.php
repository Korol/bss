<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PartnerBlock */

$this->title = Yii::t('admin', 'Create Partner Block');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Partner Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
?>
<div class="partner-block-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
