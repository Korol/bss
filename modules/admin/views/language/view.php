<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Language */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
?>
<div class="language-view">

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
        <?= Html::a(Yii::t('admin', 'Create Language'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'url',
            'title_en',
            'title',
            'flag',
            [
                'label' => Yii::t('admin', 'Flag'),
                'value' => (!empty($model->flag)) ? '<span class="flag flag-' . $model->flag . '" alt="' . $model->title_en . '"></span>' : '',
                'format' => 'html',
            ],
            [
                'label' => Yii::t('admin', 'Enabled'),
                'value' => ($model->enabled > 0) ? Yii::t('admin', 'Enabled') : Yii::t('admin', 'Disabled'),
            ],
        ],
    ]) ?>

</div>
