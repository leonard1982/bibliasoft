<?php
include_once ("../clases/class.ordenes.php");

$ordenes = new ordenes();

$iddoc = $_GET["iddoc"];
$idarchivo= $_GET["idarchivo"];
$idpago = $_GET["idpago"];
$ejerciciopago = $_GET["ejerciciopago"];

$eliminar = $ordenes->eliminar_doc($iddoc);

$nombre_archivo = $idarchivo . ".pdf";
unlink('./ordenpdf/' . $nombre_archivo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente");
    parent.location.href="documentos.php?codigo=<?=$idpago?>&ejercicio=<?=$ejerciciopago?>";
</script>