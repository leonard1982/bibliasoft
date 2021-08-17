<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.facturas.php");
include_once ("../funciones/fechas.php");
require_once('../pdf/firmarpdf/fpdf/fpdf.php');
require_once('../pdf/firmarpdf/fpdi/fpdi.php');
require('../pdf/firmarpdf/clase.php');

$facturas = new facturas();
$pdf = new PDF_EAN13();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$ejercicio = $_POST["nejercicio"];
$ffacturap = $_POST["afechafactura"];
if (!empty($ffacturap)) {
    $ffacturap = explota($ffacturap);
}
$numfacturap = $_POST["anumfactura"];
$reffacturap = $_POST["areffactura"];
$descfacturap = $_POST["adescfactura"];
$contactfacturap = $_POST["acontacto"];
$telfacturap = $_POST["atelefono"];
$procesadafacturap = $_POST["aprocesada"];
$idusuario = $_SESSION["idusuario"];
$idproveedor = $_POST["nidproveedor"];
$idformapago = $_POST["nidfp"];
$idmoneda = $_POST["nidmoneda"];
$totalfacturap = $_POST["rtotalfacs"];
$comentfacturap = $_POST["aobservaciones"];
$bimp1facturap = $_POST["qbimp1"];
$bimp2facturap = $_POST["qbimp2"];
$bimp3facturap = $_POST["qbimp3"];
$bimp4facturap = $_POST["qbimp4"];
$tiva1facturap = $_POST["ntipoiva1"];
$tiva2facturap = $_POST["ntipoiva2"];
$tiva3facturap = $_POST["ntipoiva3"];
$tiva4facturap = $_POST["ntipoiva4"];
$tasaiva1 = $_POST["tasaiva1"];
$tasaiva2 = $_POST["tasaiva2"];
$tasaiva3 = $_POST["tasaiva3"];
$tasaiva4 = $_POST["tasaiva4"];
$c1ivafacturap = $_POST["qcuotaiva1"];
$c2ivafacturap = $_POST["qcuotaiva2"];
$c3ivafacturap = $_POST["qcuotaiva3"];
$c4ivafacturap = $_POST["qcuotaiva4"];
$tret1facturap = $_POST["qtotalret"];
$tiporetefacturap = $_POST["qporcret"];
$impfacturap = $_POST["atotalcon"];
$bretimpfacturap = $_POST["qbiret"];
$totalret = $_POST["qtotalret"];
$idcentroscoste = $_POST["ncc"];
$pcuenta = $_POST["pcuenta"];

if ($accion == "alta") {
    $facturas->ejercicio = $ejercicio;
    $codfactura = $facturas->obtener_num_factura($ejercicio);
    $facturas->idfacturap = $codfactura;
    $facturas->ffacturap = $ffacturap;
    $facturas->numfacturap = $numfacturap;
    $facturas->reffacturap = $reffacturap;
    $facturas->descfacturap = $descfacturap;
    $facturas->contactfacturap = $contactfacturap;
    $facturas->telfacturap = $telfacturap;
    $facturas->procesadafacturap = $procesadafacturap;
    $facturas->idusuario = $idusuario;
    $facturas->idproveedor = $idproveedor;
    $facturas->idformapago = $idformapago;
    $facturas->idmoneda = $idmoneda;
    $facturas->totalfacturap = $totalfacturap;
    $facturas->comentfacturap = $comentfacturap;
    $facturas->b1impfacturap = $bimp1facturap;
    $facturas->b2impfacturap = $bimp2facturap;
    $facturas->b3impfacturap = $bimp3facturap;
    $facturas->b4impfacturap = $bimp4facturap;
    $facturas->tiva1facturap = $tiva1facturap;
    $facturas->tiva2facturap = $tiva2facturap;
    $facturas->tiva3facturap = $tiva3facturap;
    $facturas->tiva4facturap = $tiva4facturap;
    $facturas->tasaiva1 = $tasaiva1;
    $facturas->tasaiva2 = $tasaiva2;
    $facturas->tasaiva3 = $tasaiva3;
    $facturas->tasaiva4 = $tasaiva4;
    $facturas->c1ivafacturap = $c1ivafacturap;
    $facturas->c2ivafacturap = $c2ivafacturap;
    $facturas->c3ivafacturap = $c3ivafacturap;
    $facturas->c4ivafacturap = $c4ivafacturap;
    $facturas->tret1facturap = $tret1facturap;
    $facturas->tiporetefacturap = $tiporetefacturap;
    $facturas->impfacturap = $impfacturap;
    $facturas->bretimpfacturap = $bretimpfacturap;
    $facturas->idcentroscoste = $idcentroscoste;
    $facturas->totalret = $totalret;
    $facturas->pcuenta = $pcuenta;
    $insertado = $facturas->insert();
    if ($insertado == 0) {
        $mensaje = "El registro ha sido insertado correctamente";
        if ($_FILES['pdffactura']['tmp_name'] != "") {
            $nombre_archivo = $codfactura . "-" . $ejercicio . ".pdf";
            unlink('./facpdf/' . $nombre_archivo);
            copy($_FILES['pdffactura']['tmp_name'], './facpdf/' . $nombre_archivo);
            $sourceFileName = './facpdf/' . $nombre_archivo;
            $pagecount = $pdf->setSourceFile($sourceFileName);
            $partes = explode(".", $nombre_archivo);
            $i = 1;
            do {
                // add a page
                $pdf->AddPage();
                // import page
                $tplidx = $pdf->ImportPage($i);

                $pdf->useTemplate($tplidx, 10, 10, 200);

                $pdf->SetFont('Arial');
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFontSize(14);

                $pdf->EAN13(140, 265, $partes[0]);
                $i++;
            } while ($i <= $pagecount);
            $pdf->Output($sourceFileName, "F");
        }
    }
    $cabecera2 = "NUEVA FACTURA";
}

