<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $header
 * @property string $content
 * @property string $rating
 * @property string $rating_text
 * @property string $qty
 * @property string $qty_text
 * @property string $feedbacks
 * @property string $feedbacks_text
 * @property string $email
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'integer'],
            [['content'], 'string'],
            [['header', 'rating_text', 'qty_text', 'feedbacks_text', 'email'], 'string', 'max' => 255],
            [['rating', 'qty', 'feedbacks'], 'string', 'max' => 20],
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
            'rating' => Yii::t('site', 'Rating'),
            'rating_text' => Yii::t('site', 'Rating Text'),
            'qty' => Yii::t('site', 'Qty'),
            'qty_text' => Yii::t('site', 'Qty Text'),
            'feedbacks' => Yii::t('site', 'Feedbacks'),
            'feedbacks_text' => Yii::t('site', 'Feedbacks Text'),
            'email' => Yii::t('site', 'Email'),
        ];
    }
}
