<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.facturas.php");
include_once ("../clases/class.ordenes.php");

$facturas = new facturas();
$ordenes = new ordenes();

$opciones = $_POST["opcion"];
$idpago = $_POST["idpago"];
$ejerciciopago = $_POST["ejerciciopago"];
$numlinea = 1;
$importe=$_POST["aimporte"];
$numfac=$_POST["anumfac"];

for ($i = 0; $i < count($opciones); $i++) {
    $tab_codigo = explode("#", $opciones[$i]);
    $codfacturap = $tab_codigo[0];
    $ejercicio = $tab_codigo[1];
    $actualizar = $facturas->actualizar_procesadas($codfacturap, $ejercicio, $idpago, $ejerciciopago, $numlinea);
    $numlinea++;
}

$actualizar2 = $ordenes->actualizar_orden($idpago, $ejerciciopago, $importe, $numfac);
$mensaje = "La orden de pago se ha guardado correctamente";

$cabecera2 = "NUEVA ORDEN DE PAGO";
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
                                <td colspan="5" class="mensaje"><?php echo $mensaje; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor = cursor">
                    </div>
                </div>
            </div>
    </body>
</html>
