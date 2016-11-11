<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Language;

/**
 * This is the model class for table "main_page".
 *
 * @property integer $id
 * @property integer $language_id
 * @property integer $block_id
 * @property string $header
 * @property string $content
 * @property string $img
 * @property integer $sort_order
 * @property integer $enabled
 */
class MainPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'block_id', 'sort_order', 'enabled'], 'integer'],
            [['content'], 'string'],
            [['header', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_id' => Yii::t('admin', 'Language'),
            'block_id' => Yii::t('admin', 'Block'),
            'header' => Yii::t('admin', 'Header'),
            'content' => Yii::t('admin', 'Content'),
            'img' => Yii::t('admin', 'Img'),
            'sort_order' => Yii::t('admin', 'Sort Order'),
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
}
