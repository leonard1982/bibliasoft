<?php
include_once 'baseDeDatos.php';
date_default_timezone_set('America/Bogota');
setlocale(LC_ALL, 'es_CO');
setlocale(LC_MONETARY, 'es_CO');

$vidfacven = '';
$vbd       = '';
if(isset($_POST['idfacven']))
{
	$vidfacven = $_POST['idfacven'];
}

if(isset($_POST['bd']))
{
	$vbd = $_POST['bd'];
}

$cx = new dbMysql("127.0.0.1","root",".facilweb2020",$vbd,3311);

$vservidor='';
$vtoken  = '';
$vtestid = '';
$vmodo   = '';
$vmensaje= '';

$vmetodopago='75';

$vfecha  = '';
$vnumero = '';
$vresolucion = '';
$vhora   = '';
$vprefijo= '';
$vccnit  = '';
$vdv     = '';
$vnombre = '';
$vcelular= '';
$vdireccion='';
$vregimen= '';
$vtipodoc= '';
$vtipopersona='';
$vciudad = '';
$vformapago='';
$vvencimiento='';
$vdiascredito='';
$vtotal ='';
$vcorreo = '';
$vobservaciones = '';
$vtexto_encabezado = '';
$vtexto_pie_pagina = '';

function fDigito($vdoc)
{
	$long=strlen($vdoc);
	$str=$vdoc;
	$arr = str_split($str);//convierte en array la cadena
	switch ($long)
	{
	case 4:
	$valor=$arr[3]*3+$arr[2]*7+$arr[1]*13+$arr[0]*17;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 5:
	$valor=$arr[0]*19+$arr[1]*17+$arr[2]*13+$arr[3]*7+$arr[4]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 6:
	$valor=$arr[0]*23+$arr[1]*19+$arr[2]*17+$arr[3]*13+$arr[4]*7+$arr[5]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 7:
	$valor=$arr[0]*29+$arr[1]*23+$arr[2]*19+$arr[3]*17+$arr[4]*13+$arr[5]*7+$arr[6]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 8:
	$valor=$arr[0]*37+$arr[1]*29+$arr[2]*23+$arr[3]*19+$arr[4]*17+$arr[5]*13+$arr[6]*7+$arr[7]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 9:
	$valor=$arr[0]*41+$arr[1]*37+$arr[2]*29+$arr[3]*23+$arr[4]*19+$arr[5]*17+$arr[6]*13+$arr[7]*7+$arr[8]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 10:
	$valor=$arr[0]*43+$arr[1]*41+$arr[2]*37+$arr[3]*29+$arr[4]*23+$arr[5]*19+$arr[6]*17+$arr[7]*13+$arr[8]*7+$arr[9]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;
	}
}

//consultamos el webservice y el token
$vsql = "select servidor1, servidor2, tokenempresa, tokenpassword, modo from webservicefe order by idwebservicefe desc limit 1";
$cc = $cx->consulta($vsql);
if($r1 = mysqli_fetch_array($cc))
{
	if(!empty($r1[0]) and !empty($r1[1]) and !empty($r1[2]) and !empty($r1[3]) )
	{
		$vservidor = $r1[0];
		$vtoken    = $r1[2];
		$vmodo     = $r1[4];
		
		if($vmodo=='DESARROLLO')
		{
			$vtestid   = $r1[3];
		}
	}
}

