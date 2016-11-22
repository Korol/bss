<?php

namespace app\controllers;

use Yii;
use app\models\Feedback;

class FeedbackController  extends FrontendController
{
    public $page_header = 'Отзывы';

    public function actionIndex()
    {
        $feedback = Feedback::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
            ->orderBy(['id' => SORT_DESC])
            ->asArray()
            ->all();
        $video_feedback = $text_feedback = [];
        if(!empty($feedback)){
            foreach($feedback as $key => $feed){
                if($feed['type'] == 'video'){
                    $video_feedback[$key] = $feed;
                }
                elseif($feed['type'] == 'text'){
                    $text_feedback[$key] = $feed;
                }
            }
        }
        $this->view->params['active_top_menu'] = 'feedback';
        $this->view->title = $page_header = $this->page_header;
        return $this->render('index', compact('video_feedback', 'text_feedback', 'page_header'));
    }
} 