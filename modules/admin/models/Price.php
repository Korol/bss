<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property string $title
 * @property string $cost
 * @property string $annually
 * @property string $year_cost
 * @property integer $enabled
 * @property integer $discount
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled', 'discount'], 'integer'],
            [['title', 'cost', 'annually', 'year_cost'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('admin', 'Title'),
            'cost' => Yii::t('admin', 'Cost'),
            'enabled' => Yii::t('admin', 'Enabled'),
            'annually' => Yii::t('admin', 'Annually'),
            'year_cost' => Yii::t('admin', 'Year Cost'),
            'discount' => Yii::t('admin', 'Discount, %'),
        ];
    }
}
