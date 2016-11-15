<?php

namespace app\controllers;

use app\models\Banner;
use app\models\Language;
use app\models\MainPage;
use app\models\Video;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\View;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->setLanguages();
        $language = Language::findOne(['url' => Yii::$app->language]);
        $main_page = MainPage::find()
            ->where(['language_id' => $language->id, 'enabled' => 1])
            ->asArray()
            ->orderBy('sort_order ASC')
            ->all();
        $blocks = [];
        if(!empty($main_page)){
            foreach($main_page as $row){
                $blocks[$row['block_id']][] = $row;
            }
        }
        $banners = Banner::find()
            ->where(['language_id' => $language->id, 'position' => 'main_top', 'enabled' => 1])
            ->asArray()
            ->all();
        $videos = Video::find()
            ->where(['language_id' => $language->id, 'position' => 'main_bottom', 'enabled' => 1])
            ->asArray()
            ->all();
        return $this->render('index', compact('blocks', 'banners', 'videos'));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function setLanguages()
    {
        $language = Language::findOne(['url' => Yii::$app->language]);
        $languages = Language::find()
            ->where(['enabled' => 1])
            ->andWhere(['!=', 'id', $language->id])
            ->asArray()
            ->all();
        $this->view->params['current_language'] = ArrayHelper::toArray($language);
        $this->view->params['all_languages'] = $languages;
    }
}
