<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_page".
 *
 * @property integer $id
 * @property integer $language_id
 * @property integer $block_id
 * @property string $header
 * @property string $content
 * @property string $img
 * @property integer $sort_order
 * @property integer $enabled
 */
class MainPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'block_id', 'sort_order', 'enabled'], 'integer'],
            [['content'], 'string'],
            [['header', 'img'], 'string', 'max' => 255],
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
            'block_id' => 'Block ID',
            'header' => 'Header',
            'content' => 'Content',
            'img' => 'Img',
            'sort_order' => 'Sort Order',
            'enabled' => 'Enabled',
        ];
    }
}
