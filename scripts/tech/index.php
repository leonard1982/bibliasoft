<?php
if(isset($_GET['empresa']) and isset($_GET['id']))
{
	if(!empty($_GET['empresa']) and $_GET['id']>0)
	{
		date_default_timezone_set('America/Bogota');
		setlocale(LC_ALL, 'es_CO');
		setlocale(LC_MONETARY, 'es_CO');
			
		$vempresa = $_GET['empresa'];
		$vid      = $_GET['id'];

		//traemos las librerias
		include_once 'php/baseDeDatos.php';
		include_once 'php/webservice_factura_tech.php';
		$conexion = new dbMysql("127.0.0.1","root",",.Facilweb2020",$vempresa,3311);
		
		//datos de conexion
		$vusuario_ws  = '';
		$vpassword_ws = '';
		$vservidor_ws = '';

		//datos de conexion
		$vsql = "select proveedor, servidor1, tokenempresa as usuario, tokenpassword from webservicefe order by idwebservicefe ASC limit 1";
		$c2 = $conexion->consulta($vsql);
		if($r2 = mysqli_fetch_array($c2))
		{
			if ($r2[0]=='CADENA S. A.')
			{
				$vusuario_ws  = $r2[2];
				$vpassword_ws = $r2[3];
				$vservidor_ws = $r2[1];
			}
			else
			{
				echo "DATOS DE PROVEEDOR TECNOLÓGICO ERRADOS!!!";
				goto error;
			}
		}
		
		//Configuracion de soap
		$cliente = new \SoapClient($vservidor_ws);
		$cliente->soap_defencoding = 'utf-8';
		
		$vsql = "select f.resolucion, r.prefijo, r.primerfactura, r.prefijo_fe, r.pref_factura from facturaven f LEFT JOIN resdian r ON r.Idres=f.resolucion where idfacven='".$vid."'";
		$c3 = $conexion->consulta($vsql);
		if($r3 = mysqli_fetch_array($c3))
		{
			$prefijo = $r3[1];
		}
		else
		{
			echo "FACTURA NO PROCESADA!";
			goto error;
		}
		
		$vsql = "select * from facturaven where idfacven='".$vid."'";
		$c4 = $conexion->consulta($vsql);
		if($r4 = mysqli_fetch_array($c4))
		{
			$folio   = $r4[1];
		}
		else
		{
			echo "FACTURA NO PROCESADA!";
			goto error;
		}

		$paramsQrCU = array(
				  "username" => $vusuario_ws,
				  "password" => $vpassword_ws,
				  "prefijo" => $prefijo,
				  "folio"	=> $folio
			);

		$vfech = "";

		$vsql = "SELECT id_trans_fe, coalesce(fecha_validacion,0) FROM facturaven WHERE idfacven = '".$vid."'";
		$c5 = $conexion->consulta($vsql);
		if($r5 = mysqli_fetch_array($c5))
		{
			$paramsSt = array(
				  "username" => $vusuario_ws,
				  "password" => $vpassword_ws,
				  "transaccionID" => $r5[0]
			);
			
			$vfech = $r5[1];

			function fConsultarEstado($paramsSt,$paramsQrCU,$cliente,$vfech,$vid,$conexion)
			{
				try
				{
					if($response = $cliente->__soapCall("FtechAction.documentStatusFile", $paramsSt))
					{

						if(!empty($response->error))
						{
							// respuesta
							//var_dump($response);
							//echo "Espere por favor...<br>";
							
							//callback
							sleep(5);
							fConsultarEstado($paramsSt,$paramsQrCU,$cliente,$vfech,$vid,$conexion);
						}
						else
						{
							//echo "</br></br>",$response->success;
							if($vfech==0)
							{
								$lafval = date("Y-m-d H:i:s");
								$vsql = "update facturaven set estado=200, fecha_validacion = '".$lafval."' where idfacven='".$vid."'";
								$conexion->consulta($vsql);
							}
							else
							{
								$vsql = "update facturaven set estado=200 where idfacven='".$vid."'";
								$conexion->consulta($vsql);
							}
							$vEstado = $response->success;
							//echo $response->transaccionID;

							if($response = $cliente->__soapCall("FtechAction.getCUFEFile", $paramsQrCU))
							{

								if(!empty($response->error))
								{
									// respuesta
									//var_dump($response);
									//echo "Espere por favor......<br>";
									
									//callback
									sleep(5);
									fConsultarEstado($paramsSt,$paramsQrCU,$cliente,$vfech,$vid,$conexion);
								}
								else
								{
									//echo "</br>",$response->success;
									//</br>El cufe: </br>",$response->resourceData;
									$vCufe = $response->resourceData;
									$vsql = "update facturaven set cufe='".$vCufe."' where idfacven='".$vid."'";
									$conexion->consulta($vsql);

									if($response = $cliente->__soapCall("FtechAction.getQRFile", $paramsQrCU))
									{

										if(!empty($response->error))
										{
											// respuesta
											//var_dump($response);

											//echo "Espere por favor.........<br>";
											
											//callback
											sleep(5);
											fConsultarEstado($paramsSt,$paramsQrCU,$cliente,$vfech,$vid,$conexion);

										}
										else
										{
											//echo "</br>",$response->success;
											//echo "</br>",$response->resourceData;
											$vQr = $response->resourceData;
											$Qr = base64_encode($vQr);
											$vsql = "update facturaven set qr_base64='".$vQr."' where idfacven='".$vid."'";
											$conexion->consulta($vsql);

											if($response = $cliente->__soapCall("FtechAction.downloadXMLFile", $paramsQrCU))
											{

												if(!empty($response->error))
												{
													// respuesta
													//var_dump($response);
													//echo "</br>No se ha consumido el recurso, No se puede descargar XML, esperar un momento.";
													//callback
													sleep(5);
													fConsultarEstado($paramsSt,$paramsQrCU,$cliente,$vfech,$conexion);
												}
												else
												{
													//echo "</br></br>",$response->success;
													//echo "</br>El XML</br>",$response->resourceData;
													echo "1";
												}
											}
										}
									}//FIN  QR

								}
							}//FIN CUFE
						}
					}
				}
				catch (Exception $e)
				{
					//echo 'Hay problemas de conexión con la DIAN: ',  $e->getMessage(), "\n";
					echo "0";
				}
			}
			
			fConsultarEstado($paramsSt,$paramsQrCU,$cliente,$vfech,$vid,$conexion);

		}
		else
		{
			//echo "FACTURA NO ENVIADA!";
			echo "2";
		}
	}
}

error:;
?>