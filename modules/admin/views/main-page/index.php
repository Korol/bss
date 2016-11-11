<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\MainPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Main Page');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('admin', 'Create Main Page element'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'language_id',
                'value' => function($data){
                    return $data->getLanguageTitle();
                },
                'filter' =>  \yii\helpers\ArrayHelper::map(\app\models\Language::find()->all(), 'id', 'title_en'),
//            'contentOptions'=>['style'=>'width: 280px;'],
            ],
            [
                'attribute' => 'block_id',
                'value' => function($data){
                    return Yii::t('admin', 'Block') . ' ' . $data->block_id;
                },
                'filter' => $blocks_filter,
//            'contentOptions'=>['style'=>'width: 280px;'],
            ],
            'header',
            'content:ntext',
            [
                'attribute' => 'img',
                'value' => function($data){
                    return Yii::t('admin', 'Block') . ' ' . $data->block_id;
                },
                'filter' => [],
//            'contentOptions'=>['style'=>'width: 280px;'],
            ],
//             'sort_order',
            [
                'attribute' => 'enabled',
                'value' => function($data){
                    return ($data->enabled > 0) ? Yii::t('admin', 'Enabled') : Yii::t('admin', 'Disabled');
                },
                'filter' => [0 => Yii::t('admin', 'Disabled'), 1 => Yii::t('admin', 'Enabled')],
//            'contentOptions'=>['style'=>'width: 280px;'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
