<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Vacancy */

$this->title = Yii::t('admin', 'Update {modelClass}: ', [
    'modelClass' => 'Vacancy',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Vacancies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Update');
$this->params['container'] = 'container';
?>
<div class="vacancy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
