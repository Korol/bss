<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "static_pages".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $type
 * @property string $title
 * @property string $content
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $enabled
 */
class StaticPages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'static_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'enabled'], 'integer'],
            [['type', 'content', 'meta_keywords', 'meta_description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('site', 'ID'),
            'language_id' => Yii::t('site', 'Language ID'),
            'type' => Yii::t('site', 'Type'),
            'title' => Yii::t('site', 'Title'),
            'content' => Yii::t('site', 'Content'),
            'meta_keywords' => Yii::t('site', 'Meta Keywords'),
            'meta_description' => Yii::t('site', 'Meta Description'),
            'enabled' => Yii::t('site', 'Enabled'),
        ];
    }
}
