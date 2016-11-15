<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $type
 * @property string $position
 * @property string $code
 * @property string $img
 * @property string $header
 * @property string $content
 * @property integer $buttons
 * @property integer $enabled
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'position', 'code', 'content'], 'string'],
            [['buttons', 'enabled'], 'integer'],
            [['img', 'header'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'position' => 'Position',
            'code' => 'Code',
            'img' => 'Img',
            'header' => 'Header',
            'content' => 'Content',
            'buttons' => 'Buttons',
            'enabled' => 'Enabled',
        ];
    }
}
