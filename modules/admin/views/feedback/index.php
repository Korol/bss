<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('admin', 'Create Feedback'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'filter' => \app\modules\admin\models\Feedback::getTypes(),
        ],
        'code:ntext',
        [
            'label' => Yii::t('admin', 'YouTube Video'),
            'format' => 'raw',
            'value' => function($data){
                return (!empty($data->code)) ? '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' . $data->code . '?rel=0&amp;controls=2&amp;modestbranding=1&amp;showinfo=0" allowfullscreen></iframe>' : '';
            },
        ],
        [
            'attribute' => 'img',
            'value' => function($data){
                return (!empty($data->img)) ? Html::img(\yii\helpers\Url::to(['@web/uploads/feedbacks/' . $data->img]), ['width' => '100']) : '';
            },
            'format' => 'html',
        ],
        'username',
        'content:html',
        [
            'attribute' => 'mainpage',
            'value' => function($data){
                $color = 'green';
                $text = Yii::t('admin', 'Yes');
                if($data->mainpage <= 0){
                    $color = 'red';
                    $text = Yii::t('admin', 'No');
                }
                $return = '<span class="admin-' . $color . '">' . $text . '</span>';
                return $return;
            },
            'format' => 'html',
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
