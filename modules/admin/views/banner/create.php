<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Banner */

$this->title = Yii::t('admin', 'Create Banner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
?>
<div class="banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
