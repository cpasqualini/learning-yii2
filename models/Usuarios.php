<?php


namespace app\models;
use Yii;
use yii\base\Model;


class Usuarios extends Model
{
	public $id;
	public $username;
	public $password;
	public $enable;

	public function rules()
	{
		return [
			[['username', 'password'], 'trim'],
			[['username', 'password'], 'required'],
			[['username', 'password'], 'string', 'length' => [4,100]],
			['id', 'number'],
			['enable', 'boolean'],
		];
	}

	public function atributeLabels()
	{
		return [
			'id'=>'ID',
			'username'=>'Nombre de usuario',
			'password'=>'Contraseña',
			'enable'=>'Habilitado',
		];
	}
}
