<?php

namespace app\models;


use Yii;
use yii\data\ActiveDataProvider;

class Tank extends \yii\db\ActiveRecord
{
	const ARMOR_DELIMITER  = '/';
    public static function tableName(){
        return 'tank';
    }
    public function attributeLabels()
    {
        return [
            'tank_name' => 'Наименование',
            'tankArmor' => 'Броня',
            'tankGunList' => 'Совместимые орудия',
        ];
    }
	public static function parseTankArmor($aValue){
		return explode(self::ARMOR_DELIMITER, $aValue);
	}
	
	//вычисляемые поля
	public function getTankArmor(){
		$armor_array = [
			$this->tank_armor_lob,
			$this->tank_armor_side,
			$this->tank_armor_rear,
		];
		return implode($this::ARMOR_DELIMITER, $armor_array);
	}
	//связные данные
	public function getTankIdGuns(){
		return $this->hasMany(TankGun::classname(), ['tank_id' => 'tank_id']);
	}
	public function getTankGuns(){
		return $this->hasMany(Gun::className(), ['gun_id' => 'gun_id'])
					->via('tankIdGuns');
	}
	public function getTankGunLine(){
		$gun_array = [];
		foreach($this->tankGuns as $row){
			$gun_array[] = $row->GunFullName;
		}
		return implode(', ', $gun_array);
	}
}
