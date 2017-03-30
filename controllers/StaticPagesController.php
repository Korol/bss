<?php

namespace app\controllers;

use app\models\StaticPages;
use yii\helpers\ArrayHelper;
use app\models\Banner;

class StaticPagesController extends FrontendController
{
    public function actionIndex()
    {
        return $this->redirect(['privacy']);
    }

    public function actionPrivacy()
    {
        $page = $this->getPage('privacy');
        return $this->render('index', compact('page'));
    }

    public function actionTerms()
    {
        $page = $this->getPage('terms');
        return $this->render('index', compact('page'));
    }

    public function actionWebversion()
    {
        $page = $this->getPage('web_version');
        $banners = Banner::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1, 'position' => 'web_version'])
            ->orderBy(['id' => SORT_ASC])
            ->asArray()
            ->all();
        return $this->render('web_version', compact('page', 'banners'));
    }

    public function getPage($type)
    {
        $page = StaticPages::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1, 'type' => $type])
            ->asArray()
            ->one();
        $this->view->title = ArrayHelper::getValue($page, 'title', '');
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => ArrayHelper::getValue($page, 'meta_keywords', '')], 'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => ArrayHelper::getValue($page, 'meta_description', '')], 'description');
        $this->view->params['active_top_menu'] = '';
        return (!empty($page)) ? $page : [];
    }

    public function actionEn()
    {
        $this->view->params['active_top_menu'] = '';
        return $this->render('en');
    }

    public function actionTr()
    {
        $this->view->params['active_top_menu'] = '';
        return $this->render('tr');
    }

    public function actionVideo()
    {
        $this->view->params['active_top_menu'] = '';
        return $this->render('video');
    }

    public function actionHow()
    {
        $this->view->params['active_top_menu'] = '';
        return $this->render('how_to_work');
    }

    public function actionPrint_ru(){
        $this->view->params['active_top_menu'] = '';
        return $this->render('print_ru');
    }

    public function actionPrint_en(){
        $this->view->params['active_top_menu'] = '';
        return $this->render('print_en');
    }

    public function actionPrint_tr(){
        $this->view->params['active_top_menu'] = '';
        return $this->render('print_tr');
    }
}
