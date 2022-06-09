<?php

$vemail = "";

if(isset($_GET["email"]))
{
	$vemail = $_GET["email"];
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://api.usebouncer.com/v1/email/verify?email='.$vemail.'&timeout=10',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	  CURLOPT_HTTPHEADER => array(
		'x-api-key: OF15DwynV2J02VmAdizNQ7dUJFskZx9ewYlq11hJ'
	  ),
	));

	$response = curl_exec($curl);
	
	$vdata = json_decode($response);
	curl_close($curl);
	
	if(isset($vdata->reason))
	{
		if($vdata->reason=="accepted_email" or $vdata->reason=="unknown" or $vdata->reason=="low_deliverability")
		{
			echo json_encode(array("reason"=>$vdata->reason,"json"=>$vdata,"error"=>""));
		}
		else
		{
			echo json_encode(array("reason"=>"","json"=>$vdata,"error"=>"Hubo un error al validar el correo."));
		}
	}
}
?>