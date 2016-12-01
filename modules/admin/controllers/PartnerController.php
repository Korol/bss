<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\Partner;
use app\models\Language;
use app\modules\admin\models\User;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

class PartnerController extends Controller
{
    public $app_language_id = 0;

    public function actionIndex($lang_id = 0)
    {
        $this->checkAccess();
        $admin = false;
        if(Yii::$app->user->can('admin')){
            $admin = true;
            if(!empty($lang_id) && is_numeric($lang_id)){
                $partner = Partner::find()
                    ->where(['language_id' => $lang_id])
                    ->asArray()
                    ->one();
            }
            else{
                $partner = [];
            }
        }
        else{
            $lang_id = $this->app_language_id;
            $partner = Partner::find()
                ->where(['language_id' => $lang_id])
                ->asArray()
                ->one();
        }
        $languages = Language::find()->asArray()->all();

        return $this->render('index', compact('admin', 'lang_id', 'partner', 'languages'));
    }

    public function actionSave()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(empty($post['language_id'])){
            return $this->redirect(['index']);
        }

        $model = new Partner();
        $old = $model->find()->where(['language_id' => $post['language_id']])->asArray()->one();

        $model->deleteAll(['language_id' => $post['language_id']]);
        $model->language_id = $post['language_id'];
        $model->header = $post['header'];
        $model->content = $post['content'];
        $model->button_text = $post['button_text'];
        $model->email = $post['email'];
        $model->email_text = $post['email_text'];

        if(!empty($_FILES['file']['tmp_name'])){
            $path = 'uploads/partner/';
            $allowed = explode(', ' , 'png, jpg, gif, jpeg, pdf, xls, xlsx, doc, docx, txt');
            $file_name_ex = explode('.', $_FILES['file']['name']);
            $ext = end($file_name_ex);
            if(in_array($ext, $allowed)){
                //$filename = md5(uniqid(rand(),true)) . '.' . $ext;
                $filename = str_replace('.' . $ext, '', $_FILES['file']['name']) . '_' . date('ymdHis') . '.' . $ext;
                move_uploaded_file($_FILES['file']['tmp_name'], $path . $filename);
                $model->file = $filename;
                if(!empty($old['file'])){
                    @unlink(Yii::getAlias('@web') . $path . $old['file']);
                }
            }
        }
        elseif(!empty($old['file'])){
            $model->file = $old['file'];
        }

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
