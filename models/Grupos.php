<?php


namespace app\models;
use Yii;
use yii\base\Model;


class Grupos extends Model
{
	public $id;
	public $nombre;
	public $enable;

	public function rules()
	{
		return [
			['nombre', 'trim'],
			['nombre', 'required'],
			['nombre', 'string', 'length' => [4,100]],
			['id', 'number'],
			['enable', 'boolean'],
		];
	}

	public function atributeLabels()
	{
		return [
			'id'=>'ID',
			'nombre'=>'Nombre del Grupo',
			'enable'=>'Habilitado',
		];
	}
}
