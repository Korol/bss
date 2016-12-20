<?php

namespace app\controllers;

use app\models\StaticPages;
use yii\helpers\ArrayHelper;

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

}
