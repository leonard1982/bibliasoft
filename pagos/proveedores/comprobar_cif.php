<?php
include_once("../clases/class.proveedores.php");

$proveedores = new proveedores();

$cif=$_POST['Acif'];

$valor=$proveedores->cif_duplicado($cif);

if (empty($valor[0])) {
   echo "{estado:1, tx:'CIF disponible'}";
} else{
    echo "{estado:0, tx:'ERROR: CIF existente'}";
} 
?>