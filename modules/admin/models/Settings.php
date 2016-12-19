<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 * @property string $position
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'position'], 'string'],
            [['key', 'value'], 'required'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'key' => Yii::t('admin', 'Key'),
            'value' => Yii::t('admin', 'Value'),
            'position' => Yii::t('admin', 'Position'),
        ];
    }

    public function getPositions()
    {
        return [
            'head' => Yii::t('admin', 'Between of the <head></head> tags'),
            'body_start' => Yii::t('admin', 'After <body> tag'),
            'body_end' => Yii::t('admin', 'Before </body> tag'),
            'none' => Yii::t('admin', 'No position'),
        ];
    }
}
