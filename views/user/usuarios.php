<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo "<h1>Listado de Usuarios</h1>";

if ($mensaje != null) 
{
	echo "<h3>$mensaje</h3>";
}
?>

<table class="table table-bordered">
 <tr>
  <th>ID</th>
  <th>Username</th>
  <th>Password</th>
  <th>Enabled</th>
  <th>Actions</th>
 </tr>

<?php

foreach ($usuarios as $usuario)
{
?>

 <tr>
  <td><?= $usuario->id?></td>
  <td><?= $usuario->username?></td>
  <td><?= $usuario->password?></td>
  <td><?= $usuario->enable?></td>
  <td><?= Html::a('Editar', ['user/nuevousuario', 'id'=>$usuario->id], ['class'=>'btn']) ?></td>
 </tr>

<?php
}
?>

</table>

<?php

echo Html::a('Nuevo Usuario', ['user/nuevousuario'], ['class'=>'btn btn-primary']);
echo Html::a('Grupos', ['user/grupos'], ['class'=>'btn btn-primary']);

/*
$form = ActiveForm::begin(
	[
		"method" => "post",
	]
);

echo Html::submitButton('Nuevo Usuario', ['class'=>'btn']);

$form->end();
 */

