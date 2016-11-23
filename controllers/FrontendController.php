<?php
/**
 * Created by PhpStorm.
 * User: korol
 * Date: 22.11.16
 * Time: 12:50
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Language;
use app\models\Video;
use yii\helpers\ArrayHelper;

class FrontendController extends Controller
{
    public $language;

    public function init()
    {
        $this->view->params['appstore_text'] = Yii::t('site', 'Available on the iPhone');
        $this->view->params['gplay_text'] = Yii::t('site', 'Android app on');
        $this->view->params['subscribe_text'] = Yii::t('site', 'I want to be informed about BOSS news');
        $this->setLanguages();
        $this->setVideos();
    }

    public function setLanguages()
    {
        $this->language = Language::findOne(['url' => Yii::$app->language]);
        $languages = Language::find()
            ->where(['enabled' => 1])
            ->andWhere(['!=', 'id', $this->language->id])
            ->asArray()
            ->all();
        $this->view->params['current_language'] = ArrayHelper::toArray($this->language);
        $this->view->params['all_languages'] = $languages;
    }

    public function setVideos()
    {
        $videos = Video::find()
            ->where(['language_id' => $this->language->id, 'position' => 'main_bottom', 'enabled' => 1])
            ->asArray()
            ->all();
        $this->view->params['videos'] = $videos;
    }
} 