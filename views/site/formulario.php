<?php

use yii\helpers\Url;
use yii\helpers\Html;


echo "<h1>Formulario</h1>";

if ($mensaje != null) 
{
	echo "<h3>$mensaje</h3>";
}

echo Html::beginForm(
	Url::toRoute("site/procesar_form"),
	"post",
	[]
);

echo "<div>" . Html::label("Introduce tu nombre", "nombre") . Html::textInput("nombre", null, []). "</div>";

echo Html::submitInput("Enviar datos", null, []);

echo Html::endForm();

