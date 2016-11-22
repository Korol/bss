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
    public $news_header = 'Что нового у Босса';

    public function actionIndex()
    {
        $news = News::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
            ->orderBy(['pubdate' => SORT_DESC, 'added' => SORT_DESC])
            ->asArray()
            ->all();
        $current_news = (!empty($news)) ? array_shift($news) : array();
        $this->view->params['active_top_menu'] = 'news';
        $this->view->title = $news_header = $this->news_header;
        return $this->render('index', compact('current_news', 'news', 'news_header'));
    }

    public function actionView($id)
    {
        $news = News::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
            ->orderBy(['pubdate' => SORT_DESC, 'added' => SORT_DESC])
            ->asArray()
            ->all();
        $current_news = [];
        if(!empty($news)){
            foreach($news as $key => $item){
                if($item['id'] == $id){
                    $current_news = $item;
                    $this->view->registerMetaTag(['name' => 'keywords', 'content' => $item['keywords']], 'keywords');
                    $this->view->registerMetaTag(['name' => 'description', 'content' => $item['description']], 'description');
                    unset($news[$key]);
                    break;
                }
            }
        }
        $this->view->params['active_top_menu'] = 'news';
        $this->view->title = ((!empty($current_news['header'])) ? $current_news['header'] . ' – ' : '') . 'Что нового у Босса';
        $news_header = $this->news_header;
        return $this->render('index', compact('current_news', 'news', 'news_header'));
    }
} 