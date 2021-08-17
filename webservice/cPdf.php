<?php
error_reporting(E_ERROR);
require_once "webservice.php";
$WebService = new WebService();
$options = array('exceptions' => true, 'trace' => true);

//Se inicializa  la variable de los parámetros
$params;
$TokenEnterprise   = "5976f83acd3a4422baba73c81190c6bbe6bf2352";
$TokenAutorizacion = "2a25e9acd1ee4a70ae931535dc4e7bfff052a631";
$vfactura          = "F4NN10";
$ver = "SI";

if(isset($_GET['factura']))
{
	$vfactura = $_GET['factura'];
}
if(isset($_GET['ver']))
{
	$ver = $_GET['ver'];
}

$params = array (
		'tokenEmpresa'	=>$TokenEnterprise,
		'tokenPassword'	=>$TokenAutorizacion,
		'documento'		=>$vfactura);

$descargas = $WebService->Descargas(WSDL,$options,$params,'pdf');

//print_r($descargas);

if($descargas["codigo"]==200)
{
	if($ver=="SI")
	{
		$decoded = base64_decode($descargas["documento"]);
		$file = "descargas/".$vfactura.'.pdf';
		file_put_contents($file, $decoded);
		echo "<a id='ver' href='$file' style='display:none;'>Factura: documento $file </a>";
		echo "<script>window.onload = function(){document.getElementById('ver').click();};</script>";
	}
	else
	{
		echo $descargas["documento"];
	}
}
else
{
echo "No se puede descargar!"."<br>";
}
?>