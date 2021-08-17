<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.formapago.php");

$formapago = new formapago();

$codigo = $_GET["codigo"];

$eliminar = $formapago->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>