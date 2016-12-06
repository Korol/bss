<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Language;
use app\modules\admin\models\User;
use app\modules\admin\models\Contact;
use yii\web\ForbiddenHttpException;

class ContactController extends Controller
{
    public $app_language_id = 0;

    public function actionIndex($lang_id = 0)
    {
        $this->checkAccess();
        $admin = false;
        if(Yii::$app->user->can('admin')){
            $admin = true;
            if(!empty($lang_id) && is_numeric($lang_id)){
                $contact = Contact::find()
                    ->where(['language_id' => $lang_id])
                    ->asArray()
                    ->one();
            }
            else{
                $contact = [];
            }
        }
        else{
            $lang_id = $this->app_language_id;
            $contact = Contact::find()
                ->where(['language_id' => $lang_id])
                ->asArray()
                ->one();
        }
        $languages = Language::find()->asArray()->all();

        return $this->render('index', compact('admin', 'lang_id', 'contact', 'languages'));
    }

    public function actionSave()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(empty($post['language_id'])){
            return $this->redirect(['index']);
        }

        $model = new Contact();
        $model->deleteAll(['language_id' => $post['language_id']]);
        $model->language_id = $post['language_id'];
        $model->header = $post['header'];
        $model->content = $post['content'];
        $model->rating = $post['rating'];
        $model->rating_text = $post['rating_text'];
        $model->qty = $post['qty'];
        $model->qty_text = $post['qty_text'];
        $model->feedbacks = $post['feedbacks'];
        $model->feedbacks_text = $post['feedbacks_text'];
        $model->email = $post['email'];
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
