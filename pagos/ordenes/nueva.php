<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.proveedores.php");
include ("../clases/class.formapago.php");
include ("../clases/class.monedas.php");
include ("../clases/class.ejercicios.php");

$proveedores = new proveedores();
$formapago = new formapago();
$monedas = new monedas();
$ejercicios = new ejercicios();

$resultado = $proveedores->buscar('', '');

$rsfp = $formapago->llenar_combo_formapago();
$rsmonedas = $monedas->llenar_combo_monedas();
$rsejercicios = $ejercicios->ejercicio_activo();
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
            
            function esReal(strNumero){
                regexp = /^-?\d+(\.\d+)?$/;
                return regexp.test(strNumero);
            }
            
            function formatear_numero_entero(objeto) {
                var obj = document.getElementById(objeto);
                var valor=obj.value;
                if( valor.search('^-?[0-9]+$') != -1 ) {
                    
                } else {
                    obj.value=0;
                }
            }
            
            function formatear_objeto(objeto) {
                var obj = document.getElementById(objeto);
                var valor=obj.value;
                var cambio=valor.replace(",",".");
                if(esReal(cambio)==true) {
                    obj.value=cambio;
                } else {
                    obj.value=0;
                }
            }
            
            function formatear_objeto_entero(objeto) {
                var obj = document.getElementById(objeto);
                var valor=obj.value;
                var cambio=valor.replace(",",".");
                if( cambio.search('[^0-9.]') == -1 ) {
                    obj.value=cambio;
                } else {
                    obj.value=0;
                }
            }
            
            function formatear_numero(numero) {
                var cambio=numero.replace(",","");
                return cambio;
            }
            
            function cerrar() {
                document.getElementById("capaproveedores").style.display='none';
                document.getElementById("bgtransparent").style.display='none';
            }
            
            function validacion() {
                if (document.getElementById("nidproveedor").value=="") {
                    alert ("Debe seleccionar un proveedor")
                } else {  
                    if (document.getElementById("prefijo").value=="0") {
                        alert ("Debe seleccionar una forma de pago")
                    } else {
                        if (document.getElementById("nidmoneda").value=="0") {
                            alert ("Debe seleccionar una moneda") 
                        } else {
                            document.getElementById('formulario').submit()
                        }
                    }    
                }
            }
            
            function sel_proveedor(idproveedor,nombreproveedor,fpproveedor,monproveedor,retproveedor,referencia) {
                cerrar();
                document.getElementById("nidproveedor").value=idproveedor;
                document.getElementById("anombreproveedor").value=nombreproveedor;
                document.getElementById("nidmoneda").value=monproveedor;
                document.getElementById("prefijo").value=fpproveedor;
                document.getElementById("areferencia").value=referencia;
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
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">INSERTAR ORDEN DE PAGO</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php" enctype="multipart/form-data">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td width="20%">Ejercicio (*)</td>
                                    <td width="28"><input type="text" id="nejercicio" name="nejercicio" class="cajaPequenaR" value="<?= $rsejercicios[1] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <?php
                                    $hoy = date("d/m/Y");
                                    ?>
                                    <td width="20%">Fecha Orden Pago (*)</td>
                                    <td width="28%"><input id="afechaorden" type="text" class="cajaPequenaR" NAME="afechaorden" maxlength="10" readonly value="<?= $hoy ?>"><img src="../img/calendario.png" name="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                        <script type="text/javascript">
                                            Calendar.setup(
                                            {
                                                inputField : "afechaorden",
                                                ifFormat   : "%d/%m/%Y",
                                                button     : "Image1"
                                            }
                                        );
                                        </script></td>
                                </tr>
                                <tr>
                                    <td width="20%">Importe</td>
                                    <td width="28%"><input NAME="aimporte" type="text" class="cajaMediaR" id="aimporte" maxlength="12" onblur="javascript:formatear_objeto('aimporte')" readonly></td>
                                    <td width="4%"></td>
                                    <td width="20%">Referencia</td>
                                    <td width="28%"><input NAME="areferencia" type="text" class="cajaMediaR" id="areferencia" maxlength="12" readonly></td>
                                </tr>
                                <tr>
                                    <td width="20%">Proveedor</td>
                                    <td colspan="2"><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" id="lupa" name="lupa" title="Seleccionar proveedor" vertical-align="baseline"></a>&nbsp;&nbsp;&nbsp;<input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly></td>
                                    <td colspan="2"><input type="hidden" name="nidproveedor" id="nidproveedor" class="cajaPequenaR"></td>
                                </tr>
                                <tr>
                                    <td>Observaciones</td>
                                    <td colspan="4"><textarea class="area" name="aobservaciones" id="aobservaciones"></textarea></td>
                                </tr>
                                <tr>
                                    <td width="20%">Situacion carga de pago</td>
                                    <td width="28%"><select id="asituacion" name="asituacion" class="comboMedio">
                                            <option value="0" selected>Sin imprimir</option>
                                            <option value="1">Impresa</option>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%"></td>
                                    <td width="28%"></td>

                                </tr>
                                <tr>
                                    <td>Forma de pago (*)</td>
                                    <td><select name="prefijo" id="prefijo" class="comboPequeno">
                                            <option value="0">--</option>
                                            <option value="T">T</option>
                                            <option value="P">P</option>
                                            <option value="E">E</option>
                                            <option value="R">R</option>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Moneda</td>
                                    <td width="28%"><select id="nidmoneda" name="nidmoneda" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowm = mysql_fetch_row($rsmonedas)) { ?>
                                                <option value="<?= $rowm[0] ?>"><?= $rowm[1] ?></option>
                                            <?php } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td width="20%">Numero Facturas</td>
                                    <td width="28%"><input NAME="anumfacturas" type="text" class="cajaPequenaR" id="anumfacturas" maxlength="12" onblur="javascript:formatear_numero_entero('anumfacturas')" readonly></td>
                                    <td width="4%"></td>
                                    <td width="20%">Numero vencimientos</td>
                                    <td width="28%"><input NAME="anumvencimientos" type="text" class="cajaPequenaR" id="anumvencimientos" maxlength="12" onblur="javascript:formatear_numero_entero('anumvencimientos')" readonly></td>
                                </tr>
<!--                                <tr>
                                    <td>PDF Orden</td>
                                    <td><input type="file" id="pdforden" name="pdforden" /></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>-->
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <input type="hidden" name="id" id="id" value="">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="javascript:validacion()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
                                <input id="accion" name="accion" value="alta" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="bgtransparent" class="bgtransparent"></div>
            <div id="capaproveedores" class="capaproveedores"><?php include_once("rejilla_proveedores.php") ?></div>
    </body>
</html>
