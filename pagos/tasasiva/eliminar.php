<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.tasasiva.php");

$tasasiva = new tasasiva();

$codigo = $_GET["codigo"];

$eliminar = $tasasiva->delete($codigo);
?>
<script>
    alert ("El registro se ha eliminado correctamente");
    location.href="index.php";
</script>