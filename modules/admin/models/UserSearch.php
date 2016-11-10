<?php
/**
 * Created by PhpStorm.
 * User: korol
 * Date: 10.11.16
 * Time: 19:20
 */

namespace app\modules\admin\models;


use yii\data\ActiveDataProvider;

class UserSearch extends \dektrium\user\models\UserSearch {

    public $language_id;

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['fieldInteger'] = ['language_id', 'integer'];

        return $rules;
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        $atributeLabels = parent::activeAttributes();
        $atributeLabels['language_id'] = 'Язык';

        return $atributeLabels;
    }

    public function search($params)
    {
        $query = $this->finder->getUserQuery()->with('language');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        if ($this->created_at !== null) {
            $date = strtotime($this->created_at);
            $query->andFilterWhere(['between', 'created_at', $date, $date + 3600 * 24]);
        }

        $query->andFilterWhere(['language_id' => $this->language_id]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['registration_ip' => $this->registration_ip]);

        return $dataProvider;
    }


} 