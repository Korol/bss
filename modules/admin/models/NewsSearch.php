<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\News;

/**
 * NewsSearch represents the model behind the search form about `app\modules\admin\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'language_id', 'enabled', 'mainpage'], 'integer'],
            [['header', 'content', 'pubdate', 'keywords', 'description'], 'safe'],
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
        $query = News::find();
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
            'language_id' => $this->language_id,
            'pubdate' => $this->pubdate,
            'enabled' => $this->enabled,
            'mainpage' => $this->mainpage,
        ]);

        $query->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
