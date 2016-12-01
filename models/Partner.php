<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $header
 * @property string $content
 * @property string $button_text
 * @property string $email
 * @property string $email_text
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'integer'],
            [['content', 'email_text'], 'string'],
            [['header', 'button_text', 'email'], 'string', 'max' => 255],
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
            'button_text' => Yii::t('site', 'Button Text'),
            'email' => Yii::t('site', 'Email'),
            'email_text' => Yii::t('site', 'Email Text'),
        ];
    }
}
