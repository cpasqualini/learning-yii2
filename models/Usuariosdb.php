<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Usuariosdb extends ActiveRecord
{
	public static function getDb()
	{
		return Yii::$app->db;
	}

	public static function tableName()
	{
		return 'usuarios';
	}

	public function getUsergroups()
	{
		return $this->hasMany(Usergroups::className(), ['usuarios_id' => 'id']);
	}

}
