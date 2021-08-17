<?php
$fechaini = $_GET["fechadesde"];
$fechafin = $_GET["fechahasta"];
?>
<script>
    window.open("../pdf/res/imprimir_libro_facturas.php?fechaini=<?=$fechaini?>&fechafin=<?=$fechafin?>");
    location.href="index.php";
</script>
