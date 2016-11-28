<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Language;
use app\modules\admin\models\User;
use app\modules\admin\models\PriceLang;
use app\modules\admin\models\Price;
use app\modules\admin\models\PriceFormat;
use app\modules\admin\models\PriceNote;
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
                $price_note = PriceNote::find()
                    ->where(['language_id' => $lang_id])
                    ->asArray()
                    ->one();
            }
            else{
                $price_lang = $price_note = [];
            }
        }
        else{
            $lang_id = $this->app_language_id;
            $price_lang = PriceLang::find()
                ->where(['language_id' => $this->app_language_id])
                ->asArray()
                ->indexBy('price_id')
                ->all();
            $price_note = PriceNote::find()
                ->where(['language_id' => $lang_id])
                ->asArray()
                ->one();
        }
        $languages = Language::find()->asArray()->all();
        $price = Price::find()->asArray()->all();
        $format = PriceFormat::find()->where(['language_id' => $lang_id])->asArray()->one();

        return $this->render('index', compact('lang_id', 'admin', 'price_lang', 'languages', 'price', 'format', 'price_note'));
    }

    public function actionSave()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(empty($post['translation']) || empty($post['language_id'])){
            return $this->redirect(['index']);
        }

        $model = new PriceLang();
        $model->deleteAll(['language_id' => $post['language_id']]);
        $insert = [];
        foreach($post['translation'] as $price_id => $translation){
            $insert[] = [$price_id, $post['language_id'], $translation];
        }
        if(!empty($insert)){
            Yii::$app->db->createCommand()->batchInsert(
                'price_lang',
                ['price_id', 'language_id', 'title'],
                $insert
            )->execute();
        }

        return $this->redirect(['index', 'lang_id' => $post['language_id']]);
    }

    public function actionFormat()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(empty($post) || empty($post['language_id'])){
            return $this->redirect(['index']);
        }

        $model = new PriceFormat();
        if(!empty($post['format_before']) || !empty($post['format_after'])){
            $model->deleteAll(['language_id' => $post['language_id']]);
            $format = (!empty($post['format_before'])) ? $post['format_before'] : '';
            $format .= '{sum}';
            $format .= (!empty($post['format_after'])) ? $post['format_after'] : '';

            $model->language_id = $post['language_id'];
            $model->format = $format;
            $model->save(false);
        }

        return $this->redirect(['index', 'lang_id' => $post['language_id']]);
    }

    public function actionNote()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(empty($post['price_note']) || empty($post['language_id'])){
            return $this->redirect(['index']);
        }

        $model = new PriceNote();
        $model->deleteAll(['language_id' => $post['language_id']]);
        $model->language_id = $post['language_id'];
        $model->note = $post['price_note'];
        $model->save();

        return $this->redirect(['index', 'lang_id' => $post['language_id']]);
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
