<?php
include ("../funciones/fechas.php");

$idproveedor = $_GET["idproveedor"];
$fechadesde = $_GET["fechadesde"];
$fechahasta = $_GET["fechahasta"];
?>
<script>
    window.open("../pdf/res/listado_envios.php?idproveedor=<?= $idproveedor ?>&fechadesde=<?= $fechadesde ?>&fechahasta=<?=$fechahasta?>");
    location.href="index.php";
</script>
