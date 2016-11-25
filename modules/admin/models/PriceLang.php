<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "price_lang".
 *
 * @property integer $id
 * @property integer $price_id
 * @property integer $language_id
 * @property string $title
 */
class PriceLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_id', 'language_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'price_id' => Yii::t('admin', 'Price ID'),
            'language_id' => Yii::t('admin', 'Language ID'),
            'title' => Yii::t('admin', 'Title'),
        ];
    }
}
