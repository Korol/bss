<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SeoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'SEO');
$this->params['breadcrumbs'][] = $this->title;
$seo = new \app\modules\admin\models\Seo();
$pages = $seo->getPages();
?>
<div class="seo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('admin', 'Create SEO'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'page',
            'value' => function($data){
                $pages = $data->getPages();
                return $pages[$data->page];
            },
            'filter' => $pages,
        ],
        'title',
        'keywords:ntext',
        'description:ntext',

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
