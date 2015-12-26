<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tank;
use app\models\Gun;
use app\models\TankGun;

class TankSearch extends Tank
{
    public function rules()
    {
        return [
            [['tank_name'], 'safe'],
			[['tankArmor'], 'safe'],
			[['tankGunList'], 'safe'],
        ];
    }
    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Tank::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['attributes'=>[
					'tank_name',
					'tankArmor'=>[
						'asc'=>['tank_armor_lob'=>SORT_ASC,'tank_armor_side'=>SORT_ASC,'tank_armor_rear'=>SORT_ASC],
						'desc'=>['tank_armor_lob'=>SORT_DESC,'tank_armor_side'=>SORT_DESC,'tank_armor_rear'=>SORT_DESC],
					],
					'tankGunList',
				]
			]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
		
		$tankArmor_calc = 'CONCAT(tank_armor_lob, "/", tank_armor_side, "/", tank_armor_rear)';
		$tankGun_calc = 'CONCAT(gun.gun_caliber, " мм ", gun.gun_name)';
		$tankGunList_calc = 'GROUP_CONCAT(CONCAT("\"",' . $tankGun_calc . ', "\"") SEPARATOR ", ")';
		$query->select([
				'tank_name', 
				'tankArmor' => $tankArmor_calc, 
				'tankGunList' => $tankGunList_calc,
			])->joinWith('tankGuns')
			  ->groupBy('tank_name')
			  ->all();
		

        $query->andFilterWhere([
            'tank_id' => $this->tank_id,
        ]);
        $query->andFilterWhere(['like', 'tank_name', $this->tank_name . '%', false])
            ->andFilterWhere(['like', $tankArmor_calc, $this->tankArmor . '%', false])
			->andFilterWhere(['like', $tankGun_calc, $this->tankGunList . '%', false]);
        return $dataProvider;
    }
}
