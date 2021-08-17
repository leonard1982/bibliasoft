<?php
// Desactivar toda notificación de error
error_reporting(1);
		
ini_set("memory_limit","2048M");    //Limite 2GB
set_time_limit(0);                  //Tiempo de transferencia ilimitada 
ob_start();

//Simple funcion para acceder
  function getUrl($url, $method='', $vars='') 
  {
		$ch = curl_init();
		if ($method == 'post') 
		{
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $vars);
		}

		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
		curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
		curl_setopt ($ch, CURLOPT_MAXREDIRS, 10);
		curl_setopt ($ch, CURLOPT_TIMEOUT, 0);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0);
		curl_setopt ($ch, CURLOPT_FAILONERROR, true);
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
		$buffer = curl_exec($ch);
		curl_close ($ch);

		return $buffer;
  } 
		  
//Definimos las variables de la pagina
$usuario    = '88261176'; 
$password    = 'Leonardo176*';
$url   = 'https://plataforma.facturatech.co/login/';
$loginCampos = "usuario=".$usuario."&password=".$password;

//Ahora se ha iniciado la sesion y la sesion de la cookie ha sido generada
$vr = getUrl($url, 'post', $loginCampos);
$vr = str_replace('id="usuario" value','id="usuario" value='.$usuario.' ',$vr);
$vr = str_replace('id="password" value','id="password" value='.$password.' ',$vr);
$vr = str_replace('action="./"','action="https://plataforma.facturatech.co/login/" ',$vr);
$vr = str_replace('name="login"','name="login" id="login" ',$vr);
$vr = str_replace('</header>',' <script>window.onload = function(){ setTimeout(function(){document.getElementById("login").click();},2000);}</script></header> ',$vr);
echo $vr;

//cargamos el texto de busqueda
$buscar = urlencode('');
//Cargamos la pagina que queremos ver
$navegando = getUrl("https://plataforma.facturatech.co/comprobantes21/?se=15");
echo $navegando;

//$DOM = new DOMDocument('1.0', 'UTF-8');
//$DOM->loadHTML($navegando);

//echo $DOM->textContent;

/*
$td = $DOM->getElementsByTagName('span');
 

foreach ($td as $data) {
	$datos = $data->nodeValue;
	if($filtrado = strrpos($datos,'Existencia')){
		
		$info = $data->nodeValue;
	}
}
*/
?>