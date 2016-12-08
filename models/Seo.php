<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $page
 * @property integer $language_id
 * @property string $title
 * @property string $keywords
 * @property string $description
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'integer'],
            [['keywords', 'description'], 'string'],
            [['page', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'page' => Yii::t('admin', 'Page'),
            'language_id' => Yii::t('admin', 'Language ID'),
            'title' => Yii::t('admin', 'Title'),
            'keywords' => Yii::t('admin', 'Keywords'),
            'description' => Yii::t('admin', 'Description'),
        ];
    }
}
