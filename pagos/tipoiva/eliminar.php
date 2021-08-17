<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.tipoiva.php");

$tipoiva = new tipoiva();

$codigo = $_GET["codigo"];

$eliminar = $tipoiva->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>