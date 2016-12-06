<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use app\models\Language;
use app\modules\admin\models\User;
use app\modules\admin\models\SourceMessage;
use app\modules\admin\models\Message;

class MessageController extends Controller
{
    public $app_language_id = 0;
    public $language_url = '';

    public function actionIndex($category = '', $lang_id = 0)
    {
        $this->checkAccess();
        $admin = false;
        $source_messages = $messages = [];
        $language_url = '';
        if(Yii::$app->user->can('admin')){
            $admin = true;
            if(!empty($lang_id) && is_numeric($lang_id) && !empty($category)){
                $source_messages = SourceMessage::find()
                    ->where(['category' => $category])
                    ->orderBy(['message' => SORT_ASC])
                    ->asArray()
                    ->all();
                $language = Language::findOne($lang_id);
                $language_url = $language->url;
                $messages = Message::find()
                    ->where(['language' => $language->url])
                    ->asArray()
                    ->indexBy('id')
                    ->all();
            }
        }
        elseif(!empty($category)){
            $lang_id = $this->app_language_id;
            $language_url = $this->language_url;
            $source_messages = SourceMessage::find()
                ->where(['category' => $category])
                ->orderBy(['message' => SORT_ASC])
                ->asArray()
                ->all();
            $messages = Message::find()
                ->where(['language' => $this->language_url])
                ->asArray()
                ->indexBy('id')
                ->all();
        }
        $languages = Language::find()->asArray()->all();

        return $this->render('index', compact('admin', 'lang_id', 'language_url', 'category', 'source_messages', 'messages', 'languages'));
    }

    public function actionSave()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(!empty($post['messages']) && !empty($post['language_url'])){
            if(!Yii::$app->user->can('admin') && ($post['language_url'] != $this->language_url)){
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }

            foreach($post['messages'] as $m_id => $message){
                if(!empty($message)){
                    $model = Message::findOne(['id' => $m_id, 'language' => $post['language_url']]);
                    if(!empty($model)){
                        // update
                        $model->translation = $message;
                    }
                    else{
                        // insert
                        $model = new Message();
                        $model->id = $m_id;
                        $model->language = $post['language_url'];
                        $model->translation = $message;
                    }
                    $model->save();
                }
            }
        }
        $category = (!empty($post['category'])) ? $post['category'] : '';
        $lang_id = (!empty($post['lang_id'])) ? $post['lang_id'] : 0;
        return $this->redirect(['index', 'category' => $category, 'lang_id' => $lang_id]);
    }

    public function checkAccess()
    {
        if(Yii::$app->user->can('admin')){
            return true;
        }
        else {
            $language = Language::findOne(['url' => Yii::$app->language]);
            $this->app_language_id = $language->id;
            $this->language_url = $language->url;
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
