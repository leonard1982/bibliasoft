<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.centroscoste.php");

$centroscoste = new centroscoste();

$codigo = $_GET["codigo"];

$eliminar = $centroscoste->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>