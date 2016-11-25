<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Language;
use app\modules\admin\models\User;
use app\modules\admin\models\PriceLang;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;

class PriceLangController extends Controller
{
    public $app_language_id = 0;

    public function actionIndex($lang_id = 0)
    {
        $this->checkAccess();
        $admin = false;
        if(Yii::$app->user->can('admin')){
            $admin = true;
            if(!empty($lang_id) && is_numeric($lang_id)){
                $price_lang = PriceLang::find()
                    ->where(['language_id' => $lang_id])
                    ->asArray()
                    ->indexBy('price_id')
                    ->all();
            }
            else{
                $price_lang = [];
            }
        }
        else{
            $lang_id = $this->app_language_id;
            $price_lang = PriceLang::find()
                ->where(['language_id' => $this->app_language_id])
                ->asArray()
                ->indexBy('price_id')
                ->all();
        }

        return $this->render('index', compact('lang_id', 'admin', 'price_lang'));
    }



    public function checkAccess()
    {
        if(Yii::$app->user->can('admin')){
            return true;
        }
        else {
            $language = Language::findOne(['url' => Yii::$app->language]);
            $this->app_language_id = $language->id;
            $user = User::findOne(Yii::$app->user->id);
            if($language->id == $user->language_id){
                return true;
            }
            else{
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
        }
    }

}
