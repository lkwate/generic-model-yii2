<?php

namespace app\modules\genericmodel\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\genericmodel\models\GeneratorCrud as Generator;
use app\modules\genericmodel\models\GenericModel;
//use yii\gii\generators\crud\Generator; // generator to generate

/**
 * GenericModelSearch represents the model behind the search form of `app\models\GenericModelSearch`.
 */

class GenericModelSearch extends GenericModel {

    private static $_generatorSearch;

    public static function genericInitSearch() {
        GenericModelSearch::$_generatorSearch = new Generator();
        GenericModelSearch::$_generatorSearch->modelClass = "app\modules\genericmodel\models\GenericModel";
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $result = GenericModelSearch::$_generatorSearch->generateSearchRules();
        $return = []; 
        foreach($result as $k => $v) {
            $return[] = eval("return ".$v.";");
        }
        return $return;
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
    public function search($params) {

        $query = GenericModel::find();

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

        $result = GenericModelSearch::$_generatorSearch->generateSearchConditionsArray($this);
        $return = []; 
        foreach($result[0] as $arr) {
            $return = array_merge_recursive($arr, $return);
        }
        $query->andFilterWhere($return);

        foreach($result[1] as $arr) {
            $query = $query->andFilterWhere($arr);
        }
        return $dataProvider;
    }
}