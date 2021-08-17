<?php
$fechaini = $_GET["fechadesde"];
$fechafin = $_GET["fechahasta"];
$estado = $_GET["estado"];
?>
<script>
    window.open("../pdf/res/imprimir_listado_vencimientos.php?fechaini=<?=$fechaini?>&fechafin=<?=$fechafin?>&estado=<?=$estado?>");
    location.href="index.php";
</script>
