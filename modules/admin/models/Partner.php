<?php

namespace app\modules\admin\models;

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
 * @property string $file
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
//            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif, jpeg, pdf, xls, xlsx, doc, docx, txt'],
            [['file'], 'safe'],
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
            'content' => Yii::t('admin', 'Content'),
            'button_text' => Yii::t('admin', 'Button Text'),
            'email' => Yii::t('admin', 'Email'),
            'email_text' => Yii::t('admin', 'Email Text'),
            'file' => Yii::t('admin', 'File'),
        ];
    }

}
