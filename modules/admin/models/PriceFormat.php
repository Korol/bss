<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "price_format".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $format
 */
class PriceFormat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_format';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'integer'],
            [['format'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'language_id' => Yii::t('admin', 'Language ID'),
            'format' => Yii::t('admin', 'Format'),
        ];
    }
}
