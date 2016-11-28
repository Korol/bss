<?php

namespace app\controllers;

use Yii;
use app\models\Price;
use app\models\PriceLang;
use app\models\PriceFormat;
use app\models\PriceOption;
use app\models\Option;
use app\models\OptionLang;
use app\models\OptionNote;
use app\models\PriceNote;
use yii\helpers\ArrayHelper;

class PriceController extends FrontendController
{
    public function actionIndex()
    {
        $prices = Price::find()
            ->where(['enabled' => 1])
            ->orderBy(['id' => SORT_ASC])
            ->asArray()
            ->all();
        $options = Option::find()
            ->where(['enabled' => 1])
            ->orderBy(['id' => SORT_ASC])
            ->asArray()
            ->all();
        $prices_lang = PriceLang::find()
            ->where(['language_id' => $this->language->id])
            ->indexBy('price_id')
            ->asArray()
            ->all();
        $options_lang = OptionLang::find()
            ->where(['language_id' => $this->language->id])
            ->indexBy('option_id')
            ->asArray()
            ->all();
        $prices_options = PriceOption::find()->all();
        if(!empty($prices_options)){
//            $prices_options = ArrayHelper::map($prices_options, 'price_id', 'value', 'option_id');
            $new_price_option = [];
            foreach($prices_options as $k => $v){
                $new_price_option[$v['option_id']][$v['price_id']] = [
                    'value' => $v['value'],
                    'star' => $v['star'],
                ];
            }
            $prices_options = $new_price_option;
        }
        else{
            $prices_options = [];
        }
        $price_format = PriceFormat::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->one();
        $option_note = OptionNote::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->one();
        $price_note = PriceNote::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->one();

        $this->view->params['active_top_menu'] = 'price';
        $this->view->title = $price_header = Yii::t('site', 'Tariffs');

        return $this->render('index', compact('prices', 'options', 'prices_lang', 'options_lang', 'prices_options', 'price_format', 'price_header', 'option_note', 'price_note'));
    }

}
