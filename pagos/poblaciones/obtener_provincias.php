<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.provincias.php");

$provincias = new provincias();

$idpais=$_POST["elegido"];
$idprov=$_SESSION['mantidprovincia'];

$resultado=$provincias->llenar_combo_provincias_por_pais($idpais);

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
