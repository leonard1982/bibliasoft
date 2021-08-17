<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.ordenes.php");
include_once ("../clases/class.facturas.php");
include_once ("../funciones/fechas.php");

$ordenes = new ordenes();
$facturas = new facturas();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$ejerciciopago = $_POST["nejercicio"];
$fechapago = $_POST["afechaorden"];
if (!empty($fechapago)) {
    $fechapago = explota($fechapago);
}
$idproveedorpago = $_POST["nidproveedor"];
$importepago = $_POST["aimporte"];
$refpago = $_POST["areferencia"];
$comentpago = $_POST["aobservaciones"];
$idusuariopago = $_SESSION["idusuario"];
//$idformapago = $_POST["nidfp"];
$idformapago = 0;
$idmoneda = $_POST["nidmoneda"];
$nfacpago = $_POST["anumfacturas"];
$nvencipago = $_POST["anumvencimientos"];
$sitcartapago = $_POST["asituacion"];
$prefijo = $_POST["prefijo"];

if ($accion == "alta") {
    $ordenes->ejerciciopago = $ejerciciopago;
    $idpago = $ordenes->obtener_num_orden($ejerciciopago);
    $ordenes->idpago = $idpago;
    $ordenes->fechapago = $fechapago;
    $ordenes->idproveedorpago = $idproveedorpago;
    $ordenes->importepago = $importepago;
    $ordenes->refpago = $refpago;
    $ordenes->comentpago = $comentpago;
    $ordenes->idusuariopago = $idusuariopago;
    $ordenes->idformapago = $idformapago;
    $ordenes->idmoneda = $idmoneda;
    $ordenes->nfacpago = $nfacpago;
    $ordenes->sitcartapago = $sitcartapago;
    $ordenes->nvencipago = $nvencipago;
    $ordenes->importepdte = $importepago;
    $ordenes->prefijo = $prefijo;
    $insertado = $ordenes->insert();
    if ($insertado == 0) {
        $mensaje = "El registro ha sido insertado correctamente";
    }
    $cabecera2 = "NUEVA ORDEN DE PAGO";
    $rsordenes = $ordenes->select($idpago, $ejerciciopago);
}

if ($accion == "modificar") {
    $idpago = $_POST["idpago"];
    $ejerciciopago = $_POST["ejercicio"];
    $ordenes->fechapago = $fechapago;
    $ordenes->idproveedorpago = $idproveedorpago;
    $ordenes->importepago = $importepago;
    $ordenes->refpago = $refpago;
    $ordenes->comentpago = $comentpago;
    $ordenes->idusuariopago = $idusuariopago;
    $ordenes->idformapago = $idformapago;
    $ordenes->idmoneda = $idmoneda;
    $ordenes->nfacpago = $nfacpago;
    $ordenes->sitcartapago = $sitcartapago;
    $ordenes->nvencipago = $nvencipago;
    $ordenes->prefijo = $prefijo;
    $actualizado = $ordenes->update($idpago, $ejerciciopago);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido actualizado correctamente";
        if ($_FILES['pdforden']['tmp_name'] != "") {
            $nombre_archivo = $idpago . "-" . $ejercicio . ".pdf";
            unlink('./ordenpdf/' . $nombre_archivo);
            copy($_FILES['pdforden']['tmp_name'], './ordenpdf/' . $nombre_archivo);
        }
    }
    $cabecera2 = "ORDEN DE PAGO -- INSERTAR FACTURAS";
}

$rsfacturas = $facturas->listar_facturas_sinprocesar_proveedor($idproveedorpago);
?>

