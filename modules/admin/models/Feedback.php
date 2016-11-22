<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Language;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $type
 * @property string $code
 * @property string $username
 * @property string $img
 * @property string $content
 * @property integer $enabled
 * @property integer $mainpage
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'enabled', 'mainpage'], 'integer'],
            [['type', 'content'], 'string'],
            [['code', 'username'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,gif,jpeg'],
            [['img'], 'safe'],
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
            'code' => Yii::t('admin', 'Code'),
            'username' => Yii::t('admin', 'Username'),
            'img' => Yii::t('admin', 'Img'),
            'content' => Yii::t('admin', 'Content'),
            'enabled' => Yii::t('admin', 'Enabled'),
            'mainpage' => Yii::t('admin', 'Main Page'),
        ];
    }

    public static function getTypes()
    {
        return [
            'video' => Yii::t('admin', 'Video'),
            'text' => Yii::t('admin', 'Text'),
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
            $path = 'uploads/feedbacks/';
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
