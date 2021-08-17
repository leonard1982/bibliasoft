<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apify.epayco.co/login',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'key: 5d3e1cbe775e007cb7deaa00035ff1e1',
    'Authorization: Basic NzY5ZDRhMWIyZjJjYmFiNjk2MDRkZTUxNmYyOWRhY2Q6ZmQ0NjZmOTM2NjM3YWRiMzBjMjc0NWFhY2M2ZjljMTY='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>