<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.envios.php");
include ("../clases/class.proveedores.php");
include ("../funciones/fechas.php");

$envios = new envios();
$proveedores = new proveedores();

$codigo = $_GET["codigo"];

$resultado = $proveedores->buscar('', '');
$row = $envios->select($codigo);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
        <script type="text/javascript" src="../funciones/validar.js"></script>
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script language="javascript">
		
            function cancelar() {
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
		
            function limpiar() {
                document.getElementById("formulario").reset();
            }
            
            function cerrar() {
                document.getElementById("capaproveedores").style.display='none';
                document.getElementById("bgtransparent").style.display='none';
            }
            
            function validacion() {
                if (document.getElementById("nidproveedor").value=="") {
                    alert ("Debe seleccionar un proveedor")
                } else {
                    document.getElementById('formulario').submit()
                }
            }
            
            function sel_proveedor(idproveedor,nombreproveedor,cpproveedor,direccion,poblacion,provincia,cif) {
                cerrar();
                document.getElementById("nidproveedor").value=idproveedor;
                document.getElementById("anombreproveedor").value=nombreproveedor;
                document.getElementById("cpproveedor").value=cpproveedor;
                document.getElementById("direccion").value=direccion;
                document.getElementById("poblacion").value=poblacion;
                document.getElementById("provincia").value=provincia;
                document.getElementById("cif").value=cif;
            }
            
            $(document).ready(function() {
                $("#lupa").click(function () {
                    document.getElementById("bgtransparent").style.display='block';
                    document.getElementById("capaproveedores").style.display='block';
                }); 
            });
                        
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">MODIFICAR ENVIO CERTIFICADO</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php" enctype="multipart/form-data">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td width="20%">Fecha Envio (*)</td>
                                    <td width="80%"><input id="fechaenvio" type="text" class="cajaPequenaR" NAME="fechaenvio" maxlength="10" readonly value="<?= implota($row[1]) ?>"><img src="../img/calendario.png" name="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                        <script type="text/javascript">
                                            Calendar.setup(
                                            {
                                                inputField : "fechaenvio",
                                                ifFormat   : "%d/%m/%Y",
                                                button     : "Image1"
                                            }
                                        );
                                        </script></td>
                                </tr>
                                <tr>
                                    <td>Proveedor</td>
                                    <td><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" id="lupa" name="lupa" title="Seleccionar proveedor" vertical-align="baseline"></a>&nbsp;&nbsp;&nbsp;<input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly value="<?= $row[4] ?>">
                                        <input type="hidden" name="nidproveedor" id="nidproveedor" class="cajaPequenaR" value="<?= $row[2] ?>"></td>
                                </tr>
                                <tr>
                                    <td>CIF</td>
                                    <td><input NAME="cif" type="text" class="cajaMedia" id="cif" maxlength="20" value="<?= $row[8] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Direccion</td>
                                    <td><input NAME="direccion" type="text" class="cajaExtraGrande" id="direccion" maxlength="100" value="<?= $row[5] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Codigo postal</td>
                                    <td><input NAME="cpproveedor" type="text" class="cajaPequena" id="cpproveedor" maxlength="5" value="<?= $row[3] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Poblacion</td>
                                    <td><input NAME="poblacion" type="text" class="cajaExtraGrande" id="poblacion" maxlength="50" value="<?= $row[6] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Provincia</td>
                                    <td><input NAME="provincia" type="text" class="cajaExtraGrande" id="provincia" maxlength="50" value="<?= $row[7] ?>"></td>
                                </tr>
                                <td>Cod. Envio (*)</td>
                                <td><input NAME="codigocer" type="text" class="cajaMedia" id="codigocer" maxlength="30" value="<?= $row[9] ?>"></td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validacion()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
                                <input id="id" name="id" value="<?= $codigo ?>" type="hidden">
                                <input id="accion" name="accion" value="modificar" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="bgtransparent" class="bgtransparent"></div>
            <div id="capaproveedores" class="capaproveedores"><?php include_once("rejilla_proveedores.php") ?></div>
    </body>
</html>
