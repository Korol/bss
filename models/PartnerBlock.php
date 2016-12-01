<?php

namespace app\models;

use Yii;

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
            'language_id' => Yii::t('site', 'Language ID'),
            'img' => Yii::t('site', 'Img'),
            'content' => Yii::t('site', 'Content'),
            'enabled' => Yii::t('site', 'Enabled'),
        ];
    }
}
