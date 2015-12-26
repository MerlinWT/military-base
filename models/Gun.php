<?php

namespace app\models;

use Yii;

class Gun extends \yii\db\ActiveRecord
{
	const CAPTION_DELIMITER = ' мм ';
	//формируем полное название орудия
	private function BuildFullName(){
		return $this->gun_caliber . $this::CAPTION_DELIMITER . $this->gun_name;
	}
	//Разбираем полное имя на части: калибр, наименование
	public static function parseFullName($aValue){
		return explode(self::CAPTION_DELIMITER, $aValue);
	}
	public function getGunFullName(){
		return '"' . $this->BuildFullName() . '"';
	}
}
