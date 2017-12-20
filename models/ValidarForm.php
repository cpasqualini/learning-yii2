<?php

namespace app\models;
use Yii;
use yii\base\Model;


class ValidarForm extends Model
{
	public $nombre;
	public $email;
	
	public function rules()
	{
		return [
			[['nombre','email'], 'trim'],
			[['nombre','email'], 'required'],
			['email', 'email'],
			['nombre', 'string', 'length' => [4,100]],
		];
	}

	public function attributeLabels()
	{
		return [
			'nombre' => 'Nombre Completo',
			'email' => 'Correo Electrónico',
		];
	}
}


