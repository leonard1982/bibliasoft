<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.proveedores.php");

$proveedores = new proveedores();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$nomproveedor = $_POST["Anombre"];
$nomaltproveedor = $_POST["anombrealt"];
$cifproveedor = $_POST["Acif"];
$codproveedor = $_POST["acodprov"];
$codcliproveedor = $_POST["acodicli"];
$identidad = $_POST["nidentidad"];
$idsucursal = $_POST["nidsucursal"];
$ibanproveedor = $_POST["aiban"];
$bicproveedor = $_POST["abic"];
$ndcproveedor = $_POST["adc"];
$ncuentaproveedor = $_POST["acuenta"];
$comentproveedor = $_POST["acommentproveedor"];
$dirproveedor = $_POST["adireccion"];
$idpais = $_POST["nidpais"];
$idprovincia = $_POST["nidprovincia"];
$idpoblacion = $_POST["nidpoblacion"];
$cpproveedor = $_POST["acpproveedor"];
$telproveedor = $_POST["atelefono"];
$faxproveedor = $_POST["afax"];
$emailproveedor = $_POST["acorreo"];
$contactoproveedor = $_POST["acontacto"];
$urlproveedor = $_POST["aurlproveedor"];
$clavewebproveedor = $_POST["aclavewebproveedor"];
$recargoeqproveedor = $_POST["arecargo"];
$irpfproveedor = $_POST["rirpfproveedor"];
$idmoneda = $_POST["nidmoneda"];
$idformapago = $_POST["nidfp"];
$regimenfiscalproveedor = $_POST["aregfiscal"];

if ($accion == "alta") {
    $proveedores->nomproveedor = $nomproveedor;
    $proveedores->nomaltproveedor = $nomaltproveedor;
    $proveedores->cifproveedor = $cifproveedor;
    $proveedores->codproveedor = $codproveedor;
    $proveedores->codcliproveedor = $codcliproveedor;
    $proveedores->identidad = $identidad;
    $proveedores->idsucursal = $idsucursal;
    $proveedores->ibanproveedor = $ibanproveedor;
    $proveedores->bicproveedor = $bicproveedor;
    $proveedores->ndcproveedor = $ndcproveedor;
    $proveedores->ncuentaproveedor = $ncuentaproveedor;
    $proveedores->comentproveedor = $comentproveedor;
    $proveedores->dirproveedor = $dirproveedor;
    $proveedores->idsucursal = $idsucursal;
    $proveedores->idpais = $idpais;
    $proveedores->idprovincia = $idprovincia;
    $proveedores->idpoblacion = $idpoblacion;
    $proveedores->cpproveedor = $cpproveedor;
    $proveedores->telproveedor = $telproveedor;
    $proveedores->faxproveedor = $faxproveedor;
    $proveedores->emailproveedor = $emailproveedor;
    $proveedores->contactoproveedor = $contactoproveedor;
    $proveedores->urlproveedor = $urlproveedor;
    $proveedores->clavewebproveedor = $clavewebproveedor;
    $proveedores->recargoeqproveedor = $recargoeqproveedor;
    $proveedores->irpfproveedor = $irpfproveedor;
    $proveedores->idmoneda = $idmoneda;
    $proveedores->idformapago = $idformapago;
    $proveedores->regimenfiscalproveedor = $regimenfiscalproveedor;
    $insertado = $proveedores->insert();
    if ($insertado > 0) {
        $mensaje = "El registro ha sido insertado correctamente";
    }
    $idproveedor = $insertado;
    $cabecera2 = "NUEVO PROVEEDOR";
}

if ($accion == "modificar") {
    $idproveedor = $_POST["id"];
    $proveedores->nomaltproveedor = $nomaltproveedor;
    $proveedores->codproveedor = $codproveedor;
    $proveedores->codcliproveedor = $codcliproveedor;
    $proveedores->identidad = $identidad;
    $proveedores->idsucursal = $idsucursal;
    $proveedores->ibanproveedor = $ibanproveedor;
    $proveedores->bicproveedor = $bicproveedor;
    $proveedores->ndcproveedor = $ndcproveedor;
    $proveedores->ncuentaproveedor = $ncuentaproveedor;
    $proveedores->comentproveedor = $comentproveedor;
    $proveedores->dirproveedor = $dirproveedor;
    $proveedores->idsucursal = $idsucursal;
    $proveedores->idpais = $idpais;
    $proveedores->idprovincia = $idprovincia;
    $proveedores->idpoblacion = $idpoblacion;
    $proveedores->cpproveedor = $cpproveedor;
    $proveedores->telproveedor = $telproveedor;
    $proveedores->faxproveedor = $faxproveedor;
    $proveedores->emailproveedor = $emailproveedor;
    $proveedores->contactoproveedor = $contactoproveedor;
    $proveedores->urlproveedor = $urlproveedor;
    $proveedores->clavewebproveedor = $clavewebproveedor;
    $proveedores->recargoeqproveedor = $recargoeqproveedor;
    $proveedores->irpfproveedor = $irpfproveedor;
    $proveedores->idmoneda = $idmoneda;
    $proveedores->idformapago = $idformapago;
    $proveedores->regimenfiscalproveedor = $regimenfiscalproveedor;
    $actualizado = $proveedores->update($idproveedor);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido actualizado correctamente";
    }
    $cabecera2 = "MODIFICAR TRABAJADOR";
}
?>

<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script language="javascript">
		
            function aceptar() {
                location.href="index.php";
            }
		
            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor='hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor='pointer';
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
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
                    </div>
                </div>
            </div>
    </body>
</html>
