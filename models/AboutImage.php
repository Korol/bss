<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "about_image".
 *
 * @property integer $id
 * @property string $img
 * @property integer $enabled
 */
class AboutImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled'], 'integer'],
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('site', 'ID'),
            'img' => Yii::t('site', 'Img'),
            'enabled' => Yii::t('site', 'Enabled'),
        ];
    }
}
