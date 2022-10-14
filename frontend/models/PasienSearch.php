<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TaPasien;

/**
 * PasienSearch represents the model behind the search form about `common\models\TaPasien`.
 */
class PasienSearch extends TaPasien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pasien'], 'integer'],
            [['nama', 'no_rm', 'tgl_lahir', 'tgl_audit', 'siklus', 'ruangan'], 'safe'],
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
        $query = TaPasien::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_pasien' => $this->id_pasien,
            'tgl_lahir' => $this->tgl_lahir,
            'tgl_audit' => $this->tgl_audit,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_rm', $this->no_rm])
            ->andFilterWhere(['like', 'siklus', $this->siklus])
            ->andFilterWhere(['like', 'ruangan', $this->ruangan]);

        return $dataProvider;
    }
}