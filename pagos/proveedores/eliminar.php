<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.proveedores.php");

$proveedores = new proveedores();

$codigo = $_GET["codigo"];

$eliminar = $proveedores->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>