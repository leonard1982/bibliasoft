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

if(isset($_GET['factura']))
{
	$vfactura = $_GET['factura'];
}

$params = array (
			'tokenEmpresa'	=>$TokenEnterprise,
			'tokenPassword'	=>$TokenAutorizacion,
			'documento'		=>$vfactura);

$resultado = $WebService->getEstadoDocumento(WSDL,$options,$params);

$codigo = $resultado["codigo"];
$cufe   = $resultado["cufe"];
$fecha  = $resultado["fechaDocumento"];
$fecha  = substr($fecha,0,10);
$resul  = $resultado["resultado"];
if($resul="Error.")
{
	$resul = "No ha sido enviada esa factura.";
}
$cadena = $resultado["cadenaCodigoQR"];+
$nitfacturador = "";
$nitadquiriente= "";
$valor  = 0;
$urldian = "";
$partes = "";

if(!empty($cadena))
{
	$partes = explode("	",$cadena);
	
	$nitfacturador  = $partes[8];
	$nitfacturador  = str_replace("\r\n","",$nitfacturador);
	$nitfacturador  = substr($nitfacturador,14);
	$nitadquiriente = $partes[16];
	$nitadquiriente = str_replace("\r\n","",$nitadquiriente);
	$nitadquiriente = substr($nitadquiriente,15);
	$valor          = $partes[32];
	$valor          = str_replace("\r\n","",$valor);
	$valor          = substr($valor,18);
	$urldian        = $partes[48];
	$urldian        = substr($urldian,4);
	$urldian        = urlencode($urldian);
}

echo json_encode(array(
	"codigo"=>$codigo,
	"cufe"=>$cufe,
	"fecha"=>$fecha,
	"resultado"=>$resul,
	"nitfacturador"=>$nitfacturador,
	"nitadquiriente"=>$nitadquiriente,
	"totalfactura"=>$valor,
	"urldian"=>$urldian
));
//print_r($resultado);
//echo $resultado["codigo"];
?>