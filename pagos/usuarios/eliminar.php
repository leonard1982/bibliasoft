<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.usuarios.php");

$usuarios = new usuarios();

$codigo = $_GET["codigo"];

$eliminar = $usuarios->delete($codigo);
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>