<?php

namespace app\controllers;

use app\models\Banner;
use app\models\MainPage;
use app\models\News;
use app\models\Feedback;
use Yii;
use yii\filters\VerbFilter;

class SiteController extends FrontendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
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
        $main_page = MainPage::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
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
            ->where(['language_id' => $this->language->id, 'position' => 'main_top', 'enabled' => 1])
            ->asArray()
            ->all();
        $banner_middle = Banner::find()
            ->where(['language_id' => $this->language->id, 'position' => 'main_middle', 'enabled' => 1])
            ->asArray()
            ->one();
        $news = News::find()
            ->where(['language_id' => $this->language->id, 'mainpage' => 1, 'enabled' => 1])
            ->orderBy(['pubdate' => SORT_DESC, 'added' => SORT_DESC])
            ->asArray()
            ->all();
        $feedback = Feedback::find()
            ->where(['language_id' => $this->language->id, 'mainpage' => 1, 'enabled' => 1])
            ->orderBy(['id' => SORT_DESC])
            ->asArray()
            ->all();
        $this->view->params['active_top_menu'] = 'main';
        return $this->render('index', compact('blocks', 'banners', 'banner_middle', 'news', 'feedback'));
    }
}
