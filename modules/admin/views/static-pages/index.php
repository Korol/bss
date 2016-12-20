<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\StaticPagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Static Pages');
$this->params['breadcrumbs'][] = $this->title;
$static_pages = new \app\modules\admin\models\StaticPages();
$types = $static_pages->getTypes();
?>
<div class="static-pages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('admin', 'Create Static Page'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'type',
            'value' => function($data){
                $types = $data->getTypes();
                return $types[$data->type];
            },
            'filter' => $types,
        ],
        'title',
        //'content:ntext',
         'meta_keywords:ntext',
         'meta_description:ntext',
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

        ['class' => 'yii\grid\ActionColumn'],
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
