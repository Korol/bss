<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\LanguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Languages');
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
?>
<div class="language-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('admin', 'Create Language'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'url',
            'title_en',
            'title',
            'flag',
            [
                'label' => Yii::t('admin', 'Flag'),
                'format' => 'html',
                'value' => function($data){
                    return '<span class="flag flag-' . $data->flag . '" alt="' . $data->title_en . '"></span>';
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
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
