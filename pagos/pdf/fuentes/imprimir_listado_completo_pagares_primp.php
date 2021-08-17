<?php
include ("../../clases/class.vencimientos.php");
include ("../../clases/class.proveedores.php");
include ("../../funciones/fechas.php");
include ("../../funciones/lib_fecha_letras.php");
include ("../../funciones/aletras.php");

$vencimientos = new vencimientos;
$proveedores = new proveedores;
$V = new EnLetras();

$cadena_fechas = "";
if ((($_GET["fechaini"]) == "01/01/1970") && ($_GET["fechafin"] == "31/12/2050")) {
    $cadena_fechas = "Todas las fechas";
}
if ((($_GET["fechaini"]) == "01/01/1970") && ($_GET["fechafin"] != "31/12/2050")) {
    $cadena_fechas = "Hasta " . $_GET["fechafin"];
}
if ((($_GET["fechaini"]) != "01/01/1970") && ($_GET["fechafin"] == "31/12/2050")) {
    $cadena_fechas = "Desde " . $_GET["fechaini"];
}
if ((($_GET["fechaini"]) != "01/01/1970") && ($_GET["fechafin"] != "31/12/2050")) {
    $cadena_fechas = "Desde " . $_GET["fechaini"] . " hasta " . $_GET["fechafin"];
}


$fechaini = explota($_GET["fechaini"]);
$fechafin = explota($_GET["fechafin"]);
$idproveedor = $_GET["idproveedor"];
$situacion = $_GET["situacion"];

$rsvencimientos = $vencimientos->imprimir_pagares($idproveedor, $fechaini, $fechafin, $situacion);
?>
<style>
    #pagare {
        height: 100%; /* tamaño en altura del pagaré en milímetros*/
        /* margin-top: 15mm; /* distancia al borde de arriba del papel*/
        margin-left: 30mm; /* distancia al borde izquierdo del papel*/
    }
    #prov2 {
        margin-left: -20px;
    }
    #prov {
        margin-left: -20px;
    }
    #importe {
        margin-left: -10px;
        width: 150mm;
        height:10mm;
    }
</style>
<page backtop="0mm" backbottom="0mm" backleft="0mm" backright="0mm">
      <?php
      while ($row = mysql_fetch_row($rsvencimientos)) {
          $dia="  ".substr(implota($row[1]),0,2);
          $mes="  ".nombremes(substr(implota($row[1]),3,2));
          $anyo="   ".substr(implota($row[1]),6,4);
           ?>
<div id="pagare">
          <table style="width: 100%">
            
          <td style="width: 100%">1</td>
          
          </table>
          <br>
          <div id="prov2">22345678901234567890123456789012345678901234567890123456789012345678901234567890</div>
          <div id="prov2">3</div>
          <div id="prov2">4</div>
          <div id="prov2">5</div>
          <div id="prov2">6</div>
          <div id="prov2">7</div>
          <div id="prov2">8</div>
          <div id="prov2">92345678901234567890123456789012345678901234567890123456789012345678901234567890</div>
          <div id="prov2">10</div>
          <div id="prov2">11</div>
          <div id="prov2">12</div>
          <div id="prov2">13</div>
          <div id="prov2">14345678901234567890123456789012345678901234567890123456789012345678901234567890</div>
          <div id="prov2">15</div>
	  <div id="prov2">16</div>

        </div>
      <?php } ?>
 </page>
