<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo "<h1>{$titulo}</h1>";

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

if ($usuarios->id != null){
	echo $form->field($usuarios, "id")->input("text");
}
echo $form->field($usuarios, "username")->input("text");
echo $form->field($usuarios, "password")->input("password");

echo Html::submitButton('Enviar datos', ['class'=>'btn btn-primary']);
echo Html::a('Volver al listado', ['user/usuarios'], ['class'=>'btn']);

$form->end();

