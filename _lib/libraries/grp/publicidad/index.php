<?php
$url = 'https://www.facilwebnube.com/publicidad_fw/archivos.php';
$contents = file_get_contents("$url");
if(strlen($contents))
{
	echo $contents;
}
?>