<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Language;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $page
 * @property integer $language_id
 * @property string $title
 * @property string $keywords
 * @property string $description
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'integer'],
            [['keywords', 'description'], 'string'],
            [['page', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'page' => Yii::t('admin', 'Page'),
            'language_id' => Yii::t('admin', 'Language'),
            'title' => Yii::t('admin', 'Title'),
            'keywords' => Yii::t('admin', 'Keywords'),
            'description' => Yii::t('admin', 'Description'),
        ];
    }

    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    public function getLanguageTitle()
    {
        $language = $this->language;
        return $language ? $language->title_en : '-';
    }

    public function getPages()
    {
        return [
            'main' => Yii::t('admin', 'Main page'),
            'about' => Yii::t('admin', 'About Boss'),
            'price' => Yii::t('admin', 'Price'),
            'feedback' => Yii::t('admin', 'Feedback'),
            'faq' => Yii::t('admin', 'FAQ'),
            'partner' => Yii::t('admin', 'Become a partner'),
            'contact' => Yii::t('admin', 'Contact'),
//            'terms' => Yii::t('admin', 'Terms of use'),
//            'privacy' => Yii::t('admin', 'Privacy policy'),
        ];
    }
}
