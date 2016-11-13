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
//            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'contentOptions'=>['style'=>'width: 70px;'],
            ],
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
            'header:html',
            'content:ntext',
            [
                'attribute' => 'img',
                'value' => function($data){
                    return (!empty($data->img)) ? Html::img(\yii\helpers\Url::to(['@web/uploads/main_page/' . $data->img]), ['width' => '70']) : '';
                },
                'format' => 'html',
                'filter' => [0 => 'Not uploaded', 1 => 'Uploaded'],
//            'contentOptions'=>['style'=>'width: 280px;'],
            ],
//             'sort_order',
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
//            'contentOptions'=>['style'=>'width: 280px;'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
