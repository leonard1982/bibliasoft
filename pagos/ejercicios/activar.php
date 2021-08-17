<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.ejercicios.php");

$ejercicios = new ejercicios();

$codigo = $_GET["codigo"];

$activar = $ejercicios->activar($codigo);
?>
<script>
    alert ("Se ha activado el ejercicio correctamente")
    location.href="index.php";
</script>