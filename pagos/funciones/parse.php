<?php
	//include ("../clases/class.expedientes.php");
	
function parse ($doc,$ide,$idc,$idt) {
	include_once ("../clases/class.expedientes.php");

	$expedientes = new expedientes();
	

	$row=$expedientes->parse_cri($ide,$idc,$idt);

	$doc=str_replace("#expedientes.id_expedientes",$row[0],$doc);
	$doc=str_replace("#expedientes.numexpteorg",$row[4],$doc);
	$doc=str_replace("#expedientes.fechaenvio",$row[9],$doc);
	$doc=str_replace("#expedientes.fechaentradacon",$row[8],$doc);
	$doc=str_replace("#clasesprocedimientos.denominacion",$row[17],$doc);
	$doc=str_replace("#tiposprocedimientos.denominacion",$row[18],$doc);
	$doc=str_replace("#organismos.denominacion",$row[19],$doc);
	$doc=str_replace("#organismos.direccion",$row[20],$doc);
	$doc=str_replace("#organismos.codpostal",$row[21],$doc);
	$doc=str_replace("#municipios.denominacion",$row[22],$doc);
	$doc=str_replace("#tareas.fecha",$row[23],$doc);
	$doc=str_replace("#tareas.vencimiento",$row[24],$doc);
	$doc=str_replace("#personal.referencia",$row[25],$doc);
	$doc=str_replace("#recurrentes.nombre",$row[27],$doc);
	$doc=str_replace("#recurrentes.apellidos",$row[28],$doc);
	$doc=str_replace("#direccionesgenerales.denominacion",$row[29],$doc);
	$doc=str_replace("#servicios.denominacion",$row[30],$doc); 
	return $doc;
}
?>