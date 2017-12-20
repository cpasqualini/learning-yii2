<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Hello Dolly';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-hello">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2><?= $saluda ?></h2>
<?php
for ($i=0;$i<sizeof($numeros);$i++) {
	echo "<div>numero: {$numeros[$i]}</div>";
}

echo "<div>get: $get</div>";

echo "<pre>";
print_r($_GET);
print_r($_POST);
echo "</pre>";

?>
</div>
