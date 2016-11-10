<?php
/**
 * Created by PhpStorm.
 * User: korol
 * Date: 10.11.16
 * Time: 18:33
 */

namespace app\modules\admin\controllers;
use app\models\Language;
use app\modules\admin\models\User;
use app\modules\admin\models\UserSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class AdminController extends \dektrium\user\controllers\AdminController {

    public function actionIndex()
    {
        Url::remember('', 'actions-redirect');
        $searchModel  = \Yii::createObject(UserSearch::className());
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        /** @var User $user */
        $user = \Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
        ]);
        $event = $this->getUserEvent($user);

        $this->performAjaxValidation($user);

        $this->trigger(self::EVENT_BEFORE_CREATE, $event);
        if ($user->load(\Yii::$app->request->post()) && $user->create()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'User has been created'));
            $this->trigger(self::EVENT_AFTER_CREATE, $event);
            return $this->redirect(['update', 'id' => $user->id]);
        }

        return $this->render('create', [
            'user' => $user,
            'language' => $this->getLanguages(),
        ]);
    }

    public function actionUpdate($id){
        Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);
        $user->scenario = 'update';
        $event = $this->getUserEvent($user);

        $this->performAjaxValidation($user);

        $this->trigger(self::EVENT_BEFORE_UPDATE, $event);
        if ($user->load(\Yii::$app->request->post()) && $user->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Account details have been updated'));
            $this->trigger(self::EVENT_AFTER_UPDATE, $event);
            return $this->refresh();
        }

        return $this->render('_account', [
            'user' => $user,
            'language' => $this->getLanguages(),
        ]);
    }

    public function getLanguages()
    {
        $languages = Language::find()->indexBy('id')->all();
        return $languages ? ArrayHelper::map($languages, 'id', 'title_en') : array();
    }
} 