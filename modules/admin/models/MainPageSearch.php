<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\MainPage;

/**
 * MainPageSearch represents the model behind the search form about `app\modules\admin\models\MainPage`.
 */
class MainPageSearch extends MainPage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'language_id', 'block_id', 'sort_order', 'enabled'], 'integer'],
            [['header', 'content'], 'safe'],
            [['img'], 'safe'], // комментирование удаляет фильтр из таблицы index
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
        $query = MainPage::find();
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
            'block_id' => $this->block_id,
            'sort_order' => $this->sort_order,
            'enabled' => $this->enabled,
        ]);

        $query->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'content', $this->content]);
//            ->andFilterWhere(['like', 'img', $this->img]);

        // img conditions
        if(is_numeric($this->img)){
            if($this->img > 0){
                // not null
                $query->andWhere("(`img` IS NOT NULL AND `img` != '')");
            }
            else{
                // null or empty
                $query->andWhere("(`img` IS NULL OR `img` = '')");
            }
        }

        return $dataProvider;
    }
}
