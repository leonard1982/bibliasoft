<?php
include_once "baseDeDatos.php";

$vcel   = "";
$vemail = "";
$vrazon = "";
$vactiva= "NO";
$vserial= "";

if(isset($_GET["nit"]))
{
	$c = New dbMysql("172.107.178.132","phpmyadmin","//Nueva2020..","facilweb",3306);
	$vnit = $_GET["nit"];
	$vsql = "select celular,correo,razon_social,activa,serial from clientes where ccnit='".$vnit."'";
	$vco  = $c->consulta($vsql);
	if($vr = mysqli_fetch_array($vco))
	{
		$vcel   = $vr[0];
		$vemail = $vr[1];
		$vrazon = $vr[2];
		$vactiva= $vr[3];
		$vserial= $vr[4];
	}
}

echo json_encode(array("celular"=>$vcel,"email"=>$vemail,"razon"=>$vrazon,"activa"=>$vactiva,"serial"=>$vserial));
?>