<?php
include_once ("../clases/class.facturas.php");

$facturas = new facturas();

$fechaini = $_GET["fechadesde"];
$fechafin = $_GET["fechahasta"];
$idproveedor = $_GET["idproveedor"];
$pagadas = $_GET["pagadas"];

if ($idproveedor=="") {
?>
<script>
    window.open("../pdf/res/imprimir_listado_completo_facturas.php?fechaini=<?=$fechaini?>&fechafin=<?=$fechafin?>&pagadas=<?=$pagadas?>");
    location.href="index.php";
</script>
<?php } else { ?>
<script>
    window.open("../pdf/res/imprimir_listado_facturas.php?fechaini=<?=$fechaini?>&fechafin=<?=$fechafin?>&idproveedor=<?=$idproveedor?>&pagadas=<?=$pagadas?>");
    location.href="index.php";
</script>
<?php } ?>

