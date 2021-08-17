<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.ordenes.php");
include ("../funciones/fechas.php");

$ordenes = new ordenes();

$idpago = $_GET["codigo"];
$ejercicio = $_GET["ejercicio"];

$cabecera2 = "ORDEN DE PAGO -- DOCUMENTOS";
$rsordenes = $ordenes->select($idpago, $ejercicio);


//$rsfacturas = $facturas->listar_facturas_sinprocesar_proveedor($idproveedorpago);
?>

<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
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
            
            function inicio() {
                document.getElementById("formulario").submit();
            }
            
            $(document).ready(function() {
                $(document).ready(function(){
                    $("#guardando").click(function(){
                        if ($('#dendoc').val()=="") {
                            alert ("El campo denominacion es obligatorio")   
                        } else {
                            if ($('#pdforden').val()=="") {
                                alert ("Debe seleccionar un archivo")
                            } else {
                                $("#formulario").submit();
                                $('#pdforden').val('');
                                $('#dendoc').val('');
                            }
                        }
                    });
                });
            });

        </script>
    </head>
    <body onload="javascript:inicio()">
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header"><?php echo $cabecera2 ?></div>
                    <div id="frmBusqueda">
                        <hr>
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
                                <td width="28%"><input NAME="aimporte" type="text" class="cajaMedia" id="aimporte" maxlength="12" readonly value="<?= $rsordenes[4] ?>"></td>
                                <td width="4%"></td>
                                <td width="20%">Referencia</td>
                                <td width="28%"><input NAME="areferencia" type="text" class="cajaMedia" id="areferencia" maxlength="12" readonly value="<?= $rsordenes[5] ?>"></td>
                            </tr>
                            <tr>
                                <td width="20%">Proveedor</td>
                                <td colspan="2"><input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly value="<?= $rsordenes[13] ?>"></td>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                        <hr>
                        <div id="lineas_doc">
                            <form enctype="multipart/form-data" class="formulario" id="formulario" name="formulario" target="contenedor_subir_archivo" action="guardar_documento.php" method="post">
                                <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                    <tr>
                                        <td width="20%">PDF Orden</td>
                                        <td width="20%"><input type="file" id="pdforden" name="pdforden" /></td>
                                        <td width="4%"></td>
                                        <td width="20%">Denominacion (*)</td>
                                        <td width="28%"><input type="text" name="dendoc" id="dendoc" class="cajaMedia" maxlength="80"></td>
                                        <td width="8%"><img src="../img/disco.png" width="16" height="16" id="guardando" border="0" title="Guardar"></td>
                                    <input type="hidden" id="idpago" name="idpago" value="<?= $idpago ?>"></input>
                                    <input type="hidden" id="ejerciciopago" name="ejerciciopago" value="<?= $ejercicio ?>"></input>
                                    </tr>
                                </table>
                                <hr>
                                <div id="respuesta"></div>
                                <iframe frameborder="0" width="100%" name="contenedor_subir_archivo" style="display: block">
                                </iframe>
                            </form>
                        </div>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor = cursor">
                    </div>
                </div>
            </div>
    </body>
</html>
