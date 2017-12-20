<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo "<h1>Nuevo Grupo</h1>";

if ($mensaje != null) 
{
	echo "<h3>$mensaje</h3>";
}

$form = ActiveForm::begin(
	[
		"method" => "post",
		"enableClientValidation" => true,
	]
);


echo $form->field($grupos, "nombre")->input("text");

echo Html::submitButton('Enviar datos', ['class'=>'btn btn-primary']);
echo Html::a('Volver al listado', ['user/grupos'], ['class'=>'btn']);

$form->end();

