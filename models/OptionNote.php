<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "option_note".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $note
 */
class OptionNote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'option_note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'integer'],
            [['note'], 'string'],
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
            'note' => Yii::t('site', 'Note'),
        ];
    }
}
