<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.ordenes.php");
include_once ("../clases/class.facturas.php");

$ordenes = new ordenes();
$facturas = new facturas();

$codigo = $_GET["codigo"];
$ejercicio = $_GET["ejercicio"];

//$eliminar = $ordenes->delete_borrando($codigo, $ejercicio);

$eliminar = $ordenes->delete_sin_borrar($codigo,$ejercicio);

$eliminarf = $facturas->liberar_facturas($codigo, $ejercicio);

$rsdoc=$ordenes->listar_doc($codigo, $ejercicio);

while ($row = mysql_fetch_row($rsdoc)) {
    $nombre_archivo=$row[0].".pdf";
    unlink('./ordenpdf/' . $nombre_archivo);
}

$eliminard = $ordenes->liberar_documentos($codigo, $ejercicio);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>