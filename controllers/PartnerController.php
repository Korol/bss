<?php

namespace app\controllers;

use Yii;
use app\models\Partner;
use app\models\PartnerBlock;

class PartnerController extends FrontendController
{
    public $page_header = 'Become a partner';

    public function actionIndex()
    {
        $partner = Partner::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->one();
        $partner_blocks = PartnerBlock::find()
            ->where(['language_id' => $this->language->id, 'enabled' => 1])
            ->asArray()
            ->all();
        $this->view->params['active_top_menu'] = 'partner';
        $this->view->title = (!empty($partner['header'])) ? $partner['header'] : $this->page_header;
        return $this->render('index', compact('partner', 'partner_blocks'));
    }
}
