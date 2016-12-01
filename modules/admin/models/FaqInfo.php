<?php

namespace app\modules\admin\models;

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
            'id' => Yii::t('admin', 'ID'),
            'language_id' => Yii::t('admin', 'Language'),
            'header' => Yii::t('admin', 'Header'),
            'email' => Yii::t('admin', 'Email'),
            'email_text' => Yii::t('admin', 'Email Text'),
        ];
    }
}
