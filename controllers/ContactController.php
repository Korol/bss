<?php

namespace app\controllers;

use Yii;
use app\models\Contact;

class ContactController extends FrontendController
{
    public $page_header = 'Contact';

    public function actionIndex()
    {
        $contact = Contact::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->one();
        $this->view->params['active_top_menu'] = 'contact';
        $this->view->title = (!empty($contact['header'])) ? $contact['header'] : $this->page_header;
        return $this->render('index', compact('contact'));
    }
}
