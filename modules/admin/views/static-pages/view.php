<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\StaticPages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Static Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->params['container'] = 'container';
$language = \app\models\Language::findOne(['id' => $model->language_id]);
$static_pages = new \app\modules\admin\models\StaticPages();
$types = $static_pages->getTypes();
?>
<div class="static-pages-view">

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
        <?= Html::a(Yii::t('admin', 'Create Static Page'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'title',
            'content:html',
            'meta_keywords:ntext',
            'meta_description:ntext',
            [
                'label' => Yii::t('admin', 'Enabled'),
                'value' => ($model->enabled > 0) ? Yii::t('admin', 'Enabled') : Yii::t('admin', 'Disabled'),
            ],
        ],
    ]) ?>

</div>
