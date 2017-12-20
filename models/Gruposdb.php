<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Gruposdb extends ActiveRecord
{
	public static function getDb()
	{
		return Yii::$app->db;
	}

	public static function tableName()
	{
		return 'grupos';
	}

	public function getGroupusers()
	{
		return $this->hasMany(Usergroups::className(), ['grupos_id' => 'id']);
	}

	/*
	 * public function getUsers()
	 * {
	 * 	return $this->hasMany(Usuarios::className(), ['id' => 'usuarios_id'])
	 *		->via('groupusers')
	 *		->leftJoin('usergroup', '{{usuarios}}.id=usuarios_id');
	 * }
 	 */

}
