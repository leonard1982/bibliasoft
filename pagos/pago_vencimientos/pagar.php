<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.vencimientos.php");
include_once ("../funciones/fechas.php");

$ejercicio = $_GET["ejercicio"];
$numero = $_GET["numero"];

$vencimientos = new vencimientos();

$row = $vencimientos->select($ejercicio,$numero);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
        <script language="javascript">
		
            function cancelar() {
                location.href="index.php";
            }
            
            function validar() {
                document.getElementById("formulario").submit();
            }
		
            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor='hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor='pointer';
            }
		
            function limpiar() {
                document.getElementById("formulario").reset();
            }
		
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">PAGO VENCIMIENTO</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>		
                                <tr>
                                    <td width="30%">Num. Vencimiento</td>
                                    <td width="70%"><input NAME="nvto" type="text" class="cajaPequenaR" id="nvto" maxlength="50" value="<?= $row[1]."/".$row[0] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="30%">Proveedor</td>
                                    <td width="70%"><input NAME="proveedor" type="text" class="cajaGrandeR" id="proveedor" maxlength="50" value="<?= $row[10] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="30%">Importe</td>
                                    <td width="70%"><input NAME="importe" type="text" class="cajaPequenaR" id="importe" maxlength="50" value="<?= number_format($row[6],2,",",".") ?>"></td>
                                </tr>
                                <tr>
                                    <td width="30%">Forma de pago</td>
                                    <td width="70%"><input NAME="prefijo" type="text" class="cajaPequenaR" id="prefijo" maxlength="50" value="<?= $row[15] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="30%">Dias Vto.</td>
                                    <td width="70%"><input NAME="diasvto" type="text" class="cajaPequenaR" id="diasvto" maxlength="50" value="<?= $row[13] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="30%">Fecha Vto.</td>
                                    <td width="70%"><input NAME="fechavto" type="text" class="cajaPequenaR" id="fechavto" maxlength="50" value="<?= implota($row[14]) ?>"></td>
                                </tr>
                                <?php
                                    $hoy = date("d/m/Y");
                                    ?>
                                <tr>
                                    <td width="30%">Fecha Pago</td>
                                    <td width="70%"><input NAME="fechapago" type="text" class="cajaPequena" id="fechapago" maxlength="12" value="<?= $hoy ?>"><img src="../img/calendario.png" name="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                        <script type="text/javascript">
                                            Calendar.setup(
                                            {
                                                inputField : "fechapago",
                                                ifFormat   : "%d/%m/%Y",
                                                button     : "Image1"
                                            }
                                        );
                                        </script></td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
                                <input id="ejercicio" name="ejercicio" value="<?= $ejercicio ?>" type="hidden">
                                <input id="numero" name="numero" value="<?=$numero?>" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
