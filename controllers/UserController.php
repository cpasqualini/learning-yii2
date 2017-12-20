<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Usuarios;
use app\models\Grupos;
use app\models\Usuariosdb;
use app\models\Gruposdb;
use app\models\Usergroups;

class UserController extends Controller
{
    /**
     * @inheritdoc
     */

	public function actionNuevousuario($id=null) 
	{
		$titulo='Nuevo Usuario';
		$mensaje=null;
		$usuarios = new Usuarios();

		if ($usuarios->load(Yii::$app->request->post()))
		{
			if ($usuarios->validate())
			{
				$usuariosdb = new Usuariosdb();

				$usuariosdb->username = $usuarios->username;
				$usuariosdb->password = md5($usuarios->password);
				$usuariosdb->enable = true;

				if ($usuarios->id != null)
				{
					$usuariosdb->id = $usuarios->id;
					$usuariosdb->enable = $usuarios->enable;

				}
				else
				{
					if ($usuariosdb->insert())
					{
						$mensaje = "Usuario creado correctamente";

						$usuarios->username = null;
						$usuarios->password = null;
					}
					else
					{
						$mensaje = "Ha habido un error creando el usuario";
					}
				}
			}
			else
			{
				$usuarios->getErrors();
			}
		}
		elseif ($id != null)
		{
			$usuariosdb = new Usuariosdb();
			$usuario=$usuariosdb->find()->where(['id'=>$id])->one();

			$usuarios->id		= $usuario->id;
			$usuarios->username	= $usuario->username;
			$usuarios->password	= null;
			$usuarios->enable	= $usuario->enable;
			$titulo='Editar Usuario';
		}

		return $this->render('nuevousuario', ['usuarios'=>$usuarios, 'mensaje'=>$mensaje, 'titulo'=>$titulo]);

	}

	public function actionNuevogrupo($id=null) 
	{
		$mensaje=null;
		$grupos = new Grupos();

		if ($grupos->load(Yii::$app->request->post()))
		{
			if ($grupos->validate())
			{
				$gruposdb = new Gruposdb();

				$gruposdb->nombre = $grupos->nombre;
				$gruposdb->enable = true;

				if ($gruposdb->insert())
				{
					$mensaje = "Grupo creado correctamente";

					$grupos->nombre = null;
				}
				else
				{
					$mensaje = "Ha habido un error creando el grupo";
				}
			}
		}

		return $this->render('nuevogrupo', ['grupos'=>$grupos, 'mensaje'=>$mensaje]);

	}

	public function actionUsuarios()
	{
		$mensaje=null;
		$usuariosdb = new Usuariosdb();
		$usuarios = $usuariosdb->find()->all();

		return $this->render('usuarios', ['usuarios'=>$usuarios, 'mensaje'=>$mensaje]);
	}

	public function actionGrupos()
	{
		$mensaje=null;
		$gruposdb = new Gruposdb();
		$grupos = $gruposdb->find()->all();

		return $this->render('grupos', ['grupos'=>$grupos, 'mensaje'=>$mensaje]);
	}

	public function actionUsergroup($usuarios_id=null)
	{
		$mensaje=null;
		$titulo="Asignar grupos a un usuario";
		$usuariosdb = new Usuariosdb();
		if ($usuarios_id == null) {
			$mensaje = "No recibimos un id de usuario";
			return $this->render('usergroup', ['titulo'=>$titulo, 'mensaje'=>$mensaje]);
		} else {
			$usuario=$usuariosdb->find()->where(['id'=>$usuarios_id])->one();
			if (!isset($usuario))
			{
				$mensaje = "No existe usuario con ese ID";
				return $this->render('usergroup', ['titulo'=>$titulo, 'mensaje'=>$mensaje]);
			}

			#$usergroups = $usuario->usergroups;
			$usergroups = array();
			foreach ($usuario->usergroups as $objugroup)
			{
				$usergroups[]=$objugroup->grupos_id;
			}
			$gruposdb = new Gruposdb();
			/*$usergroups = $gruposdb
				->find()
				->where('id = '.$usuario->id)
				->with('users')->all();
			*/
			$grupos = $gruposdb->find()->all();
			#$grupos = $gruposdb->find()->where('usuario_id = '.$usuario->id)->with('gruposdb')->with('Groupusers');
			#$grupos = $gruposdb->

			return $this->render('usergroup', ['usuario'=>$usuario, 'grupos'=>$grupos, 'usergroups'=>$usergroups, 'titulo'=>$titulo, 'mensaje'=>$mensaje]);
		}

	}
}

