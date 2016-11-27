<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "option_lang".
 *
 * @property integer $id
 * @property integer $option_id
 * @property integer $language_id
 * @property string $title
 */
class OptionLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'option_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_id', 'language_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('site', 'ID'),
            'option_id' => Yii::t('site', 'Option ID'),
            'language_id' => Yii::t('site', 'Language ID'),
            'title' => Yii::t('site', 'Title'),
        ];
    }
}
