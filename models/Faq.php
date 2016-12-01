<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $question
 * @property string $answer
 * @property integer $enabled
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'enabled'], 'integer'],
            [['answer'], 'string'],
            [['question'], 'string', 'max' => 255],
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
            'question' => Yii::t('site', 'Question'),
            'answer' => Yii::t('site', 'Answer'),
            'enabled' => Yii::t('site', 'Enabled'),
        ];
    }
}
