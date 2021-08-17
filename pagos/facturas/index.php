<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include ("../clases/class.proveedores.php");
include ("../clases/class.ejercicios.php");

$proveedores = new proveedores();
$ejercicios = new ejercicios();

$resultado = $proveedores->buscar('', '');
$rsejercicios = $ejercicios->buscar('');
?>
<html>
    <head>
        <title>Facturas</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script language="javascript">
		
            function inicio() {
                document.getElementById("form_busqueda").submit();
            }
            function nueva() {
                location.href="nueva.php";
            }
		
            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor='hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor='pointer';
            }
		
            function buscar() {
                document.getElementById("form_busqueda").submit();
            }
			
            function limpiar() {
                document.getElementById("anombreproveedor").value="";
                document.getElementById("nidproveedor").value="";
                document.getElementById("ejercicio").selectedIndex=0;
                document.getElementById("procesadas").selectedIndex=0;
            }
            
            function cerrar() {
                document.getElementById("capaproveedores").style.display='none';
                document.getElementById("bgtransparent").style.display='none';
            }
            
            function sel_proveedor(idproveedor,nombreproveedor) {
                cerrar();
                document.getElementById("nidproveedor").value=idproveedor;
                document.getElementById("anombreproveedor").value=nombreproveedor;
            }
            
            $(document).ready(function() {
                $("#lupa").click(function () {
                    document.getElementById("bgtransparent").style.display='block';
                    document.getElementById("capaproveedores").style.display='block';
                });
                $("#btbuscar").click(function () {
                    valor=$("#nameprov").val();
                    $.post("obtener_proveedores.php", { valor: valor }, function(data){
                            $("#rejillaprov").html(data);
                        });
                });
            });
        </script>
    </head>
    <body onLoad="inicio()">
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">Buscar FACTURAS</div>
                    <div id="frmBusqueda">
                        <form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
                                <tr>
                                    <td>Nombre proveedor</td>
                                    <td><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" id="lupa" name="lupa" title="Seleccionar proveedor" vertical-align="baseline"></a>&nbsp;&nbsp;&nbsp;<input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly value="<?=$_SESSION['mantfacnom']?>"></td>
                                    <td><input type="hidden" name="nidproveedor" id="nidproveedor" class="cajaPequenaR" value="<?=$_SESSION['mantfacidpro']?>"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Ejercicio</td>
                                    <td><select id="ejercicio" name="ejercicio" class="comboPequeno">
                                            <option value="0">Todos</option>
                                            <?php
                                            if (isset($_SESSION['mantfaceje'])) {
                                                while ($rowe = mysql_fetch_row($rsejercicios)) {
                                                    if ($rowe[1] == $_SESSION['mantfaceje']) {
                                                        ?>
                                                        <option value="<?= $rowe[1] ?>" selected><?= $rowe[1] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowe[1] ?>"><?= $rowe[1] ?></option>
                                                        <?php
                                                    }
                                                }
                                            } else {
                                                while ($rowe = mysql_fetch_row($rsejercicios)) {
                                                    if ($rowe[2] == 1) {
                                                        ?>
                                                        <option value="<?= $rowe[1] ?>" selected><?= $rowe[1] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowe[1] ?>"><?= $rowe[1] ?></option>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?></select></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Procesadas</td>
                                    <td><select id="procesadas" name="procesadas" class="comboMedio">
                                            <?php if ($_SESSION['mantfacpro'] == "") { ?><option value="" selected>Todas</option><?php } else { ?><option value="">Todas</option><?php } ?>
                                            <?php if ($_SESSION['mantfacpro'] == "0") { ?><option value="0" selected>No procesadas</option><?php } else { ?><option value="0">No procesadas</option><?php } ?>
                                            <?php if ($_SESSION['mantfacpro'] == "1") { ?><option value="1" selected>Procesadas</option><?php } else { ?><option value="1">Procesadas</option><?php } ?>
                                        </select></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="bgtransparent" class="bgtransparent"></div>
                            <div id="capaproveedores" class="capaproveedores"><?php include_once("rejilla_proveedores.php") ?></div>
                            <div id="botonBusqueda">
                                <img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
                                <?php if ($permisos == 'escritura') { ?>
                                    <img src="../img/boton_nuevo.jpg" width="70" height="22" border="1" onClick="nueva()" onMouseOver="style.cursor=cursor">
                                <?php } ?>
                            </div>
                            <div id="lineaResultado">
                                <iframe width="100%" height="350" id="frame_rejilla" name="frame_rejilla" frameborder="0" scrolling="no">
                                <ilayer width="100%" height="350" id="frame_rejilla" name="frame_rejilla"></ilayer>
                                </iframe>
                            </div>
                    </div>
                </div>			
            </div>
    </body>
</html>