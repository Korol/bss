<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Question/Answer');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('admin', 'Create Question/Answer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],

        'sort_order',
        'question',
        'answer:html',
        'keywords',
        'description',
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
