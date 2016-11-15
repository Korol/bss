<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Banner;

/**
 * BannerSearch represents the model behind the search form about `app\modules\admin\models\Banner`.
 */
class BannerSearch extends Banner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'buttons', 'enabled'], 'integer'],
            [['type', 'position', 'code', 'header', 'content', 'language_id'], 'safe'], // 'img',
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Banner::find();
        // language condition
        if(!Yii::$app->user->can('admin')){
            $query->andWhere(['language_id' => Yii::$app->user->identity->language_id]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'position' => $this->position,
            'buttons' => $this->buttons,
            'enabled' => $this->enabled,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
