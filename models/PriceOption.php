<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "price_option".
 *
 * @property integer $price_id
 * @property integer $option_id
 * @property string $value
 */
class PriceOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_id'], 'required'],
            [['price_id', 'option_id'], 'integer'],
            [['value'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'price_id' => Yii::t('site', 'Price ID'),
            'option_id' => Yii::t('site', 'Option ID'),
            'value' => Yii::t('site', 'Value'),
        ];
    }
}
