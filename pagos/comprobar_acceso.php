<?php
include_once("./clases/class.autenticar.php");

$autenticar = new autenticar();

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

$valor = $autenticar->autenticacion($usuario,md5($clave));

if (empty($valor[0])) {
   echo "{estado:0, tx:'No puedes entrar'}";
} else{
   echo "{estado:1}";
}

?>
