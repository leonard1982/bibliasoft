<?php

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
  CURLOPT_POSTFIELDS =>'{
	"number": 9,
	"type_document_id": 1,
	"date": "2021-01-22",
	"time": "04:08:12",
	"resolution_number": "18764008830007",
	"prefix": "FF",
	"sendmail": true,
	"customer": {
		"identification_number": 88261176,
		"dv": 7,
		"name": "LEONARDO ALFONSO NAVARRO ROJAS",
		"phone": 3114485310,
		"address": "MZ M LOTE 16 BR LOS LIMITES",
		"email": "servicio@solucionesnavarro.com",
		"merchant_registration": "0000000-00",
		"type_document_identification_id": 6,
		"type_organization_id": 2,
		"municipality_id": 780,
		"type_regime_id": 2
	},
	"payment_form": {
		"payment_form_id": 2,
		"payment_method_id": 30,
		"payment_due_date": "2021-01-22",
		"duration_measure": "30"
	},	
	"allowance_charges": [
		{
			"discount_id": 1,
			"charge_indicator": false,
			"allowance_charge_reason": "DESCUENTO GENERAL",
			"amount": "0.00",
			"base_amount": "10.00"
		}
	],
	"legal_monetary_totals": {
		"line_extension_amount": "10.00",
		"tax_exclusive_amount": "0.00",
		"tax_inclusive_amount": "10.00",
		"allowance_total_amount": "0.00",
		"charge_total_amount": "0.00",
		"payable_amount": "10.00"
	},
	"invoice_lines": 
	[
		{
			"unit_measure_id": 70,
			"invoiced_quantity": "1",
			"line_extension_amount": "10.00",
			"free_of_charge_indicator": false,
			"allowance_charges": [{
					"charge_indicator": false,
					"allowance_charge_reason": "DESCUENTO GENERAL",
					"amount": "0.00",
					"base_amount": "10.00"
				}
			],
			"description": "COMISION POR SERVICIOS",
			"code": "COMISION",
			"type_item_identification_id": 4,
			"price_amount": "10.00",
			"base_quantity": "1"
		}
	]
}

',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Accept: application/json',
    'Authorization: Bearer 8bc2d6288e621ad6047804d6a053652e20421dc7c8b0107fd0452024535359b8'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>