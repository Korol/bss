<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Feedback */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
$language = \app\models\Language::findOne(['id' => $model->language_id]);
$types = $model::getTypes();
?>
<div class="feedback-view">

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
        <?= Html::a(Yii::t('admin', 'Create Feedback'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'code',
            [
                'label' => Yii::t('admin', 'YouTube Video'),
                'value' => (!empty($model->code) && ($model->type == 'video')) ? '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' . $model->code . '?rel=0&amp;controls=2&amp;modestbranding=1&amp;showinfo=0" allowfullscreen></iframe>' : '',
                'format' => 'raw',
            ],
            'username',
            [
                'label' => Yii::t('admin', 'Image'),
                'value' => (!empty($model->img)) ? Html::img(\yii\helpers\Url::to(['@web/uploads/feedbacks/' . $model->img]), ['width' => '100']) : '',
                'format' => 'html',
            ],
            'content:ntext',
            [
                'label' => Yii::t('admin', 'Main Page'),
                'value' => ($model->mainpage > 0) ? Yii::t('admin', 'Yes') : Yii::t('admin', 'No'),
            ],
            [
                'label' => Yii::t('admin', 'Enabled'),
                'value' => ($model->enabled > 0) ? Yii::t('admin', 'Enabled') : Yii::t('admin', 'Disabled'),
            ],
        ],
    ]) ?>

</div>
