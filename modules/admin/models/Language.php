<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $id
 * @property string $url
 * @property string $title_en
 * @property string $title
 * @property string $flag
 * @property integer $enabled
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'title_en', 'title', 'flag'], 'required'],
            [['enabled'], 'integer'],
            [['url'], 'string', 'max' => 10],
            [['title_en', 'title', 'flag'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'url' => Yii::t('admin', 'Url segment'),
            'title_en' => Yii::t('admin', 'Title En'),
            'title' => Yii::t('admin', 'Title'),
            'flag' => Yii::t('admin', 'Flag prefix'),
            'enabled' => Yii::t('admin', 'Enabled'),
        ];
    }
}
