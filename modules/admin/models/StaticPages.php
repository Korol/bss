<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Language;

/**
 * This is the model class for table "static_pages".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $type
 * @property string $title
 * @property string $content
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $enabled
 */
class StaticPages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'static_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'enabled'], 'integer'],
            [['type', 'content', 'meta_keywords', 'meta_description'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'type' => Yii::t('admin', 'Type'),
            'title' => Yii::t('admin', 'Title'),
            'content' => Yii::t('admin', 'Content'),
            'meta_keywords' => Yii::t('admin', 'META Keywords'),
            'meta_description' => Yii::t('admin', 'META Description'),
            'enabled' => Yii::t('admin', 'Enabled'),
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

    public function getTypes()
    {
        return [
            'privacy' => Yii::t('admin', 'Privacy policy'),
            'terms' => Yii::t('admin', 'Terms of use'),
        ];
    }
}
