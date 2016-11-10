<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $id
 * @property string $url
 * @property string $title_en
 * @property string $title
 * @property string $flag
 * @property integer $enabled
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled'], 'integer'],
            [['url'], 'string', 'max' => 10],
            [['title_en', 'title', 'flag'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'title_en' => 'Title En',
            'title' => 'Title',
            'flag' => 'Flag',
            'enabled' => 'Enabled',
        ];
    }
}
