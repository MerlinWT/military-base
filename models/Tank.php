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
            'tankGunLine' => 'Совместимые орудия',
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
		return $this->tank_armor_lob ? implode($this::ARMOR_DELIMITER, $armor_array) : '';
	}
	public function setTankArmor($value){
		$armor_array = $this->parseTankArmor($value);
		$this->tank_armor_lob = $armor_array[0];
		$this->tank_armor_side = $armor_array[1];
		$this->tank_armor_rear = $armor_array[2];
	}
	public function getTankClass(){
		//у легких танков лобовая броня меньше 50мм
		return $this->tank_armor_lob < 50 ? 'tank-light' : 'tank-heavy';
	}
	//связные данные
	public function getTankIdGuns(){
		return $this->hasMany(TankGun::classname(), ['tank_id' => 'tank_id']);
	}
	public function getTankGuns(){
		return $this->hasMany(Gun::className(), ['gun_id' => 'gun_id'])
					->via('tankIdGuns');
	}
    public function setTankGuns($guns){
        $this->populateRelation('tankGuns', $guns);
    }
	public function getTankGunLine(){
		$gun_array = [];
		foreach($this->tankGuns as $row){
			$gun_array[] = $row->GunFullName;
		}
		return implode(', ', $gun_array);
	}
    public function setTankGunLine($gunString){
        $fullname_list = explode(';', $gunString);
        foreach ($fullname_list as $fullname){
            $attributes = Gun::parseFullName($fullname);
            if (Gun::find()->where(['gun_caliber' => $attributes[0], 'gun_name' => $attributes[1]])->exists()){
                //echo 'нашли!';
                $guns[] = Gun::findOne(['gun_caliber' => $attributes[0], 'gun_name' => $attributes[1]]);
            }else{
                //echo 'НЕ нашли - надо создать';
                $gun = new Gun();
                $gun->gun_caliber = $attributes[0];
                $gun->gun_name = $attributes[1];
                $gun->save();
                $guns[] = $gun;
            }
            $this->setTankGuns($guns);
        }
    }
    public function afterSave($true, $changedAttributes){
        $relatedRecords = $this->getRelatedRecords();
        $guns = $relatedRecords['tankGuns'];
        foreach ($guns as $index => $gun){
            $tank_gun = new TankGun();
            $tank_gun->tank_id = $this->tank_id;
            $tank_gun->gun_id = $gun->gun_id;
            $tank_gun->save();
        }

    }
}
