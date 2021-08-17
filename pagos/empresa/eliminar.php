<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.poblaciones.php");

$poblaciones = new poblaciones();

$codigo = $_GET["codigo"];

$eliminar = $poblaciones->delete($codigo);
?>
<script>
    alert ("El registro se ha eliminado correctamente");
    location.href="index.php";
</script>