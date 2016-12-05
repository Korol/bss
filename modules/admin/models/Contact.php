<?php

namespace app\modules\admin\models;

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
            'id' => Yii::t('admin', 'ID'),
            'language_id' => Yii::t('admin', 'Language'),
            'header' => Yii::t('admin', 'Header'),
            'content' => Yii::t('admin', 'Content'),
            'rating' => Yii::t('admin', 'Rating'),
            'rating_text' => Yii::t('admin', 'Rating Text'),
            'qty' => Yii::t('admin', 'Quantity'),
            'qty_text' => Yii::t('admin', 'Quantity Text'),
            'feedbacks' => Yii::t('admin', 'Feedbacks'),
            'feedbacks_text' => Yii::t('admin', 'Feedbacks Text'),
            'email' => Yii::t('admin', 'Email'),
        ];
    }
}
