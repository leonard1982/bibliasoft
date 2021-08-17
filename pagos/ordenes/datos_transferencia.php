<?php
include_once("../clases/class.transferencias.php");
include_once("../funciones/fechas.php");

$transferencias = new transferencias();

$numero=$_GET["numero"];
$ejercicio=$_GET["ejercicio"];

$rst=$transferencias->listar($numero,$ejercicio);
?>
<html>
    <head>
        <title>Datos de la transferencia</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">DATOS DE LA TRANSFERENCIA</div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                <td width="30%">Reg. Transferencia</td>
                                <td width="70%"><input type="text" class="cajaPequena" readonly value="<?=$rst[1]."/".$rst[0]?>"></td>
                            </tr>
                            <tr>
                                <td>Reg. Vencimiento</td>
                                <td><input type="text" class="cajaPequena" readonly value="<?=$rst[2]."/".$rst[3]?>"></td>
                            </tr>
                            <tr>
                                <td>Fecha</td>
                                <td><input type="text" class="cajaPequena" readonly value="<?=implota($rst[4])?>"></td>
                            </tr>
                            <tr>
                                <td>Proveedor</td>
                                <td><input type="text" class="cajaGrande" readonly value="<?=$rst[14]?>"></td>
                            </tr>
                            <tr>
                                <td>Cuenta origen</td>
                                <td><input type="text" class="cajaMedia" readonly value="<?=$rst[7]?>"></td>
                            </tr>
                            <tr>
                                <td>Entidad origen</td>
                                <td><input type="text" class="cajaGrande" readonly value="<?='['.$rst[15].'] '.$rst[16]?>"></td>
                            </tr>
                            <tr>
                                <td>Sucursal origen</td>
                                <td><input type="text" class="cajaGrande" readonly value="<?='['.$rst[17].'] '.$rst[18]?>"></td>
                            </tr>
                            <tr>
                                <td>Cuenta destino</td>
                                <td><input type="text" class="cajaMedia" readonly value="<?=$rst[12]?>"></td>
                            </tr>
                            <tr>
                                <td>Entidad destino</td>
                                <td><input type="text" class="cajaGrande" readonly value="<?='['.$rst[19].'] '.$rst[20]?>"></td>
                            </tr>
                            <tr>
                                <td>Sucursal destino</td>
                                <td><input type="text" class="cajaGrande" readonly value="<?='['.$rst[21].'] '.$rst[22]?>"></td>
                            </tr>
                            <tr>
                                <td>Importe</td>
                                <td><input type="text" class="cajaPequena" readonly value="<?=$rst[6]?>"></td>
                            </tr>
                            <tr>
                                <td>Num. Facturas</td>
                                <td><input type="text" class="cajaPequena" readonly value="<?=$rst[13]?>"></td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botoncerrar.jpg" width="70" height="22" onClick="window.close()" border="1" onMouseOver="style.cursor = cursor">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>