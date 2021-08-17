<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.poblaciones.php");

$poblaciones = new poblaciones();

$idprovincia=$_POST["elegido2"];

$rspoblaciones=$poblaciones->llenar_combo_poblaciones_por_provincias($idprovincia);

$html="<option value='0'>---</option>";
while ($rowpob = mysql_fetch_row($rspoblaciones)) {
    if ($rowpob[0]==$idprov) {
        $html.="<option value='".$rowpob[0]."' selected>".$rowpob[1]."</option>";
    } else {
        $html.="<option value='".$rowpob[0]."'>".$rowpob[1]."</option>";
    }
}
echo $html;
?>
