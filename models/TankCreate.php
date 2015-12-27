<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tank;
use app\models\Gun;
use app\models\TankGun;

class TankCreate extends Tank
{
	//public $tankArmor;
	public $tankGunLine;
	public function scenarios()
    {
        return Model::scenarios();
    }
	public function rules(){
		return [
			[
				['tank_name', 'tankArmor', 'tankGunLine'], 
				'required', 
				'message' => 'Поле не может быть пустым',
			],
			[
				'tank_name', 
				'string', 
				'max' => 50, 
				'message' => 'Наименование должно содержать не более 50 символов',
			],
			[
				'tankArmor', 
				'match', 
				'pattern' => '#(\d+' . Tank::ARMOR_DELIMITER . '){2}\d+$#', 
				'message' => 'Значение должно иметь следующий формат: <лобовая броня в мм>/<боковая броня в мм>/<задняя броня в мм>. Например: 100/80/90.',
			],
			[
				'tankGunLine', 
				'match', 
				'pattern' => '#\d+(' . Gun::CAPTION_DELIMITER . ').{1,50}$#', 
				'message' => 'Значение должно иметь следующий форма: <калибр в мм> мм <наименование>. Наименование должно состоять не более чем из 50 символов.',
			],	
		];
	}
}
