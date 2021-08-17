<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.entidades.php");

$entidades = new entidades();

$codigo = $_GET["codigo"];

$eliminar = $entidades->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>