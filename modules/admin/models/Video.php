<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Language;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $header
 * @property string $position
 * @property string $code
 * @property integer $enabled
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'enabled'], 'integer'],
            [['position', 'code', 'header'], 'string'],
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
            'position' => Yii::t('admin', 'Position'),
            'code' => Yii::t('admin', 'Code'),
            'enabled' => Yii::t('admin', 'Enabled'),
            'header' => Yii::t('admin', 'Header'),
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

    public static function getPositions()
    {
        return [
//            'main_middle' => Yii::t('admin', 'Main page Middle'),
            'main_bottom' => Yii::t('admin', 'Main page Bottom'),
        ];
    }
}
