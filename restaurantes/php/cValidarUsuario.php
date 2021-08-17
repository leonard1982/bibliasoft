<?php
//Cargamos las librerias necesarias
//funcion para autocargar las clases
require_once 'autoload.php';

session_start();

//cargamos las clases
require_once 'baseDeDatos.php';

$estado       = 1;//1. parametro no enviado 2. credenciales no validas 3.inicio de sesion
$idvendedor   = "";
$idresolucion = "";
$nomvendedor  = "";
$sesion_iniciada = "NO";
$sesion_id_movil = "";
$ventas_sinresolver = 0;
$vllamarcaja = "NO";


if(isset($_POST["usuario"])){
	
	$usuario  = $_POST["usuario"];
	$password = $_POST["password"];
	$razonsoc = "";
	$empresa  = $_POST["empresa"];
	
	//si hay conexion a la base de datos facilweb para traer la lista de empresas
	$conexion = new dbMysql("localhost","root",".facilweb2020",$empresa,3311);

	//validamos el usuario y tomamos la configuracion
	$vsql = "select  
			 nombre,
			 tercero,
			 resolucion,
			 idusuarios,
			 (select razonsoc from datosemp  order by iddatos desc limit 1) as nombreempresa,
			 (select t.nombres from terceros t where t.idtercero=tercero) as nomvendedor,
			 (select modificainvpedido from configuraciones where idconfiguraciones='1') as modificainvpedido,
			 (select caja_movil from configuraciones where idconfiguraciones='1') as llamarcaja,
			 (select if(nombre_pc is not null and nombre_pc <> '' and nombre_impre is not null and nombre_impre <> '',concat('//',nombre_pc,'/',nombre_impre),'') from configuraciones where idconfiguraciones='1') as impresorapos,
		 (select if(d.nombre_pc is not null and d.nombre_pc <> '' and d.nombre_impre is not null and d.nombre_impre <> '',concat('//',d.nombre_pc,'/',d.nombre_impre),'') from resdian d where d.Idres=resolucion) as impresorapospj,
		 if(nombre_pc is not null and nombre_pc <> '' and nombre_impre is not null and nombre_impre <> '',concat('//',nombre_pc,'/',nombre_impre),'') as impresoraposusuario,
		 	 (select razonsoc from datosemp where iddatos='1') as razonsoc,
			 (select concat(nit,'-',dv) from datosemp where iddatos='1') as nit,
			 (select direccion from datosemp where iddatos='1') as direccion,
			 (select telefono from datosemp where iddatos='1') as telefono,
			 (select if(regimen=0,'Regimen Simplificado','Regimen Comun') from datosemp where iddatos='1') as regimen,
			 (select naturaleza from datosemp where iddatos='1') as naturaleza,
			 acceso_inventario,
			 acceso_gerencial,
			 acceso_restaurante,
			 sesion_id_movil,
			 banco_movil
			 from 
			 usuarios 
			 where 
				 usuario='".$usuario."' 
			 and password='".$password."'";

	//ejecutamos la consulta
	if($consulta = $conexion->consulta($vsql))
	{
		if($r = mysqli_fetch_array($consulta))
		{
			//variables globales disponibles en la ejecucion del programa
			//nombre del usuario
			$_SESSION["gnombreusuario"]   = $r[0];
			//id del tercero relacionado al usuario
			$idvendedor        = $r[1];
			$_SESSION["gidvendedor"]      = $idvendedor;
			//id de la resoluciones asignada al usuario
			$idresolucion      = $r[2];
			//usuario logueado
			$_SESSION["gusuariologueado"] = $usuario;
			$estado            = 3;
			$razonsoc          = $r[4];
			$nomvendedor       = $r[5];
			$_SESSION["gModificarInventario"] = $r[6];
			$_SESSION["gllamarcaja"]      = $r[7];
			$vllamarcaja = $r[7];
			
			//impresora pos de configuraciones
			$_SESSION["gimpresorapos"]    = $r[8];

			//si el usuario tiene resolucion y la resolucion tiene impresora la sobreescribimos
			if(!empty($r[9]))
			{
				$_SESSION["gimpresorapos"] = $r[9];
			}
			//si el usuario tiene directamente impresora asignada la sobre escribimos la variable global
			if(!empty($r[10]))
			{
				$_SESSION["gimpresorapos"] = $r[10];
			}
			
			//tomamos los datos de la empresa para la factura pos
			$_SESSION["grazonsoc"]  = $r[11];
			$_SESSION["gnit"]        = $r[12];
			$_SESSION["gdireccion"]  = $r[13];
			$_SESSION["gtelefono"]   = $r[14];
			$_SESSION["gregimen"]    = $r[15];
			$_SESSION["gnaturaleza"] = $r[16];
			$_SESSION["gacceso_inventario"]  = $r[17];
			$_SESSION["gacceso_gerencial"]   = $r[18];
			$_SESSION["gacceso_restaurante"] = $r[19];
			$sesion_id_movil      = $r[20];
			$_SESSION["gbanco_movil"]		  = $r[21];
			
			//revisamos si hay pedidos no asentados de dias anteriores para impedir el ingreso ya que pueden afectar los reportes
			//by LN 01-05-19 EN BETA  *********************
			if($consulta2 = $conexion->consulta("select count(*) from pedidos where vendedor='".$idvendedor."' and asentada='0' and fechaven<CURDATE()"))
			{
				if($r2 = mysqli_fetch_array($consulta2))
				{
					$ventas_sinresolver = $r2[0];
				}
			}
			//**********************************************
			
			//iniciamos sesion
			$vtmpsesion2  = session_id();
			
			//evaluamos si la sesion es distinta, si es distinta mandamos un mensaje para confirmar si debe cerrar la sesion anterior
			if(!empty($sesion_id_movil))
			{
				if($vtmpsesion2!=$sesion_id_movil)
				{
					$sesion_iniciada = "SI";
				}
				else
				{

					//guardamos la sesion en la base de datos para control de sesion doble
					$vguardarsesion = "update usuarios set sesion_id_movil='".$vtmpsesion2."' where usuario='".$usuario."' and password='".$password."'";
					$conexion->consulta($vguardarsesion);

					//marcamos en el log el inicio de sesion
					$conexion->consulta("insert into log set usuario='".$idvendedor."',accion='INGRESAR',observaciones='MOVIL'");
				}
			}
			else
			{
				//guardamos la sesion en la base de datos para control de sesion doble
				$vguardarsesion = "update usuarios set sesion_id_movil='".$vtmpsesion2."' where usuario='".$usuario."' and password='".$password."'";
				$conexion->consulta($vguardarsesion);

				//marcamos en el log el inicio de sesion
				$conexion->consulta("insert into log set usuario='".$idvendedor."',accion='INGRESAR',observaciones='MOVIL'");
			}
		}
		else
		{
			$estado = 2;
		}
	}		
}

echo json_encode
(
	array(
		
		"estado"        => $estado,
		"razonsoc"      => $razonsoc,
		"idvendedor"    => $idvendedor,
		"idresolucion"  => $idresolucion,
		"nomvendedor"   => $nomvendedor,
		"llamarcaja"    => $vllamarcaja,
		"sesioniniciada"=>$sesion_iniciada,
		"ventas_sinresolver"=> $ventas_sinresolver
	)
);
?>