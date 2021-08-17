<?php
include_once ("../clases/class.ordenes.php");

$ordenes = new ordenes();

$idpago = $_GET["idpago"];
$ejercicio = $_GET["ejercicio"];

$rsordenes = $ordenes->actualizar_orden_impresa($idpago, $ejercicio);
?>
<script>
    window.open("../pdf/res/orden_de_pago.php?idpago=<?=$idpago?>&ejercicio=<?=$ejercicio?>");
    location.href="index.php";
</script>
