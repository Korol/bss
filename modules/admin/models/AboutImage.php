<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "about_image".
 *
 * @property integer $id
 * @property string $img
 * @property integer $enabled
 */
class AboutImage extends \yii\db\ActiveRecord
{
    public $images;
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled'], 'integer'],
            //[['img'], 'string', 'max' => 255],
            [['img', 'images'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif', 'maxFiles' => 4],
            [['img', 'images'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'img' => Yii::t('admin', 'Image'),
            'enabled' => Yii::t('admin', 'Enabled'),
        ];
    }

    public function upload_one()
    {
        if($this->validate()){
            $path = 'uploads/about/';
            $filename = md5(uniqid(rand(),true)) . '.' . $this->img->extension;
            if($this->img->saveAs($path . $filename)){
                $this->img = $filename;
                $this->save();
            }
            return true;
        }
        else{
            return false;
        }
    }
}
