<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\MainPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Main Page Blocks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-lg-3">
            <p>
                <?= Html::a(Yii::t('admin', 'Create Main Page element'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="col-lg-9">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <?= Yii::t('admin', 'Blocks map'); ?>
                            </a>
                             <span class="blocks-map-help">(on the example of Russian version of the site)</span>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                <?php for($ci = 1; $ci <= 5; $ci++): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne<?= $ci; ?>">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne<?= $ci; ?>" aria-expanded="true" aria-controls="collapseOne<?= $ci; ?>">
                                                <?= Yii::t('admin', 'Block') . ' ' . $ci; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne<?= $ci; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?= $ci; ?>">
                                        <div class="panel-body">
                                            <?= Html::img(\yii\helpers\Url::to(['@web/images/block' . $ci . '.png'])); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $columns = [
        [
            'attribute' => 'id',
            'contentOptions'=>['style'=>'width: 70px;'],
        ],
        [
            'attribute' => 'block_id',
            'value' => function($data){
                return Yii::t('admin', 'Block') . ' ' . $data->block_id;
            },
            'filter' => $blocks_filter,
        ],
        'header:html',
        'content:html',
        [
            'attribute' => 'img',
            'value' => function($data){
                return (!empty($data->img)) ? Html::img(\yii\helpers\Url::to(['@web/uploads/main_page/' . $data->img]), ['width' => '70']) : '';
            },
            'format' => 'html',
            'filter' => [0 => 'Not uploaded', 1 => 'Uploaded'],
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
