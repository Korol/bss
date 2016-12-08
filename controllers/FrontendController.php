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
use app\models\Seo;
use yii\helpers\ArrayHelper;

class FrontendController extends Controller
{
    public $language;
    public $page_links = [
        'itunes' => 'https://itunes.apple.com/us/app/kontejner-torgovla-i-sklad/id1051218771?mt=8',
        'play' => 'https://play.google.com/store/apps/details?id=boss.sales.accounting.crm.business.trade.debit.invoice.profit_1c&utm_source=global_co&pcampaignid=registered',
        'facebook' => 'https://www.facebook.com/likeaboss.pro/',
        'vk' => 'https://vk.com/bossapp',
        'youtube' => 'https://www.youtube.com/channel/UCSSuNbSPHybHAkcFJA73-mA/videos',
    ];

    public function init()
    {
        $this->view->params['appstore_text'] = Yii::t('site', 'Available on the iPhone');
        $this->view->params['gplay_text'] = Yii::t('site', 'Android app on');
        $this->view->params['subscribe_text'] = Yii::t('site', 'I want to be informed about BOSS news');
        $this->view->params['page_links'] = $this->page_links;
        $this->setLanguages();
        $this->setVideos();
        $this->setSeo();
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

    public function setSeo()
    {
        $seo = Seo::find()
            ->where(['language_id' => $this->language->id])
            ->asArray()
            ->indexBy('page')
            ->all();
        $this->view->params['seo'] = $seo;
    }
} 