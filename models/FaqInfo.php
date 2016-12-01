<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq_info".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $header
 * @property string $email
 * @property string $email_text
 */
class FaqInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'integer'],
            [['email_text'], 'string'],
            [['header', 'email'], 'string', 'max' => 255],
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
            'email' => Yii::t('site', 'Email'),
            'email_text' => Yii::t('site', 'Email Text'),
        ];
    }
}