<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script language="javascript">
            

            function aceptar() {
                var rows = document.getElementsByName('opcion[]');
                var seleccion=0;
                var lineas=0;
                for (var i = 0, l = rows.length; i < l; i++) {
                    if (rows[i].checked) {
                        seleccion=1;
                        lineas++;
                    }
                }
                if (seleccion==1) {
                    document.getElementById("formulario").submit();
                } else {
                    alert ("Debe asignar al menos una factura a la orden de pago")
                }
            }

            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor = 'hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor = 'pointer';
            }
            
            function actualizar_importe() {
                var rows = document.getElementsByName('opcion[]');
                var importe=0;
                var lineas=0;
                for (var i = 0, l = rows.length; i < l; i++) {
                    if (rows[i].checked) {
                        var valor=rows[i].value;
                        var strCompleta=new String(valor);
                        var arrPartes=strCompleta.split("#");
                        var adelante=arrPartes[2];
                        var precio=Math.round(parseFloat(adelante)*100)/100;
                        importe=parseFloat(importe+precio);
                        lineas++;
                    }
                }
                document.getElementById("aimporte").value=importe;
                document.getElementById("anumfac").value=lineas;
            }
            
            $(document).ready(function() {
                $(document).ready(function(){
                    $("#guardando").click(function(){
                        if ($('#dendoc').val()=="") {
                            alert ("El campo denominacion es obligatorio")   
                        } else {
                            $("#formulario").submit();
                            $('#pdforden').val('');
                            $('#dendoc').val('');
                        }
                    });
                });
            });

        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header"><?php echo $cabecera2 ?></div>
                    <div id="frmBusqueda">
                        <hr>
                        <form class="formulario" id="formulario" method="post" action="guardar_facturas.php">
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="5" class="mensaje"><?php echo $mensaje; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%">Num. Orden Pago</td>
                                    <td width="28"><input type="text" id="nejercicio" name="nejercicio" class="cajaPequenaR" value="<?= $rsordenes[0] . '/' . $rsordenes[1] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <td width="20%">Fecha Orden Pago (*)</td>
                                    <td width="28%"><input id="afechaorden" type="text" class="cajaPequenaR" NAME="afechaorden" maxlength="10" readonly value="<?= implota($rsordenes[3]) ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Importe</td>
                                    <td width="28%"><input NAME="aimporte" type="text" class="cajaMediaR" id="aimporte" maxlength="12" readonly value="<?= $rsordenes[4] ?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Referencia</td>
                                    <td width="28%"><input NAME="areferencia" type="text" class="cajaMediaR" id="areferencia" maxlength="12" readonly value="<?= $rsordenes[5] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Proveedor</td>
                                    <td width="28%"><input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly value="<?= $rsordenes[13] ?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Numero de facturas</td>
                                    <td width="28%"><input NAME="anumfac" type="text" class="cajaPequenaR" id="anumfac" maxlength="12" readonly></td>

                                </tr>
                            </table>
                            <fieldset>
                                <legend>FACTURAS</legend>
                                <table width="100%" border="0">
                                    <tr class="mensaje">
                                        <td width="5%"></td>
                                        <td width="19%">N. Registro</td>
                                        <td width="19%">N. Factura Prov.</td>
                                        <td width="16%">Fecha</td>
                                        <td width="19%">Total Fact.</td>
                                        <td width="19%">Importe a pagar</td>
                                        <td width="5%"></td>
                                    </tr>
                                    <?php while ($row = mysql_fetch_row($rsfacturas)) { ?>
                                        <tr>
                                            <td align='center'><input type="checkbox" id="opcion<?= $contador ?>" name="opcion[]" value="<?= $row[0] . '#' . $row[1] . '#' . $row[5] ?>" onclick="actualizar_importe()"></td>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[0] . '/' . $row[1] ?>" readonly>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[2] ?>" readonly></td>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= implota($row[3]) ?>" readonly></td>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[4] ?>" readonly></td>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[5] ?>" readonly></td>
                                            <?php if (file_exists("../facturas/facpdf/" . $row[0] . '-' . $row[1] . ".pdf")) { ?>
                                                <td><a href="../facturas/facpdf/<?= $row[0] . '-' . $row[1] ?>.pdf" target="_blank"><img src="../img/pdf.png" width="16" height="16" border="0"></a></td>
                                            <?php } else { ?>
                                                <td></td>
                                            <?php } ?>
                                        <input type="hidden" name="idpago" id="idpago" value="<?= $idpago ?>">
                                        <input type="hidden" name="ejerciciopago" id="idpago" value="<?= $ejerciciopago ?>">
                                        </tr> 
                                    <?php } ?>
                                </table>
                            </fieldset>
                        </form>
                        <hr>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor = cursor">
                    </div>
                </div>
            </div>
    </body>
</html>
