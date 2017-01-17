<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Language;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $question
 * @property string $answer
 * @property integer $enabled
 * @property integer $sort_order
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
            'id' => Yii::t('admin', 'ID'),
            'language_id' => Yii::t('admin', 'Language'),
            'question' => Yii::t('admin', 'Question'),
            'answer' => Yii::t('admin', 'Answer'),
            'enabled' => Yii::t('admin', 'Enabled'),
            'sort_order' => Yii::t('admin', 'Sort Order'),
        ];
    }

    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    public function getLanguageTitle()
    {
        $language = $this->language;
        return $language ? $language->title_en : '-';
    }
}
