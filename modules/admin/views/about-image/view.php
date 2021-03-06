<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AboutImage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'About Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
?>
<div class="about-image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('admin', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('admin', 'Create About Image'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => Yii::t('admin', 'Image'),
                'value' => (!empty($model->img)) ? Html::img(\yii\helpers\Url::to(['@web/uploads/about/' . $model->img]), ['width' => '300']) : '',
                'format' => 'html',
            ],
            [
                'label' => Yii::t('admin', 'Enabled'),
                'value' => ($model->enabled > 0) ? Yii::t('admin', 'Enabled') : Yii::t('admin', 'Disabled'),
            ],
        ],
    ]) ?>

</div>
