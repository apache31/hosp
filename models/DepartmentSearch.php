<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Department;

/**
 * DepartmentSearch represents the model behind the search form about `app\models\Department`.
 */
class DepartmentSearch extends Department
{
    /**
     * @inheritdoc
     */
    public $province;
    public $amphur;
    public $district;
    
    public function rules()
    {
//        return [
//            [['depart_id'], 'integer'],
//            [['name', 'addrpart', 'moopart', 'tmbpart', 'amppart', 'chwpart', 'postcode', 'phone', 'fax', 'website'], 'safe'],
//        ];
        return [
            [['depart_id'], 'integer'],
            [['name'], 'safe'],
            [['amppart','tmbpart'], 'safe'],
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
        $query = Department::find();

        // add conditions that should always apply here
        $query->joinWith(['province','amphur','district']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
//        $dataProvider->sort->attributes['province'] = [
//            'asc' => ['province.province_name' => SORT_ASC],
//            'desc' => ['province.province_name' => SORT_DESC],
//        ];

        $this->load($params);

        //if (!$this->validate()) {
        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'depart_id' => $this->depart_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
//            ->andFilterWhere(['like', 'addrpart', $this->addrpart])
//            ->andFilterWhere(['like', 'moopart', $this->moopart])
//            ->andFilterWhere(['like', 'tmbpart', $this->tmbpart])
//            ->andFilterWhere(['like', 'amppart', $this->amppart])
//            ->andFilterWhere(['like', 'chwpart', $this->chwpart])
//            ->andFilterWhere(['like', 'postcode', $this->postcode])
//            ->andFilterWhere(['like', 'phone', $this->phone])
//            ->andFilterWhere(['like', 'fax', $this->fax])
//            ->andFilterWhere(['like', 'website', $this->website]);
              ->andFilterWhere(['like', 'district.district_name', $this->tmbpart])
              ->andFilterWhere(['like', 'amphur.amphur_name', $this->amppart]);

        return $dataProvider;
    }
}
