<?php

namespace app\controllers;

use Yii;
use app\models\About;
use app\models\AboutImage;
use app\models\Vacancy;

class AboutController extends FrontendController
{
    public $page_header = 'Who is the Boss';

    public function actionIndex()
    {
        $about = About::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->one();
        $about_images = AboutImage::find()
            ->where(['enabled' => 1])
            ->asArray()
            ->all();
        $vacancies = Vacancy::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
            ->asArray()
            ->all();
        $this->view->params['active_top_menu'] = 'about';
        $this->view->title = (!empty($about['header'])) ? $about['header'] : $this->page_header;
        return $this->render('index', compact('about', 'about_images', 'vacancies'));
    }

}