if(empty($vservidor) or empty($vtoken))
{
	$vmensaje .= "No hay datos de conexión.";
}
else
{
	//encabezado de la factura
	$vsql = "select f.fechaven,f.numfacven,r.resolucion,TIME(f.creado) as hora,r.prefijo,t.documento,t.dv,t.nombres,t.tel_cel,t.direccion,if(t.regimen='SIM','2','1') as regimen,if(t.tipo_documento='13','3','6') as tipodoc,if(t.tipo='NAT','1','2') as tipopersona,'' as ciudad, if(f.credito='1','2','1') as formapago,coalesce(f.fechavenc,f.fechaven),coalesce(TIMESTAMPDIFF(DAY, f.fechaven, f.fechavenc),1) AS dias_credito,f.total,t.urlmail,(dr.direc) as direccion2,(select ml.id from municipalities ml where ml.code=(select concat(m.codigo_dep,m.codigo_mu) from municipio m where m.idmun=t.idmuni limit 1) limit 1) as codigomu, f.observaciones,r.texto_encabezado, r.texto_pie_pagina from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero left join direccion dr on dr.iddireccion=f.dircliente  where f.idfacven='".$vidfacven."'";
	$cc2 = $cx->consulta($vsql);
	if($r2 = mysqli_fetch_array($cc2))
	{
		$vfecha  = $r2[0];
		$vnumero = $r2[1];
		$vresolucion = $r2[2];
		$vhora   = $r2[3];
		$vprefijo= $r2[4];
		$vccnit  = $r2[5];
		$vdv     = fDigito($vccnit);//{vMaster[0][6]};
		$vnombre = $r2[7];
		$vcelular= $r2[8];
		$vdireccion= $r2[9];
		$vregimen= $r2[10];
		$vtipodoc= $r2[11];
		$vtipopersona= $r2[12];
		$vformapago = $r2[14];
		$vvencimiento= $r2[15];
		$vdiascredito= $r2[16];
		$vtotal = $r2[17];
		$vcorreo = $r2[18];
		$vdireccion= $r2[19];
		$vciudad = $r2[20];
		if($r2[21]!="TEMPORAL" and !empty($r2[21]))
		{
			$vobservaciones = trim($r2[21]);
		}
		
		$vtexto_encabezado = $r2[22];
		$vtexto_pie_pagina = $r2[23];
	}
	
	$curl = curl_init();
	$vurl = $vservidor;
	if($vmodo=='DESARROLLO')
	{
		$vurl = $vservidor.'/'.$vtestid;
	}
	
	//$vdatos = Array();
	$vdatos["number"] =  $vnumero;
	$vdatos["type_document_id"] =  1;
	$vdatos["date"] =  $vfecha;
	$vdatos["time"] =  $vhora;
	$vdatos["resolution_number"] =  $vresolucion;
	$vdatos["prefix"] =  $vprefijo;
	$vdatos["notes"] =  $vobservaciones;
	$vdatos["sendmail"] =  true;
	
	if(!empty($vtexto_encabezado))
	{
		$vdatos["head_note"] =  $vtexto_encabezado;
	}
	
	if(!empty($vtexto_pie_pagina))
	{
		$vdatos["foot_note"] =  $vtexto_pie_pagina;
	}
	
	//$vdatos["customer"] = Array();
	$vdatos["customer"]["identification_number"] =  $vccnit;
	$vdatos["customer"]["dv"] =  $vdv;
	$vdatos["customer"]["name"] =  $vnombre;
	$vdatos["customer"]["phone"] =  trim($vcelular);
	$vdatos["customer"]["address"] =  $vdireccion;
	$vdatos["customer"]["email"] =  trim($vcorreo);
	$vdatos["customer"]["merchant_registration"] =  "0000000-00";
	$vdatos["customer"]["type_document_identification_id"] =  $vtipodoc;
	$vdatos["customer"]["type_organization_id"] =  $vtipopersona;
	$vdatos["customer"]["municipality_id"] =  $vciudad;
	$vdatos["customer"]["type_regime_id"] =  $vregimen;
	
	$vdatos["payment_form"]["payment_form_id"] =  $vformapago;
	$vdatos["payment_form"]["payment_method_id"] =  $vmetodopago;
	$vdatos["payment_form"]["payment_due_date"] =  $vvencimiento;
	$vdatos["payment_form"]["duration_measure"] =  $vdiascredito;
	
	$vdatos["allowance_charges"][0]["discount_id"] =  1;
	$vdatos["allowance_charges"][0]["charge_indicator"] =  false;
	$vdatos["allowance_charges"][0]["allowance_charge_reason"] =  "DESCUENTO GENERAL";
	$vdatos["allowance_charges"][0]["amount"] =  "0.00";
	$vdatos["allowance_charges"][0]["base_amount"] =  $vtotal;
	
	$vdatos["legal_monetary_totals"]["line_extension_amount"] =  $vtotal;
	$vdatos["legal_monetary_totals"]["tax_exclusive_amount"] =  "0.00";
	$vdatos["legal_monetary_totals"]["tax_inclusive_amount"] =  $vtotal;
	$vdatos["legal_monetary_totals"]["allowance_total_amount"] =  "0.00";
	$vdatos["legal_monetary_totals"]["charge_total_amount"] =  "0.00";
	$vdatos["legal_monetary_totals"]["payable_amount"] =  $vtotal;
	
	
	//detalle
	
	/*
	$vdatos = '{"number": '.$vnumero.',"type_document_id": 1,"date": "'.$vfecha.'","time": "'.$vhora.'","resolution_number": "'.$vresolucion.'","prefix": "'.$vprefijo.'",
		"notes": "'.$vobservaciones.'",
		"sendmail": true,
		"customer": {
			"identification_number": '.$vccnit.',
			"dv": '.$vdv.',
			"name": "'.$vnombre.'",
			"phone": '.$vcelular.',
			"address": "'.$vdireccion.'",
			"email": "'.$vcorreo.'",
			"merchant_registration": "0000000-00",
			"type_document_identification_id": '.$vtipodoc.',
			"type_organization_id": '.$vtipopersona.',
			"municipality_id": '.$vciudad.',
			"type_regime_id": '.$vregimen.'
		},
		"payment_form": {
			"payment_form_id": '.$vformapago.',
			"payment_method_id": '.$vmetodopago.',
			"payment_due_date": "'.$vvencimiento.'",
			"duration_measure": "'.$vdiascredito.'"
		},	
		"allowance_charges": [
			{
				"discount_id": 1,
				"charge_indicator": false,
				"allowance_charge_reason": "DESCUENTO GENERAL",
				"amount": "0.00",
				"base_amount": "'.$vtotal.'"
			}
		],
		"legal_monetary_totals": {
			"line_extension_amount": "'.$vtotal.'",
			"tax_exclusive_amount": "0.00",
			"tax_inclusive_amount": "'.$vtotal.'",
			"allowance_total_amount": "0.00",
			"charge_total_amount": "0.00",
			"payable_amount": "'.$vtotal.'"
		},
		"invoice_lines":[';
	*/
		
	$vdescripcion = '';
	$vporciva = '';
	$vcanlista= '0';
	$vpreciou = '0';
	$vprecioiva = '0';
	$vparcvta = '0';
	$vnota = '';
	$vbodega = '';
	$vunidad  = '70';
	$vcodigo = '';
	
	//$vdatos["invoice_lines"] = Array();
	$vsql = "select 
	m.nompro,d.adicional,d.cantidad,d.valorunit,d.iva,d.valorpar,d.obs,b.bodega,m.codigoprod
	from facturaven k inner join detalleventa d on d.numfac=k.idfacven inner join productos m on d.idpro=m.idprod inner join bodegas b on d.idbod=b.idbodega where k.idfacven='".$vidfacven."'";
	$cc3 = $cx->consulta($vsql);
	$contador = 0;
	while ($r3 = mysqli_fetch_array($cc3))
	{
		$vdescripcion = $r3[0];
		$vporciva     = $r3[1];
		$vcanlista    = intval($r3[2]);
		//$vpreciou     = $r3[3];
		$vprecioiva   = $r3[4];
		$vparcvta     = $r3[5];
		$vnota        = $r3[6];
		if(!empty($vnota))
		{
			$vdescripcion .= ' - '.$vnota;
		}
		$vbodega      = $r3[7];
		$vcodigo      = $r3[8];
		$vpreciou     = $vparcvta/$vcanlista;
		
		$vdatos["invoice_lines"][$contador]["unit_measure_id"] = $vunidad;
		$vdatos["invoice_lines"][$contador]["invoiced_quantity"] = $vcanlista;
		$vdatos["invoice_lines"][$contador]["line_extension_amount"] = $vparcvta;
		$vdatos["invoice_lines"][$contador]["free_of_charge_indicator"] = false;
		
		//$vdatos["invoice_lines"][$contador]["allowance_charges"] = Array();
		$vdatos["invoice_lines"][$contador]["allowance_charges"][0]["charge_indicator"] =  false;
		$vdatos["invoice_lines"][$contador]["allowance_charges"][0]["allowance_charge_reason"] =  "DESCUENTO GENERAL";
		$vdatos["invoice_lines"][$contador]["allowance_charges"][0]["amount"] =  "0.00";
		$vdatos["invoice_lines"][$contador]["allowance_charges"][0]["base_amount"] =  $vparcvta;
		
		
		$vdatos["invoice_lines"][$contador]["description"] = $vdescripcion;
		$vdatos["invoice_lines"][$contador]["code"] = $vcodigo;
		$vdatos["invoice_lines"][$contador]["type_item_identification_id"] = 4;
		$vdatos["invoice_lines"][$contador]["price_amount"] = $vpreciou;
		$vdatos["invoice_lines"][$contador]["base_quantity"] = $vcanlista;

		/*
		$vdatos .= '{
					"unit_measure_id": '.$vunidad.',
					"invoiced_quantity": "'.$vcanlista.'",
					"line_extension_amount": "'.$vparcvta.'",
					"free_of_charge_indicator": false,
					"allowance_charges": [{
							"charge_indicator": false,
							"allowance_charge_reason": "DESCUENTO GENERAL",
							"amount": "0.00",
							"base_amount": "'.$vparcvta.'"
						}
					],
					"description": "'.$vdescripcion.'",
					"code": "'.$vcodigo.'",
					"type_item_identification_id": 4,
					"price_amount": "'.$vpreciou.'",
					"base_quantity": "'.$vcanlista.'"
				}';
		*/		
		
		$contador++;
	}
	
	//$vdatos .=']}';
	
	//$vdatos = json_decode($vdatos);
	$vdatos = json_encode($vdatos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);	
	
	//echo $vdatos;
	
	//print_r($response);
	$vdconexion = array(
	  CURLOPT_URL => $vurl,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>$vdatos,
	  CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json',
		'Accept: application/json',
		'Authorization: Bearer '.$vtoken
	  ),
	);
	
	curl_setopt_array($curl, $vdconexion);

	$response = curl_exec($curl);
	$vinvoicexml = "";
	$vzipinvoicexml = "";
	$vunsignedinvoicexml = "";
	$vreqfe = "";
	$vrptafe = "";
	$vurlinvoicexml = "";
	$vurlinvoicepdf = "";
	$vurlinvoiceattached = "";
	$vcufe = "";
	$vQRStr  = "";

	curl_close($curl);
	$json = json_decode($response);
	if(isset($json->errors))
	{	
		$vmensaje = "";
		foreach($json->errors as $clave=>$valor){
			$vmensaje .= strtoupper($clave).": <br>";
			$vinfo = "";
			foreach($valor as $ids=>$valores)
			{
				$vinfo .= "*. ".$valores."<br>";
			}
			$vmensaje .= $vinfo;		
		}
		
		echo $vmensaje;
		//echo "No se pudo enviar el documento.";
	}
	else
	{
		if(isset($json->message))
		{
			//echo strtoupper($json->message)."<br>";
		}
		
		//XML
		if(isset($json->invoicexml))
		{
			$vinvoicexml = (string)$json->invoicexml;
		}
		
		//ARCHIVO ZIP CON EL XML
		if(isset($json->zipinvoicexml))
		{
			$vzipinvoicexml = (string)$json->zipinvoicexml;
		}
		
		//NOMBRE XML
		if(isset($json->urlinvoicexml))
		{
			$vurlinvoicexml = (string)$json->urlinvoicexml;
		}
		
		//NOMBRE PDF
		if(isset($json->urlinvoicepdf))
		{
			$vurlinvoicepdf = (string)$json->urlinvoicepdf;
		}
		
		//CUFE
		if(isset($json->cufe))
		{
			$vcufe = (string)$json->cufe;
		}
		
		//QR
		if(isset($json->QRStr))
		{
			$vQRStr = (string)$json->QRStr;
		}
		
		//si es enviado
		if(isset($json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->IsValid))
		{
			if($json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->IsValid=="true")
			{
				$vsql = "select nit from datosemp where iddatos='1'";
				$cc5 = $cx->consulta($vsql);
				if($r5 = mysqli_fetch_array($cc5))
				{
					$vurlinvoicepdf = "https://www.facilwebnube.com/apidian2020/public/index.php/api/download/".$r5[0]."/".$vurlinvoicepdf;
					$vurlinvoicexml = "https://www.facilwebnube.com/apidian2020/public/index.php/api/download/".$r5[0]."/".$vurlinvoicexml; 
				}
				
				$vsql="UPDATE facturaven SET cufe = '".$vcufe."', enlacepdf='".$vurlinvoicepdf."', estado='200', qr_base64='".$vQRStr."',fecha_validacion=concat(fechaven,' ".date("H:i:s")."'),avisos='".$vurlinvoicexml."' WHERE idfacven='".$vidfacven."'";
				$cx->consulta($vsql);
				
				$vsql = "select cufe from facturaven where idfacven='".$vidfacven."' and cufe is not null and cufe <> ''";
				$cc4 = $cx->consulta($vsql);
				if($r4 = mysqli_fetch_array($cc4))
				{
					if(!empty($r4[0]))
					{
						echo "Documento enviado con éxito!!!";
					}
					else
					{
						echo "Hubo un error al enviar el documento.";
					}
				}
			}
			else
			{
				//echo "Ese documento ya ha sido enviado.";
				print_r($json);
			}
		}
	}
	//echo "<br><br>";
	//print_r($vdata);
	//echo "<br><br>";
	//print_r($response);
}
?>