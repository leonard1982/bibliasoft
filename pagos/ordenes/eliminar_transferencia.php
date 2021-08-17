<?php
include_once ("../clases/class.transferencias.php");
include_once ("../clases/class.vencimientos.php");
include_once ("../clases/class.ordenes.php");


$transferencias = new transferencias();
$vencimientos = new vencimientos();
$ordenes = new ordenes();

$numero = $_GET["numero"];
$ejercicio = $_GET["ejercicio"];
$idpago = $_GET["idpago"];
$ejerciciopago = $_GET["ejerciciopago"];
$importe = $_GET["importe"];

$eliminar = $vencimientos->delete($ejercicio, $numero);
$eliminar2 = $transferencias->delete($ejercicio, $numero);
$actualizar_importes=$ordenes->actualizar_importes($idpago,$ejerciciopago,$importe,0);
?>
<script>
    alert ("Se ha eliminado el registro correctamente");
    parent.location.href="vencimientos.php?codigo=<?= $idpago ?>&ejercicio=<?= $ejerciciopago ?>";
</script>