if ($accion == "modificar") {
    $codfactura = $_POST["codfactura"];
    $ejercicio = $_POST["ejercicio"];
    $facturas->ffacturap = $ffacturap;
    $facturas->numfacturap = $numfacturap;
    $facturas->reffacturap = $reffacturap;
    $facturas->descfacturap = $descfacturap;
    $facturas->contactfacturap = $contactfacturap;
    $facturas->telfacturap = $telfacturap;
    $facturas->procesadafacturap = $procesadafacturap;
    $facturas->idusuario = $idusuario;
    $facturas->idproveedor = $idproveedor;
    $facturas->idformapago = $idformapago;
    $facturas->idmoneda = $idmoneda;
    $facturas->totalfacturap = $totalfacturap;
    $facturas->comentfacturap = $comentfacturap;
    $facturas->b1impfacturap = $bimp1facturap;
    $facturas->b2impfacturap = $bimp2facturap;
    $facturas->b3impfacturap = $bimp3facturap;
    $facturas->b4impfacturap = $bimp4facturap;
    $facturas->tiva1facturap = $tiva1facturap;
    $facturas->tiva2facturap = $tiva2facturap;
    $facturas->tiva3facturap = $tiva3facturap;
    $facturas->tiva4facturap = $tiva4facturap;
    $facturas->tasaiva1 = $tasaiva1;
    $facturas->tasaiva2 = $tasaiva2;
    $facturas->tasaiva3 = $tasaiva3;
    $facturas->tasaiva4 = $tasaiva4;
    $facturas->c1ivafacturap = $c1ivafacturap;
    $facturas->c2ivafacturap = $c2ivafacturap;
    $facturas->c3ivafacturap = $c3ivafacturap;
    $facturas->c4ivafacturap = $c4ivafacturap;
    $facturas->tret1facturap = $tret1facturap;
    $facturas->tiporetefacturap = $tiporetefacturap;
    $facturas->impfacturap = $impfacturap;
    $facturas->bretimpfacturap = $bretimpfacturap;
    $facturas->totalret = $totalret;
    $facturas->idcentroscoste = $idcentroscoste;
    $facturas->pcuenta = $pcuenta;
    $actualizado = $facturas->update($codfactura, $ejercicio);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido actualizado correctamente";
        if ($_FILES['pdffactura']['tmp_name'] != "") {
            $nombre_archivo = $codfactura . "-" . $ejercicio . ".pdf";
            unlink('./facpdf/' . $nombre_archivo);
            copy($_FILES['pdffactura']['tmp_name'], './facpdf/' . $nombre_archivo);
            $sourceFileName = './facpdf/' . $nombre_archivo;
            $pagecount = $pdf->setSourceFile($sourceFileName);
            $partes = explode(".", $nombre_archivo);
            $i = 1;
            do {
                // add a page
                $pdf->AddPage();
                // import page
                $tplidx = $pdf->ImportPage($i);

                $pdf->useTemplate($tplidx, 10, 10, 200);

                $pdf->SetFont('Arial');
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFontSize(14);

                $pdf->EAN13(140, 265, $partes[0]);
                $i++;
            } while ($i <= $pagecount);
            $pdf->Output($sourceFileName, "F");
        }
    }
    $cabecera2 = "MODIFICAR FACTURA";
}
?>

<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script language="javascript">

            function aceptar() {
                location.href = "index.php";
            }

            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor = 'hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor = 'pointer';
            }

        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header"><?php echo $cabecera2 ?></div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                <td width="100%" colspan="2" class="mensaje"><?php echo $mensaje; ?></td>
                            </tr>				
                        </table>
                        <hr>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor = cursor">
                    </div>
                </div>
            </div>
    </body>
</html>
