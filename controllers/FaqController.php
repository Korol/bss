<?php

namespace app\controllers;

use Yii;
use app\models\Faq;
use app\models\FaqInfo;

class FaqController extends FrontendController
{
    public $page_header = 'FAQ';

    public function actionIndex()
    {
        $faqs = Faq::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
            ->asArray()
            ->all();
        $faq_info = FaqInfo::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->one();
        $this->view->params['active_top_menu'] = 'faq';
        $this->view->title = (!empty($faq_info['header'])) ? $faq_info['header'] : $this->page_header;
        return $this->render('index', compact('faqs', 'faq_info'));
    }

}
