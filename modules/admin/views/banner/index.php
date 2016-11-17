<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Banners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('admin', 'Create Banner'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'type',
            'value' => function($data){
                $types = $data::getTypes();
                return (!empty($types[$data->type])) ? $types[$data->type] : $data->type;
            },
            'filter' => \app\modules\admin\models\Banner::getTypes(),
        ],
        [
            'attribute' => 'position',
            'value' => function($data){
                $positions = $data::getPositions();
                return (!empty($positions[$data->position])) ? $positions[$data->position] : $data->position;
            },
            'filter' => \app\modules\admin\models\Banner::getPositions(),
        ],
        'code:ntext',
        [
            'attribute' => 'img',
            'value' => function($data){
                return (!empty($data->img)) ? Html::img(\yii\helpers\Url::to(['@web/uploads/banners/' . $data->img]), ['width' => '100']) : '';
            },
            'format' => 'html',
        ],
        'header',
        'content:ntext',
        [
            'attribute' => 'buttons',
            'value' => function($data){
                return ($data->buttons > 0) ? Yii::t('admin', 'Yes') : Yii::t('admin', 'No');
            },
            'filter' => [0 => Yii::t('admin', 'No'), 1 => Yii::t('admin', 'Yes')],
        ],
        [
            'attribute' => 'enabled',
            'value' => function($data){
                $color = 'green';
                $text = Yii::t('admin', 'Enabled');
                if($data->enabled <= 0){
                    $color = 'red';
                    $text = Yii::t('admin', 'Disabled');
                }
                $return = '<span class="admin-' . $color . '">' . $text . '</span>';
                return $return;
            },
            'format' => 'html',
            'filter' => [0 => Yii::t('admin', 'Disabled'), 1 => Yii::t('admin', 'Enabled')],
        ],

        ['class' => 'yii\grid\ActionColumn', 'header' => Yii::t('admin', 'Actions')],
    ];
    if(Yii::$app->user->can('admin')){
        $language_column = [
            'attribute' => 'language_id',
            'value' => function($data){
                return $data->getLanguageTitle();
            },
            'filter' =>  \yii\helpers\ArrayHelper::map(\app\models\Language::find()->all(), 'id', 'title_en'),
        ];
        array_splice($columns, 1, 0, [$language_column]);
    }
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>
</div>
