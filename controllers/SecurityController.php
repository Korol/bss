<?php
/**
 * Created by PhpStorm.
 * User: korol
 * Date: 08.12.16
 * Time: 13:42
 */

namespace app\controllers;

use dektrium\user\models\LoginForm;
use app\models\Language;

class SecurityController extends \dektrium\user\controllers\SecurityController
{
    /**
     * Displays the login page.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }

        /** @var LoginForm $model */
        $model = \Yii::createObject(LoginForm::className());
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
            $this->trigger(self::EVENT_AFTER_LOGIN, $event);

            $language = Language::find()
                ->where(['id' => \Yii::$app->user->identity->language_id])
                ->asArray()
                ->one();
            $url = (!empty($language['url'])) ? ['/admin/default/index', 'language' => $language['url']] : null;

            return (!empty($url)) ?  $this->redirect($url) : $this->goBack();
        }

        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }
} 