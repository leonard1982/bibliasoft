<?php

$vsetid  = "eb5a6b5d-56ab-4f7f-a699-7d52259c076f";
$vautorizacion = '8bc2d6288e621ad6047804d6a053652e20421dc7c8b0107fd0452024535359b8';
$vnumero = 11;
$vtipo_docfe = 1;//1 factura, 2 factura exportacion, 3 factura contingencia, 4 nota crédito, 5 nota débito, 6 zip, 7 attachedDocument, 8 AplicationResponse
$vfecha  = "2021-01-22";
$vhora   = date("H:i:s");
$vnresolucion = "18764008830007";
$vprefijo = "FF";
$venviar_correo = true;
$vccnit = 88261176;
$vdv    = 7;
$vnombre= "LEONARDO ALFONSO NAVARRO ROJAS";
$vtelefono = 3114485310;
$vdireccion = "MZ M LOTE 16 BRR LOS LIMITES";
$vcorreo = "servicio@solucionesnavarro.com";
$vtipo_documento = 6;//1 registro civil, 2 tarjeta de identidad, 3 cedula de ciudadanía, 4 tarjeta de extranjería, 5 cédula de extranjería, 6 nit, 7 pasaporte, 8 documento de identidad extranjero, 9 nit otro pais, 10 NUIP*
$vtipo_persona = 2; //2 natural, 1 jurídica
$vmunicipio = 780; //780 cúcuta
$vregimen = 2;//1 responsable de IVA, 2 no responsable de IVA
$vforma_pago = 1; //1 contado, 2 crédito
$vmetodo_pago = 10; //10 efectivo
$vdias  = "0";
$vvence = "";

if($vforma_pago==2)
{
	$vf = $vfecha;
	$vf = date_create($vf);
	$vf = date_format($vf, "d-m-Y");
	$vdias = intval($vdias);
	$vfecha_cr = date("Y-m-d",strtotime($vf."+ ".$vdias." days"));
	$vvence = $vfecha_cr;
}
else
{
	$vdias  = "";
	$vvence = "";
}

$vtotalneto = "10.00";
$vbasetotal = "0.00";
$vtotaliva  = "0.00";
$vtotal = "10.00";

//detalle factura
$item = array();
$item[0]["cantidad"]     = "1";
$item[0]["netolinea"]    = "10.00";
$item[0]["codproducto"]  = "0001";
$item[0]["desproducto"]  = "COMPUTADOR CELERON";
$item[0]["tipounidad"]   = 70;//70 unidad

//impuestos de linea
$item[0]["impuestos"]["tipo_impuesto"] = array();
$item[0]["impuestos"]["tipo_impuesto"][0]        = "1";
$item[0]["impuestos"]["porcentaje"][0]           = "0.00";
$item[0]["impuestos"]["total_base_linea"][0]     = "0.00";
$item[0]["impuestos"]["total_impuesto_linea"][0] = "0.00";
$vtipo_impuesto = "";//IVA

if($vtipo_impuesto=="IVA")
{
	$item[0]["impuestos"]["tipo_impuesto"][0]        = "";//1 IVA, 2 IC, 3 ICA, 4 INC, 5 RETE IVA, 6 RETE RENTA, 7 RETE ICA, 10 BOLSAS
	$item[0]["impuestos"]["porcentaje"][0]           = "19.00";
	$item[0]["impuestos"]["total_base_linea"][0]     = $item[0]["netolinea"]/((intval($item[0]["impuestos"]["porcentaje"][0])/100)+1);
	$item[0]["impuestos"]["total_impuesto_linea"][0] = $item[0]["netolinea"]-($item[0]["netolinea"]/((intval($item[0]["impuestos"]["porcentaje"][0])/100)+1));
} 

//armamos las lineas
$vlineas = '"invoice_lines":[';
for($i=0;$i<count($item);$i++)
{
	$vvalorbaselinea = 0;
	$vvalorivalinea  = 0;
	$vvalornetolinea = 0;
	
	for($a=0;$a<count($item[$i]["impuestos"]["tipo_impuesto"]);$a++)
	{	
		//totalizamos
		if($item[$i]["impuestos"]["tipo_impuesto"][$a]==1)//si es igual a IVA
		{
			$vvalorbaselinea = $item[$i]["impuestos"]["total_base_linea"][$a];
			$vvalorivalinea  = $item[$i]["impuestos"]["total_impuesto_linea"][$a];
			$vvalornetolinea = $item[$i]["netolinea"];
	
			$vtotalneto += $item[$i]["netolinea"];
			$vbasetotal += $item[$i]["impuestos"]["total_base_linea"][$a];
			$vtotaliva  += $item[$i]["impuestos"]["total_impuesto_linea"][$a];
		}
	}
	
	$vvalornetolinea = $item[$i]["netolinea"];
			
	if($vregimen==1)//1 responsable de iva , 2 no responsable
	{
		$vlineas .= '{"unit_measure_id": '.$item[$i]["tipounidad"].',
			"invoiced_quantity": "'.$item[$i]["cantidad"].'",
			"line_extension_amount": "'.$vvalorbaselinea.'",
			"free_of_charge_indicator": false,
			"allowance_charges": [{
					"charge_indicator": false,
					"allowance_charge_reason": "DESCUENTO GENERAL",
					"amount": "0.00",
					"base_amount": "'.$vvalornetolinea.'"
				}
			],';
			
			for($a=0;$a<count($item[$i]["impuestos"]["tipo_impuesto"]);$a++)
			{
				$vlineas .= '"tax_totals": [
				{
						"tax_id": '.$item[$i]["impuestos"]["tipo_impuesto"][$a].',
						"tax_amount": "'.$item[$i]["impuestos"]["total_impuesto_linea"][$a].'",
						"taxable_amount": "'.$item[$i]["impuestos"]["total_base_linea"][$a].'",
						"percent": "'.$item[$i]["impuestos"]["porcentaje"][$a].'"
					}
				],';
			}
			
			$vlineas .=	'"description": "'.$item[$i]["desproducto"].'",
			"code": "'.$item[$i]["codproducto"].'",
			"type_item_identification_id": 4,
			"price_amount": "'.($vvalorbaselinea/$item[$i]["cantidad"]).'",
			"base_quantity": "'.$item[$i]["cantidad"].'"}';
	}
	else
	{
		$vlineas .= '{"unit_measure_id": '.$item[$i]["tipounidad"].',
			"invoiced_quantity": "'.$item[$i]["cantidad"].'",
			"line_extension_amount": "'.$vvalornetolinea.'",
			"free_of_charge_indicator": false,
			"allowance_charges": [{
					"charge_indicator": false,
					"allowance_charge_reason": "DESCUENTO GENERAL",
					"amount": "0.00",
					"base_amount": "10.00"
				}
			],';
			
		$vlineas .=	'"description": "'.$item[$i]["desproducto"].'",
			"code": "'.$item[$i]["codproducto"].'",
			"type_item_identification_id": 4,
			"price_amount": "10.00",
			"base_quantity": "'.$item[$i]["cantidad"].'"}';
	}
}
$vlineas .= ']';


