<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "price_option".
 *
 * @property integer $price_id
 * @property integer $option_id
 * @property integer $star
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
            [['price_id', 'option_id', 'star'], 'integer'],
            [['value'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'price_id' => Yii::t('admin', 'Price ID'),
            'option_id' => Yii::t('admin', 'Option ID'),
            'value' => Yii::t('admin', 'Value'),
            'star' => Yii::t('admin', 'Star'),
        ];
    }
}
