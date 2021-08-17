<?php
$fechaini = $_GET["fechadesde"];
$fechafin = $_GET["fechahasta"];
$idproveedor = $_GET["idproveedor"];

if ($idproveedor=="") { $idproveedor=0; }

if ($idproveedor==0) {
?>
<script>
    window.open("../pdf/res/imprimir_listado_completo_recibos.php?fechaini=<?=$fechaini?>&fechafin=<?=$fechafin?>");
    location.href="index.php";
</script>
<?php } else { ?>
<script>
    window.open("../pdf/res/imprimir_listado_recibos.php?fechaini=<?=$fechaini?>&fechafin=<?=$fechafin?>&idproveedor=<?=$idproveedor?>");
    location.href="index.php";
</script>
<?php } ?>

