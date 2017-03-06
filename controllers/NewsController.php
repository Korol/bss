<?php

namespace app\controllers;

use Yii;
use app\models\News;
use yii\helpers\ArrayHelper;

class NewsController  extends FrontendController
{
    public $atm = 'news'; // active top menu point

    public function actionIndex()
    {
        $news = News::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
            ->orderBy(['pubdate' => SORT_DESC, 'added' => SORT_DESC])
            ->asArray()
            ->all();
        $current_news = (!empty($news)) ? array_shift($news) : [];
        $this->view->params['active_top_menu'] = $this->atm;
        $this->view->title = $news_header = Yii::t('site', 'News from boss');
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
                    $this->view->params['seo'][$this->atm] = [
                        'title' => $item['header'],
                        'keywords' => ArrayHelper::getValue($item, 'keywords', ''),
                        'description' => ArrayHelper::getValue($item, 'description', ''),
                    ];
                    unset($news[$key]);
                    break;
                }
            }
        }
        $this->view->params['active_top_menu'] = $this->atm;
        $this->view->title = ((!empty($current_news['header'])) ? $current_news['header'] . ' – ' : '') . Yii::t('site', 'News from boss');
        $news_header = Yii::t('site', 'News from boss');
        return $this->render('index', compact('current_news', 'news', 'news_header'));
    }
} 