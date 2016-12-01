<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Language;
use app\modules\admin\models\User;
use app\modules\admin\models\FaqInfo;
use yii\web\ForbiddenHttpException;

class FaqInfoController extends Controller
{
    public $app_language_id = 0;

    public function actionIndex($lang_id = 0)
    {
        $this->checkAccess();
        $admin = false;
        if(Yii::$app->user->can('admin')){
            $admin = true;
            if(!empty($lang_id) && is_numeric($lang_id)){
                $faq_info = FaqInfo::find()
                    ->where(['language_id' => $lang_id])
                    ->asArray()
                    ->one();
            }
            else{
                $faq_info = [];
            }
        }
        else{
            $lang_id = $this->app_language_id;
            $faq_info = FaqInfo::find()
                ->where(['language_id' => $lang_id])
                ->asArray()
                ->one();
        }
        $languages = Language::find()->asArray()->all();

        return $this->render('index', compact('admin', 'lang_id', 'faq_info', 'languages'));
    }

    public function actionSave()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(empty($post['language_id'])){
            return $this->redirect(['index']);
        }

        $model = new FaqInfo();
        $model->deleteAll(['language_id' => $post['language_id']]);
        $model->language_id = $post['language_id'];
        $model->header = $post['header'];
        $model->email = $post['email'];
        $model->email_text = $post['email_text'];
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
