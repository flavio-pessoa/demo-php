<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Funcionario;

/**
 * FuncionarioSearch represents the model behind the search form of `app\models\Funcionario`.
 */
class FuncionarioSearch extends Funcionario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_funcionario', 'cod_departamento'], 'integer'],
            [['nome_funcionario', 'email_funcionario', 'login_funcionario', 'senha_funcionario', 'status_funcionario'], 'safe'],
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
        $query = Funcionario::find();

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
            'cod_funcionario' => $this->cod_funcionario,
            'cod_departamento' => $this->cod_departamento,
        ]);

        $query->andFilterWhere(['like', 'nome_funcionario', $this->nome_funcionario])            
            ->andFilterWhere(['like', 'email_funcionario', $this->email_funcionario])
            ->andFilterWhere(['like', 'login_funcionario', $this->login_funcionario])
            ->andFilterWhere(['like', 'senha_funcionario', $this->senha_funcionario])
            ->andFilterWhere(['like', 'status_funcionario', $this->status_funcionario]);

        return $dataProvider;
    }
}
