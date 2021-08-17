<?php

include_once ("../clases/class.proveedores.php");

$proveedores = new proveedores();

$nombre = $_POST["valor"];

$resultado = $proveedores->buscar($nombre, '');

$html = "<table cellpadding='0' cellspacing='0' border='0' class='fuente8' width='95%'>";
$html.= "<tbody>";

$contador = 0;
while ($row = mysql_fetch_row($resultado)) {
    $codproveedor = $row[37];
    $codp = substr($codproveedor, 0, 4);
    $codf = substr($codproveedor, 4, 4);
    if ($codp == "4000") {
        $referencia = "0" . $codf;
    } else {
        $referencia = "9" . $codf;
    }
    if ($contador % 2) {
        $fondolinea = "gradeA";
    } else {
        $fondolinea = "gradeA";
    }
    $html.= "<tr class='" . $fondolinea . "'>";
    $html.= "<td width='80%'><div align='center'>" . $row[1] . "</div></td>";
    $html.= "<td width='15%'><div align='center'>" . $row[3] . "</div></td>";
    $html.= "<td width='5%'><div align='center'><a href='#'><img src='../img/observaciones.png' width='16' height='16' border='0' onClick='sel_proveedor(\"" . $row[0] . "\",\"" . $row[1] . "\",\"" . $row[38] . "\",\"" . $row[35] . "\",\"" . $row[31] . "\",\"" . $referencia . "\")' title='Visualizar'></a></div></td>";
    $html.= "</tr>";
    $contador++;
}

$html.= "</tr>";
$html.= "</tbody>";
$html.= "</table>";
echo $html;
?>