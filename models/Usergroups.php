<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Usergroups extends ActiveRecord
{
	public static function getDb()
	{
		return Yii::$app->db;
	}

	public static function tableName()
	{
		return 'usergroup';
	}

	public function getUsuario()
	{
		return $this->hasOne(Usuarios::className(), ['id'=>'usuarios_id']);
	}

	public function getGrupo()
	{
		return $this->hasOne(Grupos::className(), ['id'=>'grupos_id']);
	}
}
