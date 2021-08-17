<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.envios.php");

$envios = new envios();

$codigo = $_GET["codigo"];

$eliminar = $envios->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>