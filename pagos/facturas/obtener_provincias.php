<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.provincias.php");

$provincias = new provincias();

$idpais=$_POST["elegido"];
//$idprov=$_SESSION['mantidprovincia'];

$resultadoprov=$provincias->llenar_combo_provincias_por_pais($idpais);

$html="<option value='0'>---</option>";
while ($rowprov = mysql_fetch_row($resultadoprov)) {
    if ($rowprov[0]==$idprov) {
        $html.="<option value='".$rowprov[0]."' selected>".$rowprov[1]."</option>";
    } else {
        $html.="<option value='".$rowprov[0]."'>".$rowprov[1]."</option>";
    }
}
echo $html;
?>
