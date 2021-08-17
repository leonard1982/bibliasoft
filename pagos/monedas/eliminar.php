<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.monedas.php");

$monedas = new monedas();

$codigo = $_GET["codigo"];

$eliminar = $monedas->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>