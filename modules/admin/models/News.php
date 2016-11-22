<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Language;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $header
 * @property string $content
 * @property string $added
 * @property string $pubdate
 * @property string $keywords
 * @property string $description
 * @property integer $enabled
 * @property integer $mainpage
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'enabled', 'mainpage'], 'integer'],
            [['content', 'description'], 'string'],
            [['added', 'pubdate'], 'safe'],
            [['header', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'language_id' => Yii::t('admin', 'Language'),
            'header' => Yii::t('admin', 'Header'),
            'content' => Yii::t('admin', 'Content'),
            'added' => Yii::t('admin', 'Added'),
            'pubdate' => Yii::t('admin', 'Publication date'),
            'enabled' => Yii::t('admin', 'Enabled'),
            'mainpage' => Yii::t('admin', 'Main Page'),
            'keywords' => Yii::t('admin', 'META-keywords'),
            'description' => Yii::t('admin', 'META-description'),
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
}
