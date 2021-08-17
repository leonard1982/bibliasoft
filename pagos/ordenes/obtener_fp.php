<?php
include_once ("../clases/class.formapago.php");
include_once ("../funciones/fechas.php");

$formapago = new formapago();

$valorfp = $_POST["valorfp"];
$fechafp = $_POST["fechainivto"];

$selfp=$formapago->select($valorfp);
$dias=$selfp[2];

$fechatrabajo = explota($fechafp);
$di = "+".$dias." days";
$nuevafecha = strtotime ( $di , strtotime ( $fechatrabajo ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

$fechafp=implota($nuevafecha);
echo "<script>";
echo "parent.document.getElementById('diasvto').value=".$dias.";";
echo "parent.document.getElementById('fechavto').value='".$fechafp."';";
echo "</script>";
?>
