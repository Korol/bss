<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Banner */

$this->title = Yii::t('admin', 'Banner') . ' - ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
$language = \app\models\Language::findOne(['id' => $model->language_id]);
$types = $model::getTypes();
$positions = $model::getPositions();
?>
<div class="banner-view">

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
    <?= Html::a(Yii::t('admin', 'Create Banner'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => Yii::t('admin', 'Language'),
                'value' => $language->title_en,
            ],
            [
                'label' => Yii::t('admin', 'Type'),
                'value' => $types[$model->type],
            ],
            [
                'label' => Yii::t('admin', 'Position'),
                'value' => $positions[$model->position],
            ],
            'code:ntext',
            'url:url',
            [
                'label' => Yii::t('admin', 'Image'),
                'value' => (!empty($model->img)) ? Html::img(\yii\helpers\Url::to(['@web/uploads/banners/' . $model->img]), ['width' => '300']) : '',
                'format' => 'html',
            ],
            'header',
            'content:html',
            [
                'label' => Yii::t('admin', 'Buttons'),
                'value' => ($model->buttons > 0) ? Yii::t('admin', 'Yes') : Yii::t('admin', 'No'),
            ],
            [
                'label' => Yii::t('admin', 'Enabled'),
                'value' => ($model->enabled > 0) ? Yii::t('admin', 'Enabled') : Yii::t('admin', 'Disabled'),
            ],
        ],
    ]) ?>

</div>
