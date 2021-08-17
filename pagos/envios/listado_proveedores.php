<?php
include ("../clases/class.proveedores.php");

$proveedores = new proveedores();

$resultado = $proveedores->buscar('', '');

$html = "<table cellpadding='0' cellspacing='0' border='0' class='fuente8' width='95%'>";
$html.= "<tbody>";

$contador = 0;
 $html.= "<tr bgcolor='green'>";
    $html.= "<td width='5%'></td>";
    $html.= "<td width='80%'><div align='left'>PROVEEDOR</div></td>";
    $html.= "<td width='15%'><div align='center'>CIF</div></td>";
    $html.= "</tr>";
while ($row = mysql_fetch_row($resultado)) {
    if ($contador % 2) {
        $fondolinea = "gradeA";
    } else {
        $fondolinea = "gradeA";
    }
    $html.= "<tr class='" . $fondolinea . "'>";
    $html.= "<td width='5%'><input type='checkbox' name='proveedores[]' value='".$row[0]."'</td>";
    $html.= "<td width='80%'><div align='left'>" . $row[1] . "</div></td>";
    $html.= "<td width='15%'><div align='center'>" . $row[3] . "</div></td>";
    $html.= "</tr>";
    $contador++;
}

$html.= "</tr>";
$html.= "</tbody>";
$html.= "</table>";
echo $html;
?>
