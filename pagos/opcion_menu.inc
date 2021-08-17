<?php
include ("../clases/class.usuarios.php");

$usuarios = new usuarios();

if (isset($_GET["idfuncion"])) $_SESSION["idfuncion"]=$_GET["idfuncion"];

$rspermisos=$usuarios->permisos_usuario_por_funcion($_SESSION['idusuario'], $_SESSION["idfuncion"]);
$permisos=$rspermisos[0];
?>

