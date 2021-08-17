<?php
$fechaini = $_GET["fechadesde"];
$fechafin = $_GET["fechahasta"];
$idproveedor = $_GET["idproveedor"];
$situacion = $_GET["situacion"];

if ($idproveedor=="") {
?>
<script>
    window.open("../pdf/res/imprimir_listado_completo_pagares.php?fechaini=<?=$fechaini?>&fechafin=<?=$fechafin?>&situacion=<?=$situacion?>");
    location.href="index.php";
</script>
<?php } else { ?>
<script>
    window.open("../pdf/res/imprimir_listado_pagares.php?fechaini=<?=$fechaini?>&fechafin=<?=$fechafin?>&idproveedor=<?=$idproveedor?>&situacion=<?=$situacion?>");
    location.href="index.php";
</script>
<?php } ?>

