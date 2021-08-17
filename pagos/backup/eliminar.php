<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.backup.php");

$backup = new backup();

$codigo = $_GET["codigo"];

$eliminar = $backup->eliminar($codigo);
@unlink('../copias/'.$codigo.".sql");
?>
<script>
    alert ("Se ha eliminado el registro correctamente")
    location.href="index.php";
</script>