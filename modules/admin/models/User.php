<?php
/**
 * Created by PhpStorm.
 * User: korol
 * Date: 10.11.16
 * Time: 18:01
 */

namespace app\modules\admin\models;
use app\models\Language;

class User extends \dektrium\user\models\User {
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'language_id';
        $scenarios['update'][]   = 'language_id';
        $scenarios['register'][] = 'language_id';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['fieldInteger'] = ['language_id', 'integer'];

        return $rules;
    }

    public function attributeLabels()
    {
        $atributeLabels = parent::activeAttributes();
        $atributeLabels['language_id'] = 'Язык';

        return $atributeLabels;
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