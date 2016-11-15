<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Videos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('admin', 'Create Video'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'position',
                'value' => function($data){
                    $positions = $data::getPositions();
                    return (!empty($positions[$data->position])) ? $positions[$data->position] : $data->position;
                },
                'filter' => \app\modules\admin\models\Video::getPositions(),
            ],
            'header:ntext',
            [
//                'attribute' => 'code',
                'label' => Yii::t('admin', 'Video'),
                'format' => 'raw',
                'value' => function($data){
                    return $data->code;
                },
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
//            'contentOptions'=>['style'=>'width: 280px;'],
            ],

            ['class' => 'yii\grid\ActionColumn', 'header' => Yii::t('admin', 'Actions')],
        ],
    ]); ?>
</div>
