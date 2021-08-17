<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.formapago.php");

$codigo = $_GET["codigo"];

$formapago = new formapago();

$row = $formapago->select($codigo);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../funciones/validar.js"></script>
        <script language="javascript">
		
            function cancelar() {
                location.href="index.php";
            }
		
            function formatear(valor) {
                var valor = valor.replace(",",".");
                document.getElementById("descuento").value=valor;	
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
                    <div id="tituloForm" class="header">MODIFICAR FORMA DE PAGO</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="3"><ul id="lista-errores"></ul></td>
                                </tr>		
                                <tr>
                                    <td width="14%">Denominacion</td>
                                    <td width="36%"><input NAME="Adenominacion" type="text" class="cajaGrandeR" id="denominacion" maxlength="50" value="<?= $row[1] ?>" readonly></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Prefijo (*)</td>
                                    <td width="36%"><select name="Aprefijo" id="Aidprefijo" class="comboPequeno" disabled>
                                            <?php if ($row[4]=="T") { ?><option value="T" selected>T</option><?php } else { ?><option value="T">T</option><?php } ?>
                                            <?php if ($row[4]=="P") { ?><option value="P" selected>P</option><?php } else { ?><option value="P">P</option><?php } ?>
                                            <?php if ($row[4]=="E") { ?><option value="E" selected>E</option><?php } else { ?><option value="E">E</option><?php } ?>
                                            <?php if ($row[4]=="R") { ?><option value="R" selected>R</option><?php } else { ?><option value="R">R</option><?php } ?>
                                        </select></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Dias</td>
                                    <td width="36%"><input NAME="ndias" type="text" class="cajaPequena" id="dias" maxlength="5" value="<?= $row[2] ?>"></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Descuento</td>
                                    <td width="36%"><input NAME="qdcto" type="text" class="cajaPequena" id="descuento" maxlength="5" value="<?= $row[3] ?>" onBlur="javascript:formatear(this.value)"></td>
                                    <td width="50%"></td>
                                </tr>						
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
                                <input id="id" name="id" value="<?= $codigo ?>" type="hidden">
                                <input id="accion" name="accion" value="modificar" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
