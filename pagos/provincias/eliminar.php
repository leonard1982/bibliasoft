<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.provincias.php");

$provincias = new provincias();

$codigo = $_GET["codigo"];

$eliminar = $provincias->delete($codigo);
?>
<script>
    alert ("El registro se ha eliminado correctamente");
    location.href="index.php";
</script>