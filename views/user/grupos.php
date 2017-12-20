<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo "<h1>Listado de Grupos</h1>";

if ($mensaje != null) 
{
	echo "<h3>$mensaje</h3>";
}

?>

<table class="table table-bordered">

 <tr>
  <th>ID</th>
  <th>Grupo</th>
  <th>Enabled</th>
  <th>Actions</th>
 </tr>

<?php
foreach ($grupos as $grupo)
{
?>
 <tr>
  <td><?=$grupo->id?></td>
  <td><?=$grupo->nombre?></td>
  <td><?=$grupo->enable?></td>
  <td><?= Html::a('Editar', ['user/nuevogrupo', 'id'=>$grupo->id], ['class'=>'btn']) ?></td>
 </tr>
<?php
}
?>
</table>

<?php

echo Html::a('Nuevo Grupo', ['user/nuevogrupo'], ['class'=>'btn btn-primary']);
echo Html::a('Usuarios', ['user/usuarios'], ['class'=>'btn btn-primary']);

/*
$form = ActiveForm::begin(
	[
		"method" => "post",
	]
);

echo Html::submitButton('Nuevo Usuario', ['class'=>'btn']);

$form->end();
 */

