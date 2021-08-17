<?php
include ("../funciones/fechas.php");

$idproveedor = $_GET["idproveedor"];
if (empty($_GET["fechadesde"])) { $fechadesde='1970-01-01'; } else { $fechadesde = explota($_GET["fechadesde"]); }
if (empty($_GET["fechahasta"])) { $fechahasta='2050-12-31'; } else { $fechahasta = explota($_GET["fechahasta"]); }
?>
<script>
    window.open("../pdf/res/ordenes_de_pago.php?idproveedor=<?= $idproveedor ?>&fechadesde=<?= $fechadesde ?>&fechahasta=<?=$fechahasta?>");
    location.href="index.php";
</script>
