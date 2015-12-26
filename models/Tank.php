<?php

namespace app\models;


use Yii;
use yii\data\ActiveDataProvider;

class Tank extends \yii\db\ActiveRecord
{
	public $tankGunList;
	public $tankArmor;

    public static function tableName()
    {
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

	public function getTankGuns()
	{
		return $this->hasMany(Gun::className(), ['gun_id' => 'gun_id'])
					->viaTable(TankGun::tableName(), ['tank_id' => 'tank_id']);
	}
	
}
