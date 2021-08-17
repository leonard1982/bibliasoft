<?php
include_once ("../clases/class.ordenes.php");

$ordenes = new ordenes();

$idpago = $_GET["idpago"];
$ejerciciopago = $_GET["ejercicio"];

$actualizar = $ordenes->actualizar_situacion($idpago,$ejerciciopago);
?>
<script>
    alert ("Se ha cambiado la situacion correctamente");
    location.href="index.php";
</script>