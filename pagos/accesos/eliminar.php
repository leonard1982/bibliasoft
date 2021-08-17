<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.accesos.php");

$accesos = new accesos();

$codigo = $_GET["codigo"];
$fecha = $_GET["fecha"];

$eliminar = $accesos->delete($codigo,$fecha);
?>
<script>
    alert ("El registro se ha eliminado correctamente");
    location.href="index.php";
</script>