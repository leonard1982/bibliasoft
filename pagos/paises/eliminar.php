<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.paises.php");

$paises = new paises();

$codigo = $_GET["codigo"];

$eliminar = $paises->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>