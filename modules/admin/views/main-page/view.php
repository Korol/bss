<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MainPage */

$this->title = $model->header . ' - ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Main Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
$language = \app\models\Language::findOne(['id' => $model->language_id]);
?>
<div class="main-page-view">

    <h1><?= $this->title ?></h1>

    <p>
        <?= Html::a(Yii::t('admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('admin', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('admin', 'Create Main Page element'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'label' => Yii::t('admin', 'Block'),
                'value' => Yii::t('admin', 'Block') . ' ' . $model->block_id,
            ],
            'header',
            'content:ntext',
            [
                'label' => Yii::t('admin', 'Image'),
                'value' => (!empty($model->img)) ? Html::img(\yii\helpers\Url::to(['@web/uploads/main_page/' . $model->img]), ['width' => '300']) : '',
                'format' => 'html',
            ],
//            'sort_order',
            [
                'label' => Yii::t('admin', 'Enabled'),
                'value' => ($model->enabled > 0) ? Yii::t('admin', 'Enabled') : Yii::t('admin', 'Disabled'),
            ],
        ],
    ]) ?>

</div>
