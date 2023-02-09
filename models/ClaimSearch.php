<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Claim;

/**
 * ClaimSearch represents the model behind the search form of `app\models\Claim`.
 */
class ClaimSearch extends Claim
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'iduser', 'idcategory'], 'integer'],
            [['name', 'description', 'time', 'status', 'photobef', 'photoaft'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Claim::find();

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
            'time' => $this->time,
            'iduser' => $this->iduser,
            'idcategory' => $this->idcategory,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'photobef', $this->photobef])
            ->andFilterWhere(['like', 'photoaft', $this->photoaft]);

        return $dataProvider;
    }
}
