<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "option".
 *
 * @property integer $id
 * @property integer $enabled
 * @property integer $star
 * @property string $title
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled', 'star'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'enabled' => Yii::t('admin', 'Enabled'),
            'star' => Yii::t('admin', 'Star'),
        ];
    }
}
