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
	public $tankArmor;
	public $tankGunLine;
    public function rules()
    {
        return [
            [['tank_name'], 'safe'],
			[['tankArmor'], 'safe'],
			[['tankGunLine'], 'safe'],
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
						'asc'=>[
							'tank_armor_lob'=>SORT_ASC,
							'tank_armor_side'=>SORT_ASC,
							'tank_armor_rear'=>SORT_ASC,
						],
						'desc'=>[
							'tank_armor_lob'=>SORT_DESC,
							'tank_armor_side'=>SORT_DESC,
							'tank_armor_rear'=>SORT_DESC,
						],
					],
					'tankGunLine'=>[
						'asc'=>[
							'gun.gun_caliber'=>SORT_ASC,
							'gun.gun_name'=>SORT_ASC,
						],
						'desc'=>[
							'gun.gun_caliber'=>SORT_DESC,
							'gun.gun_name'=>SORT_DESC,
						],
					],
				]
			]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
		//зависимости	
		$query->joinWith('tankGuns');
		//фильтр имени танка
		$query->andFilterWhere(['like', 'tank_name', $this->tank_name . '%', false]);
		//филтр блони
		$armor_array = Tank::parseTankArmor($this->tankArmor);
		$query->andFilterWhere(['like', 'tank_armor_lob', $armor_array[0] . '%', false])
			->andFilterWhere(['like', 'tank_armor_side', $armor_array[1] . '%', false])
			->andFilterWhere(['like', 'tank_armor_rear', $armor_array[2] . '%', false]);
		//фильтр орудий
		$gun_array = Gun::ParseFullName($this->tankGunLine);
		$query->andFilterWhere(['like', 'gun.gun_caliber', $gun_array[0] . '%', false])
			->andFilterWhere(['like', 'gun.gun_name', $gun_array[1] . '%', false]);
				
		$query->all();
        return $dataProvider;
    }
}
