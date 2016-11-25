<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property string $title
 * @property string $cost
 * @property integer $enabled
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
            [['enabled'], 'integer'],
            [['title', 'cost'], 'string', 'max' => 255],
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
        ];
    }
}
