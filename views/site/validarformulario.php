<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo "<h1>Validar Formulario</h1>";

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


echo $form->field($model, "nombre")->input("text");
echo $form->field($model, "email")->input("email");

echo Html::submitButton('Enviar datos', ['class'=>'btn btn-primary']);

$form->end();

