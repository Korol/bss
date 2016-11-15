<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $position
 * @property string $code
 * @property integer $enabled
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'enabled'], 'integer'],
            [['position', 'code'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_id' => 'Language ID',
            'position' => 'Position',
            'code' => 'Code',
            'enabled' => 'Enabled',
        ];
    }
}
