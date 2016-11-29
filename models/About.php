<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $header
 * @property string $content
 * @property string $photo_header
 * @property string $vacancy_header
 * @property string $vacancy_content
 * @property string $email
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'integer'],
            [['content', 'vacancy_content'], 'string'],
            [['header', 'photo_header', 'vacancy_header', 'email'], 'string', 'max' => 255],
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
            'header' => Yii::t('site', 'Header'),
            'content' => Yii::t('site', 'Content'),
            'photo_header' => Yii::t('site', 'Photo Header'),
            'vacancy_header' => Yii::t('site', 'Vacancy Header'),
            'vacancy_content' => Yii::t('site', 'Vacancy Content'),
            'email' => Yii::t('site', 'Email'),
        ];
    }
}
