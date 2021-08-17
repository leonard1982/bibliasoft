<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.trabajadores.php");

$trabajadores = new trabajadores();

$codigo = $_GET["codigo"];

$eliminar = $trabajadores->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>