//si es o no responsable de iva
if($vregimen==1)//1 responsable de iva , 2 no responsable
{
	$vdata = '{
		"number": '.$vnumero.',
		"type_document_id": '.$vtipo_docfe.',
		"date": "'.$vfecha.'",
		"time": "'.$vhora.'",
		"resolution_number": "'.$vnresolucion.'",
		"prefix": "'.$vprefijo.'",
		"sendmail": '.$venviar_correo.',
		"customer": {
			"identification_number": '.$vccnit.',
			"dv": '.$vdv.',
			"name": "'.$vnombre.'",
			"phone": '.$vtelefono.',
			"address": "'.$vdireccion.'",
			"email": "'.$vcorreo.'",
			"merchant_registration": "0000000-00",
			"type_document_identification_id": '.$vtipo_documento.',
			"type_organization_id": '.$vtipo_persona.',
			"municipality_id": '.$vmunicipio.',
			"type_regime_id": '.$vregimen.'
		},
		"payment_form": {
			"payment_form_id": '.$vforma_pago.',
			"payment_method_id": '.$vmetodo_pago.',
			"payment_due_date": "'.$vvence.'",
			"duration_measure": "'.$vdias.'"
		},	
		"allowance_charges": [
			{
				"discount_id": 1,
				"charge_indicator": false,
				"allowance_charge_reason": "DESCUENTO GENERAL",
				"amount": "0.00",
				"base_amount": "'.$vbasetotal.'"
			}
		],
		"legal_monetary_totals": {
			"line_extension_amount": "'.$vbasetotal.'",
			"tax_exclusive_amount": "0.00",
			"tax_inclusive_amount": "'.$vtotalneto.'",
			"allowance_total_amount": "0.00",
			"charge_total_amount": "0.00",
			"payable_amount": "'.$vtotalneto.'"
		},
		"tax_totals": 
		[
			{
				"tax_id": 1,
				"tax_amount": "'.$vtotaliva.'",
				"percent": "0.00",
				"taxable_amount": "'.$vbasetotal.'"
			}
		],
		'.$vlineas.'
	}';
}
else
{
	$vdata = '{
		"number": '.$vnumero.',
		"type_document_id": '.$vtipo_docfe.',
		"date": "'.$vfecha.'",
		"time": "'.$vhora.'",
		"resolution_number": "'.$vnresolucion.'",
		"prefix": "'.$vprefijo.'",
		"sendmail": '.$venviar_correo.',
		"customer": {
			"identification_number": '.$vccnit.',
			"dv": '.$vdv.',
			"name": "'.$vnombre.'",
			"phone": '.$vtelefono.',
			"address": "'.$vdireccion.'",
			"email": "'.$vcorreo.'",
			"merchant_registration": "0000000-00",
			"type_document_identification_id": '.$vtipo_documento.',
			"type_organization_id": '.$vtipo_persona.',
			"municipality_id": '.$vmunicipio.',
			"type_regime_id": '.$vregimen.'
		},
		"payment_form": {
			"payment_form_id": '.$vforma_pago.',
			"payment_method_id": '.$vmetodo_pago.',
			"payment_due_date": "'.$vvence.'",
			"duration_measure": "'.$vdias.'"
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
		'.$vlineas.'
	}';
}

//echo $vdata;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.facilwebnube.com/apidian2020/public/api/ubl2.1/invoice',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$vdata
,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Accept: application/json',
    'Authorization: Bearer '.$vautorizacion
  ),
));

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
	
	//echo $vmensaje;
	echo "No se pudo enviar el documento.";
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
			echo "Factura enviada con éxito!!!";
		}
		else
		{
			echo "No se pudo enviar el documento.";
		}
	}
}
//echo "<br><br>";
//print_r($vdata);
//echo "<br><br>";
//print_r($response);
?>