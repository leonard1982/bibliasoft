<?php
include_once("../clases/class.usuarios.php");

$usuarios = new usuarios();

$login=$_POST['Alogin'];

$valor=$usuarios->login_duplicado($login);

if (empty($valor[0])) {
   echo "{estado:1, tx:'Login disponible'}";
} else{
    echo "{estado:0, tx:'ERROR: Login existente'}";
} 
?>