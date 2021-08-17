<?php
//Cargamos las librerias necesarias
//funcion para autocargar las clases
require_once 'autoload.php';

//cargamos las clases
require_once 'baseDeDatos.php';

//si hay conexion a la base de datos facilweb para traer la lista de empresas
$conexion = new dbMysql("localhost","root",".facilweb2020","facilweb",3311);

if(isset($_GET["sql"]))
{
	
	$sql = $_GET["sql"];
	
	sc_lookup(vImagen,$sql);
	
	if(isset({vImagen[0][0]}))
	{
		
		$imagen = {vImagen[0][0]};
		
		header("Content-type: image/png");
		echo $imagen;
	}
}
?>