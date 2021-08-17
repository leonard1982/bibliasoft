<style>
    .mensaje {
        background-color: #666666;
        font-family: helvetica;
        font-size:8pt;
        color:#fff;
        text-align:center;
        font-weight:bold;
        height:20px;
        vertical-align:middle;
        text-transform:uppercase;
    }
</style>
<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.ordenes.php");
include_once ("../clases/class.vencimientos.php");
include ("../funciones/fechas.php");

$ordenes = new ordenes();
$vencimientos = new vencimientos();

$idpago = $_GET["codigo"];
$ejercicio = $_GET["ejercicio"];

$cabecera2 = "ORDEN DE PAGO -- VENCIMIENTOS";
$rsordenes = $ordenes->select($idpago, $ejercicio);
$rsvencimientos = $vencimientos->listar($idpago, $ejercicio);
?>

<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
        <script language="javascript">
            

            function aceptar() {
                document.getElementById("formulario").submit();
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
                        <div id="lineas_ven">
                            <form class="formulario" id="formulario" name="formulario" action="guardar_pago_vencimientos.php" method="post">
                                <table width="100%" border="0">
                                    <tr class="mensaje">
                                        <td width="15%">Codigo</td>
                                        <td width="15%">Fecha</td>
                                        <td width="15%">Importe</td>
                                        <td width="40%">Forma de pago</td>
                                        <td width="15%">Fecha pago</td>
                                    </tr>
                                    <?php
                                    while ($rowv = mysql_fetch_row($rsvencimientos)) {
                                        echo "<tr><td align='center'><input type='text' class='cajaPequenaR' value='" . $rowv[1] . "/" . $rowv[0] . "' readonly></td>";
                                        echo "<td align='center'><input type='text' class='cajaPequenaR' value='" . implota($rowv[4]) . "' readonly></td>";
                                        echo "<td align='center'><input type='text' class='cajaPequenaR' value='" . $rowv[6] . "' readonly></td>";
                                        echo "<td align='center'><input type='text' class='cajaGrande' value='" . $rowv[12] . "' readonly></td>";
                                        if ($rowv[16]!="") { $fecha=implota($rowv[16]); } else { $fecha=""; }
                                        ?>
                                        <td align="center"><input id="afechapago-<?= $rowv[1] . "-" . $rowv[0]?>" type="text" class="cajaPequenaR" NAME="afechapago-<?= $rowv[1] . "-" . $rowv[0]?>" maxlength="10" readonly value="<?= $fecha?>"><img src="../img/calendario.png" name="Image1-<?= $rowv[1] . "-" . $rowv[0]?>" width="16" height="16" border="0" id="Image1-<?= $rowv[1] . "-" . $rowv[0]?>" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                        <script type="text/javascript">
                                            Calendar.setup(
                                            {
                                                inputField : "afechapago-<?= $rowv[1] . "-" . $rowv[0]?>",
                                                ifFormat   : "%d/%m/%Y",
                                                button     : "Image1-<?= $rowv[1] . "-" . $rowv[0]?>"
                                            }
                                        );
                                        </script>
                                        </td>
                                        <?php
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                                <input type="hidden" name="contador" id="contador" value="<?=$contador?>">
                                <input type="hidden" name="idpago" id="idpago" value="<?=$idpago?>">
                                <input type="hidden" name="ejercicio" id="idejercicio" value="<?=$ejercicio?>">
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
