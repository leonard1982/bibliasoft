<?php
//include ("../seguridad_usuario.inc");
include_once ("../clases/class.tasasiva.php");

$tasasiva = new tasasiva();

$idtipoiva=$_POST["elegido"];

$rstasasiva=$tasasiva->llenar_combo_tasasiva($idtipoiva);

$html="<option value='0'>---</option>";
while ($rowta = mysql_fetch_row($rstasasiva)) {
        $html.="<option value='".$rowta[2]."'>".$rowta[2]."</option>";
}
echo $html;
?>
