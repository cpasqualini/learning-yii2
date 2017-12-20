<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

echo "<h1>{$titulo}</h1>";

if ($mensaje!=null) {
	echo "<h3>{$mensaje}</h3>";
}

if (isset($usuario))
{
	echo "<div class='body-content'>";
	echo "<h3>Usuario: {$usuario->username}</h3>";

	#	echo Html::activeDropDownList($usergroups, 'id', ArrayHelper::map($grupos, 'id', 'nombre'));
	echo "<div class='row'>";
	echo "<div class='col-lg-4'>";
	echo "<h4>Grupos asignados al usuario</h4>";

	echo "<select id='usergroups' multiple size=4 style='width: 100%'>";
	foreach ($usergroups as $usergroup){
		echo "<option value='{$usergroup}'>{$usergroup}</option>";
	}
	echo "</select>";

		echo "<hr><pre>";
		print_r($usergroups);
		echo "</pre><hr>";

	echo "</div>";

	echo "<div class='col-lg-4'>";
	#echo "<div>" . Html::submitButton('Agregar', "['class'=>'btn btn-primary']") . "</div>";
	#echo "<div>" . Html::submitButton('Quitar', "['class'=>'btn btn-primary']") . "</div>";
	echo "<p>" . Html::submitButton('>>', ['class'=>'btn btn-primary']) . "</p>";
	echo "<p>" . Html::submitButton('<<', ['class'=>'btn btn-primary']) . "</p>";
	echo "</div>";

	echo "<div class='col-lg-4'>";
	echo "<h4>Grupos creados</h4>";

	echo "<select id='groups' multiple size=4 style='width: 100%'>";
	foreach ($grupos as $grupo)
	{
		#echo "<div><span>{$grupo->id}</span> <label>{$grupo->nombre}</label></div>";
		echo "<option value='{$grupo->id}'>{$grupo->nombre}</option>";
	}
	echo "</select>";

		echo "<hr><pre>";
		print_r($grupos);
		echo "</pre><hr>";
	echo "</div>";

	echo "</div></div>";
}
