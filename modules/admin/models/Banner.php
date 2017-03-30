<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Language;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $type
 * @property string $position
 * @property string $code
 * @property string $url
 * @property string $img
 * @property string $header
 * @property string $content
 * @property integer $buttons
 * @property integer $enabled
 * @property integer $language_id
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'position', 'content'], 'string'],
            [['buttons', 'enabled', 'language_id'], 'integer'],
            [['header', 'code', 'url'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif, jpeg'],
            [['img'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => Yii::t('admin', 'Type'),
            'position' => Yii::t('admin', 'Position'),
            'code' => Yii::t('admin', 'YouTube Video Code'),
            'url' => Yii::t('admin', 'Url'),
            'img' => Yii::t('admin', 'Img'),
            'header' => Yii::t('admin', 'Header'),
            'content' => Yii::t('admin', 'Content'),
            'buttons' => Yii::t('admin', 'Buttons'),
            'enabled' => Yii::t('admin', 'Enabled'),
            'language_id' => Yii::t('admin', 'Language'),
        ];
    }

    public static function getTypes()
    {
        return [
            'image' => Yii::t('admin', 'Image'),
            'image_text' => Yii::t('admin', 'Image & Text'),
            'video' => Yii::t('admin', 'Video'),
        ];
    }

    public static function getPositions()
    {
        return [
            'main_top' => Yii::t('admin', 'Main page Top'),
            'main_middle' => Yii::t('admin', 'Main page Middle'),
            'web_version' => Yii::t('admin', 'Web Version page'),
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

    public function upload()
    {
        if ($this->validate()) {
            $path = 'uploads/banners/';
            $filename = md5(uniqid(rand(),true)) . '.' . $this->img->extension;
            if($this->img->saveAs($path . $filename)) {
                $this->img = $filename;
                $this->save();
                return true;
            }
        } else {
            return false;
        }
    }
}
