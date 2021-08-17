<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.poblaciones.php");

$poblaciones = new poblaciones();

$idprovincia=$_POST["elegido2"];

$resultado=$poblaciones->llenar_combo_poblaciones_por_provincias($idprovincia);

$html="<option value='0'>---</option>";
while ($row = mysql_fetch_row($resultado)) {
    if ($row[0]==$idprov) {
        $html.="<option value='".$row[0]."' selected>".$row[1]."</option>";
    } else {
        $html.="<option value='".$row[0]."'>".$row[1]."</option>";
    }
}
echo $html;
?>
