<?php

namespace app\controllers;

use Yii;
use app\models\Faq;
use app\models\FaqInfo;
use yii\helpers\ArrayHelper;

class FaqController extends FrontendController
{
    public $page_header = 'FAQ';
    public $atm = 'faq'; // active top menu point

    public function actionIndex()
    {
        $faqs = Faq::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
            ->orderBy(['sort_order' => 'asc'])
            ->asArray()
            ->all();
        $current_faq = (!empty($faqs)) ? array_shift($faqs) : [];
        $faq_info = FaqInfo::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->one();
        $this->view->params['active_top_menu'] = $this->atm;
        $this->view->title = (!empty($faq_info['header'])) ? $faq_info['header'] : Yii::t('site', $this->page_header);
        return $this->render('index', compact('faqs', 'faq_info', 'current_faq'));
    }

    public function actionView($id)
    {
        $faqs = Faq::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
            ->orderBy(['sort_order' => 'asc'])
            ->asArray()
            ->all();
        $current_faq = [];
        if(!empty($faqs)){
            foreach($faqs as $key => $item){
                if($item['id'] == $id){
                    $current_faq = $item;
                    $this->view->params['seo'][$this->atm] = [
                        'title' => $item['question'],
                        'keywords' => ArrayHelper::getValue($item, 'keywords', ''),
                        'description' => ArrayHelper::getValue($item, 'description', ''),
                    ];
                    unset($faqs[$key]);
                    break;
                }
            }
        }
        $faq_info = FaqInfo::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->one();
        $this->view->params['active_top_menu'] = $this->atm;
        $this->view->title = ((!empty($current_faq['question'])) ? $current_faq['question'] . ' – ' : '') . Yii::t('site', $this->page_header);
        return $this->render('index', compact('current_faq', 'faqs', 'faq_info'));
    }

}
