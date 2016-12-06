<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use app\modules\admin\models\SourceMessage;

class SourceMessageController extends Controller
{
    public function actionIndex($category = '')
    {
        $this->checkAccess();
        if(!empty($category)){
            $source_messages = SourceMessage::find()
                ->where(['category' => $category])
                ->orderBy(['message' => SORT_ASC])
                ->asArray()
                ->all();
        }
        else{
            $source_messages = [];
        }

        return $this->render('index', compact('source_messages', 'category'));
    }

    public function actionSave()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(!empty($post['messages']) && !empty($post['category'])){
            foreach($post['messages'] as $m_id => $message){
                if(!empty($message)){
                    $model = SourceMessage::findOne($m_id);
                    $model->message = $message;
                    $model->update();
                }
            }
        }

        return $this->redirect(['index', 'category' => $post['category']]);
    }

    public function actionDelete($id, $category)
    {
        $this->checkAccess();
        if(!empty($id)){
            $model = SourceMessage::findOne($id);
            $model->delete();
        }

        return $this->redirect(['index', 'category' => $category]);
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
