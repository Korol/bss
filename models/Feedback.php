<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $type
 * @property string $code
 * @property string $username
 * @property string $img
 * @property string $content
 * @property integer $enabled
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'enabled'], 'integer'],
            [['type', 'content'], 'string'],
            [['code', 'username', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_id' => 'Language',
            'type' => 'Type',
            'code' => 'Code',
            'username' => 'Username',
            'img' => 'Img',
            'content' => 'Content',
            'enabled' => 'Enabled',
        ];
    }
}
