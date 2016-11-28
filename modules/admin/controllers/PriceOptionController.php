<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\PriceOption;
use app\modules\admin\models\Option;
use app\modules\admin\models\Price;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;

class PriceOptionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->checkAccess();
        $price = Price::find()->asArray()->all();
        $option = Option::find()->asArray()->all();
        $price_option = PriceOption::find()->all();
        if(!empty($price_option)){
//            $price_option = ArrayHelper::map($price_option, 'price_id', 'value', 'option_id');
            $new_price_option = [];
            foreach($price_option as $k => $v){
                $new_price_option[$v['option_id']][$v['price_id']] = [
                    'value' => $v['value'],
                    'star' => $v['star'],
                ];
            }
            $price_option = $new_price_option;
        }
        else{
            $price_option = [];
        }
        $list = $this->getList();
        return $this->render('index', compact('price', 'option', 'list', 'price_option'));
    }

    public function getList()
    {
        return [
            'Yes' => Yii::t('admin', 'Yes'),
            'No' => Yii::t('admin', 'No'),
            'Planned' => Yii::t('admin', 'Planned'),
        ];
    }

    public function actionSave()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(empty($post['options'])){
            return $this->redirect(['index']);
        }

        $model = new PriceOption();
        $model->deleteAll('1 = 1');
        foreach($post['options'] as $option => $prices){
            $insert = [];
            if(!empty($prices)){
                foreach($prices as $p_key => $p_value){
                    $star = (!empty($post['stars'][$option][$p_key])) ? 1 : 0;
                    $insert[] = [$option, $p_key, $p_value, $star];
                }
            }
            if(!empty($insert)){
                Yii::$app->db->createCommand()->batchInsert(
                    'price_option',
                    ['option_id', 'price_id', 'value', 'star'],
                    $insert
                )->execute();
            }
        }

        return $this->redirect(['index']);
    }

    public function checkAccess()
    {
        if(Yii::$app->user->can('admin')){
            return true;
        }
        else {
            throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }

}
