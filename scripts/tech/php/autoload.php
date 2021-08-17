<?php

header('Access-Control-Allow-Origin: *'); 

//funcion simple para cargar las clases 
function __autoload($nombreClase){

	//definimos el directorio de las clases  y el sufijo
	$archivo = $_SERVER['DOCUMENT_ROOT']."/app/php/".$nombreClase.".php";

	//limpiamos la cache para asegurarnos de incluir la ultima version de la clase
	clearstatcache();

	//verificamos si existe el archivo y si se puede acceder a él y lo incluimos
	if(file_exists($archivo)){

		//Define la zona horaria exacta para cada pais.
 		date_default_timezone_set('America/Bogota');

 		//la localidad para luego establecer la moneda
		setlocale(LC_ALL, 'es_CO');
		setlocale(LC_MONETARY, 'es_CO');

		require_once $archivo;

	}
}

//funcion para detectar el sistema operativo de donde se loguea el cliente
function fOS()
{ 
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_array =  array(
                    '/windows nt 10/i'      =>  'Windows 10',
                    '/windows nt 6.3/i'     =>  'Windows 8.1',
                    '/windows nt 6.2/i'     =>  'Windows 8',
                    '/windows nt 6.1/i'     =>  'Windows 7',
                    '/windows nt 6.0/i'     =>  'Windows Vista',
                    '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                    '/windows nt 5.1/i'     =>  'Windows XP',
                    '/windows xp/i'         =>  'Windows XP',
                    '/windows nt 5.0/i'     =>  'Windows 2000',
                    '/windows me/i'         =>  'Windows ME',
                    '/win98/i'              =>  'Windows 98',
                    '/win95/i'              =>  'Windows 95',
                    '/win16/i'              =>  'Windows 3.11',
                    '/macintosh|mac os x/i' =>  'Mac OS X',
                    '/mac_powerpc/i'        =>  'Mac OS 9',
                    '/linux/i'              =>  'Linux',
                    '/ubuntu/i'             =>  'Ubuntu',
                    '/iphone/i'             =>  'iPhone',
                    '/ipod/i'               =>  'iPod',
                    '/ipad/i'               =>  'iPad',
                    '/android/i'            =>  'Android',
                    '/blackberry/i'         =>  'BlackBerry',
                    '/webos/i'              =>  'Mobile'
                  );
    //
    $os_platform = "Plataforma desconocida";
    foreach ($os_array as $regex => $value)
    { 
        if (preg_match($regex, $user_agent))
        {
            $os_platform = $value;
        }
    }
    return $os_platform;
}

//funcion para detectar el navegador que usa el cliente
function fNavegador()
{
    $user_agent    = $_SERVER['HTTP_USER_AGENT'];
    $browser_array = array(
                        '/msie/i'       =>  'Internet Explorer',
                        '/firefox/i'    =>  'Firefox',
                        '/safari/i'     =>  'Safari',
                        '/chrome/i'     =>  'Chrome',
                        '/edge/i'       =>  'Edge',
                        '/opera/i'      =>  'Opera',
                        '/netscape/i'   =>  'Netscape',
                        '/maxthon/i'    =>  'Maxthon',
                        '/konqueror/i'  =>  'Konqueror',
                        '/mobile/i'     =>  'Navegador Movil'
                      );
    $browser = "Navegador Desconocido";
    foreach ($browser_array as $regex => $value)
    { 
        if (preg_match($regex, $user_agent))
        {
            $browser = $value;
        }
    }
    return $browser;
}

//funcion para crear log
//insertamos el log
function fCrearLog2($idempresa,$usuario,$idaccion,$descripcion)
{
	$vso        = fOS();
	$vnavegador = fNavegador();
	$ipcliente  = getenv("REMOTE_ADDR");

	//creamos la conexion
	$c = New dbMysql("localhost","solunava_soluweb","_leo88261176","solunava_soluweb");

	$c->consulta("insert into log2 set empresa='".$idempresa."', usuario='".$usuario."', accion='".$idaccion."',descripcion='".$descripcion."', ip_remota='".$ipcliente."', so='".$vso."', navegador='".$vnavegador."'");
}
?>