<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Language;
use app\modules\admin\models\User;
use app\modules\admin\models\OptionLang;
use app\modules\admin\models\Option;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;

class OptionLangController extends Controller
{
    public $app_language_id = 0;

    public function actionIndex($lang_id = 0)
    {
        $this->checkAccess();
        $admin = false;
        if(Yii::$app->user->can('admin')){
            $admin = true;
            if(!empty($lang_id) && is_numeric($lang_id)){
                $option_lang = OptionLang::find()
                    ->where(['language_id' => $lang_id])
                    ->asArray()
                    ->indexBy('option_id')
                    ->all();
            }
            else{
                $option_lang = [];
            }
        }
        else{
            $lang_id = $this->app_language_id;
            $option_lang = OptionLang::find()
                ->where(['language_id' => $this->app_language_id])
                ->asArray()
                ->indexBy('option_id')
                ->all();
        }
        $languages = Language::find()->asArray()->all();
        $option = Option::find()->asArray()->all();

        return $this->render('index', compact('lang_id', 'admin', 'option_lang', 'languages', 'option'));
    }

    public function actionSave()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(empty($post['translation']) || empty($post['language_id'])){
            return $this->redirect(['index']);
        }

        $model = new OptionLang();
        $model->deleteAll(['language_id' => $post['language_id']]);
        $insert = [];
        foreach($post['translation'] as $option_id => $translation){
            $insert[] = [$option_id, $post['language_id'], $translation];
        }
        if(!empty($insert)){
            Yii::$app->db->createCommand()->batchInsert(
                'option_lang',
                ['option_id', 'language_id', 'title'],
                $insert
            )->execute();
        }

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
