<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.sucursales.php");

$sucursales = new sucursales();

$codigo = $_GET["codigo"];

$eliminar = $sucursales->delete($codigo);
?>
<script>
    alert ("El registro se ha eliminado correctamente");
    location.href="index.php";
</script>