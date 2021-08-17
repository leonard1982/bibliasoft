<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.sucursales.php");

$sucursales = new sucursales();

$identidad=$_POST["elegido3"];

$resultadosuc=$sucursales->llenar_combo_entidades_por_sucursal($identidad);

$html="<option value='0'>---</option>";

while ($rowsuc = mysql_fetch_row($resultadosuc)) {
    if ($rowsuc[0]==$idsuc) {
        $html.="<option value='".$rowsuc[0]."' selected>".$rowsuc[1]."</option>";
    } else {
        $html.="<option value='".$rowsuc[0]."'>".$rowsuc[1]."</option>";
    }
}
echo $html;
?>