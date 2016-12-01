<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Language;

/**
 * This is the model class for table "partner_block".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $img
 * @property string $content
 * @property integer $enabled
 */
class PartnerBlock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner_block';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'enabled'], 'integer'],
            [['content'], 'string'],
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
            'id' => Yii::t('admin', 'ID'),
            'language_id' => Yii::t('admin', 'Language'),
            'img' => Yii::t('admin', 'Img'),
            'content' => Yii::t('admin', 'Content'),
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

    public function upload()
    {
        if ($this->validate()) {
            $path = 'uploads/partner/';
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
