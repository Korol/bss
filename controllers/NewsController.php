<?php
/**
 * Created by PhpStorm.
 * User: korol
 * Date: 22.11.16
 * Time: 09:37
 */

namespace app\controllers;

use Yii;
use app\models\News;

class NewsController  extends FrontendController
{

    public function actionIndex()
    {
        $news = News::find()
            ->where(['language_id' => $this->language->id, 'mainpage' => 1, 'enabled' => 1])
            ->asArray()
            ->all();
        $current_news = (!empty($news)) ? array_shift($news) : array();
        $this->view->params['active_top_menu'] = 'news';
        return $this->render('index', compact('current_news', 'news'));
    }
} 