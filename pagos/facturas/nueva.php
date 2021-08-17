<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.proveedores.php");
include ("../clases/class.formapago.php");
include ("../clases/class.monedas.php");
include ("../clases/class.tipoiva.php");
include ("../clases/class.centroscoste.php");
include ("../clases/class.ejercicios.php");

$proveedores = new proveedores();
$formapago = new formapago();
$monedas = new monedas();
$tipoiva = new tipoiva();
$centroscoste = new centroscoste();
$ejercicios = new ejercicios();



$rsfp = $formapago->llenar_combo_formapago();
$rsmonedas = $monedas->llenar_combo_monedas();
$rstipoiva = $tipoiva->llenar_combo_tiposiva();
$rscc = $centroscoste->llenar_combo_centroscoste();
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
            
            function calcular_linea(objeto1,objeto2,objeto3) {
                var base=document.getElementById(objeto1);
                var valor=base.value;
                var valor1=formatear_numero(valor);
                var poriva=document.getElementById(objeto2);
                var valor2=poriva.value;
                var result=Math.round(valor1*valor2)/100;
                var resultado=document.getElementById(objeto3);
                resultado.value=result;
                calcular_total();
            }
            
            function calcular_total() {
                if (document.getElementById('qcuotaiva1').value=="") { var valor1=0; } else { var valor1=Math.round(parseFloat(document.getElementById('qcuotaiva1').value)*100)/100; }
                if (document.getElementById('qcuotaiva2').value=="") { var valor2=0; } else { var valor2=Math.round(parseFloat(document.getElementById('qcuotaiva2').value)*100)/100; }
                if (document.getElementById('qcuotaiva3').value=="") { var valor3=0; } else { var valor3=Math.round(parseFloat(document.getElementById('qcuotaiva3').value)*100)/100; }
                if (document.getElementById('qcuotaiva4').value=="") { var valor4=0; } else { var valor4=Math.round(parseFloat(document.getElementById('qcuotaiva4').value)*100)/100; }
                var impuestos=parseFloat(valor1+valor2+valor3+valor4);
                
                if (document.getElementById('qbimp1').value=="") { var valor11=0; } else { var valor11=Math.round(parseFloat(document.getElementById('qbimp1').value)*100)/100; }
                if (document.getElementById('qbimp2').value=="") { var valor12=0; } else { var valor12=Math.round(parseFloat(document.getElementById('qbimp2').value)*100)/100; }
                if (document.getElementById('qbimp3').value=="") { var valor13=0; } else { var valor13=Math.round(parseFloat(document.getElementById('qbimp3').value)*100)/100; }
                if (document.getElementById('qbimp4').value=="") { var valor14=0; } else { var valor14=Math.round(parseFloat(document.getElementById('qbimp4').value)*100)/100; }
                var suma1=parseFloat(valor11+valor12+valor13+valor14+impuestos);
                var resultado1=Math.round(suma1*100)/100;
                document.getElementById('rtotalfacs').value=resultado1;
                
                if (document.getElementById('rtotalfacs').value == "") { var importe = 0; } else { var importe = Math.round(parseFloat(document.getElementById('rtotalfacs').value)*100)/100; }
                if (document.getElementById('qtotalret').value=="") { var valor5=0; } else { var valor5=Math.round(parseFloat(document.getElementById('qtotalret').value)*100)/100; }
                if (document.getElementById('pcuenta').value=="") { var valor6=0; } else { var valor6=Math.round(parseFloat(document.getElementById('pcuenta').value)*100)/100; }
                var suma=parseFloat(importe);
                var resultado=Math.round(suma*100)/100;
                var resultadof = parseFloat(resultado)-parseFloat(valor5)-parseFloat(valor6);
                var resultadof=Math.round(resultadof*100)/100;
                document.getElementById('atotalcon').value=resultadof;
            }
            
            function calcular_retencion() {
                if (document.getElementById('qbiret').value=="") { var valor1=0; } else { var valor1=parseFloat(document.getElementById('qbiret').value); }
                if (document.getElementById('qporcret').value=="") { var valor2=0; } else { var valor2=parseFloat(document.getElementById('qporcret').value); }
                var resultado=Math.round(valor1*valor2)/100;
                document.getElementById('qtotalret').value=resultado; 
                calcular_total();
            }
            
            function cerrar() {
                document.getElementById("capaproveedores").style.display='none';
                document.getElementById("bgtransparent").style.display='none';
            }
            
            function sel_proveedor(idproveedor,nombreproveedor,fpproveedor,monproveedor,retproveedor,telefono,contacto) {
                cerrar();
                document.getElementById("acontacto").value=contacto;
                document.getElementById("atelefono").value=telefono;
                document.getElementById("nidproveedor").value=idproveedor;
                document.getElementById("anombreproveedor").value=nombreproveedor;
                document.getElementById("qporcret").value=retproveedor;
                document.getElementById("nidmoneda").value=monproveedor;
                document.getElementById("nidfp").value=fpproveedor; 
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
                $("#ntipoiva1").change(function () {
                    $("#ntipoiva1 option:selected").each(function () {
                        elegido1=$(this).val();
                        $.post("obtener_tasasiva.php", { elegido: elegido1 }, function(data){
                            $("#tasaiva1").html(data);
                        });     
                    });
                });
                $("#ntipoiva2").change(function () {
                    $("#ntipoiva2 option:selected").each(function () {
                        elegido1=$(this).val();
                        $.post("obtener_tasasiva.php", { elegido: elegido1 }, function(data){
                            $("#tasaiva2").html(data);
                        });     
                    });
                }); 
                $("#ntipoiva3").change(function () {
                    $("#ntipoiva3 option:selected").each(function () {
                        elegido1=$(this).val();
                        $.post("obtener_tasasiva.php", { elegido: elegido1 }, function(data){
                            $("#tasaiva3").html(data);
                        });     
                    });
                }); 
                $("#ntipoiva4").change(function () {
                    $("#ntipoiva4 option:selected").each(function () {
                        elegido1=$(this).val();
                        $.post("obtener_tasasiva.php", { elegido: elegido1 }, function(data){
                            $("#tasaiva4").html(data);
                        });     
                    });
                });
            });
                        
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">INSERTAR FACTURA</div>
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
                                    <td width="20%">Fecha Factura Prov. (*)</td>
                                    <td width="28%"><input id="afechafactura" type="text" class="cajaPequenaR" NAME="afechafactura" maxlength="10" readonly value="<?= $hoy ?>"><img src="../img/calendario.png" name="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                        <script type="text/javascript">
                                            Calendar.setup(
                                            {
                                                inputField : "afechafactura",
                                                ifFormat   : "%d/%m/%Y",
                                                button     : "Image1"
                                            }
                                        );
                                        </script></td>
                                </tr>
                                <tr>
                                    <td width="20%">Num. Factura Prov.</td>
                                    <td width="28%"><input NAME="anumfactura" type="text" class="cajaMedia" id="anumfactura" maxlength="10"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Ref. Factura Prov.</td>
                                    <td width="28%"><input NAME="areffactura" type="text" class="cajaMedia" id="areffactura" maxlength="10"></td>
                                </tr>
                                <tr>
                                    <td>Descripcion Factura</td>
                                    <td colspan="4"><input NAME="adescfactura" type="text" class="cajaExtraGrande" id="adescfactura" maxlength="150"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Procesada</td>
                                    <td width="28%"><select id="aprocesada" name="aprocesada" class="comboPequeno">
                                            <option value="0" selected>No</option>
                                            <option value="1">Si</option>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Centro de Coste</td>
                                    <td width="28%"><select id="ncc" name="ncc" class="comboMedio">
                                            <option value="">---</option>
                                            <?php while ($rowcc = mysql_fetch_row($rscc)) { ?>
                                                <option value="<?= $rowcc[0] ?>"><?= $rowcc[1] ?></option>
                                            <?php } ?>
                                        </select></td>
                                </tr>
                            </table>
                            <fieldset>
                                <legend>Datos proveedor</legend>
                                <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                    <tr>
                                        <td width="20%">Proveedor</td>
                                        <td colspan="2"><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" id="lupa" name="lupa" title="Seleccionar proveedor" vertical-align="baseline"></a>&nbsp;&nbsp;&nbsp;<input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly></td>
                                        <td colspan="2"><input type="hidden" name="nidproveedor" id="nidproveedor" class="cajaPequenaR"></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Contacto</td>
                                        <td width="28%"><input NAME="acontacto" type="text" class="cajaGrande" id="acontacto" maxlength="90"></td>
                                        <td width="4%"></td>
                                        <td width="20%">Telefono</td>
                                        <td width="28%"><input NAME="atelefono" type="text" class="cajaMedia" id="atelefono" maxlength="20"></td>
                                    </tr>
                                    <tr>
                                    <td width="20%">Forma de pago</td>
                                    <td width="28%"><select id="nidfp" name="nidfp" class="comboMedio">
                                            <option value="">---</option>
                                            <?php while ($rowf = mysql_fetch_row($rsfp)) { ?>
                                                <option value="<?= $rowf[0] ?>"><?= $rowf[1] ?></option>
                                            <?php } ?>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Moneda</td>
                                    <td width="28%"><select id="nidmoneda" name="nidmoneda" class="comboMedio">
                                            <option value="">---</option>
                                            <?php while ($rowm = mysql_fetch_row($rsmonedas)) { ?>
                                                <option value="<?= $rowm[0] ?>"><?= $rowm[1] ?></option>
                                            <?php } ?>
                                        </select></td>
                                </tr>
                                </table>
                            </fieldset>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>                                
                                <tr>
                                    <td width="20%">Importe Total</td>
                                    <td width="28%"><input NAME="rtotalfacs" type="text" class="cajaMediaR" id="rtotalfacs" maxlength="15" readonly></td>
                                    <td width="4%"></td>
                                    <td>PDF Factura</td>
                                    <td><input type="file" id="pdffactura" name="pdffactura" /></td>
                                </tr>
                                <tr>
                                    <td>Observaciones</td>
                                    <td colspan="4"><textarea class="area" name="aobservaciones" id="aobservaciones"></textarea></td>
                                </tr>
                            </table>
                            <fieldset><legend>Datos impuestos</legend>
                                <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                    <tr>
                                        <td width="25%">Base imponible</td>
                                        <td width="25%">Tipo de IGIC</td>
                                        <td width="25%">Tasa de IGIC</td>
                                        <td width="25%">Cuota IGIC</td>
                                    </tr>
                                    <?php $rstipoiva = $tipoiva->llenar_combo_tiposiva(); ?>
                                    <tr>
                                        <td><input NAME="qbimp1" type="text" class="cajaMedia" id="qbimp1" maxlength="12" onblur="javascript:formatear_objeto('qbimp1')"></td>
                                        <td><select id="ntipoiva1" name="ntipoiva1" class="comboMedio">
                                                <option value="">---</option>
                                                <?php while ($rowtp = mysql_fetch_row($rstipoiva)) { ?>
                                                    <option value="<?= $rowtp[0] ?>"><?= $rowtp[1] ?></option>
                                                <?php } ?>
                                            </select></td>
                                        <td><select name="tasaiva1" id="tasaiva1" class="combopequeno"></select></td>
                                        <td><input NAME="qcuotaiva1" type="text" class="cajaMediaR" id="qcuotaiva1" maxlength="12" reandoly><img src="../img/calculadora.jpg" width="16" height="16" onclick="javascript:calcular_linea('qbimp1','tasaiva1','qcuotaiva1')"></td>
                                    </tr>
                                    <?php $rstipoiva = $tipoiva->llenar_combo_tiposiva(); ?>
                                    <tr>
                                        <td><input NAME="qbimp2" type="text" class="cajaMedia" id="qbimp2" maxlength="12" onblur="javascript:formatear_objeto('qbimp2')"></td>
                                        <td><select id="ntipoiva2" name="ntipoiva2" class="comboMedio">
                                                <option value="">---</option>
                                                <?php while ($rowtp2 = mysql_fetch_row($rstipoiva)) { ?>
                                                    <option value="<?= $rowtp2[0] ?>"><?= $rowtp2[1] ?></option>
                                                <?php } ?>
                                            </select></td>
                                        <td><select name="tasaiva2" id="tasaiva2" class="combopequeno"></select></td>
                                        <td><input NAME="qcuotaiva2" type="text" class="cajaMediaR" id="qcuotaiva2" maxlength="12" readonly><img src="../img/calculadora.jpg" width="16" height="16" onclick="javascript:calcular_linea('qbimp2','tasaiva2','qcuotaiva2')"></td>
                                    </tr>
                                    <?php $rstipoiva = $tipoiva->llenar_combo_tiposiva(); ?>
                                    <tr>
                                        <td><input NAME="qbimp3" type="text" class="cajaMedia" id="qbimp3" maxlength="12" onblur="javascript:formatear_objeto('qbimp3')"></td>
                                        <td><select id="ntipoiva3" name="ntipoiva3" class="comboMedio">
                                                <option value="">---</option>
                                                <?php while ($rowtp3 = mysql_fetch_row($rstipoiva)) { ?>
                                                    <option value="<?= $rowtp3[0] ?>"><?= $rowtp3[1] ?></option>
                                                <?php } ?>
                                            </select></td>
                                        <td><select name="tasaiva3" id="tasaiva3" class="combopequeno"></select></td>
                                        <td><input NAME="qcuotaiva3" type="text" class="cajaMediaR" id="qcuotaiva3" maxlength="12" readonly><img src="../img/calculadora.jpg" width="16" height="16" onclick="javascript:calcular_linea('qbimp3','tasaiva3','qcuotaiva3')"></td>
                                    </tr>
                                    <?php $rstipoiva = $tipoiva->llenar_combo_tiposiva(); ?>
                                    <tr>
                                        <td><input NAME="qbimp4" type="text" class="cajaMedia" id="qbimp4" maxlength="12" onblur="javascript:formatear_objeto('qbimp4')"></td>
                                        <td><select id="ntipoiva4" name="ntipoiva4" class="comboMedio">
                                                <option value="">---</option>
                                                <?php while ($rowtp4 = mysql_fetch_row($rstipoiva)) { ?>
                                                    <option value="<?= $rowtp4[0] ?>"><?= $rowtp4[1] ?></option>
                                                <?php } ?>
                                            </select></td>
                                        <td><select name="tasaiva4" id="tasaiva4" class="combopequeno"></select></td>
                                        <td><input NAME="qcuotaiva4" type="text" class="cajaMediaR" id="qcuotaiva4" maxlength="12" readonly><img src="../img/calculadora.jpg" width="16" height="16" onclick="javascript:calcular_linea('qbimp4','tasaiva4','qcuotaiva4')"></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Base Imp. Retencion</td>
                                        <td width="25%"></td>
                                        <td width="25%">% retencion</td>
                                        <td width="25%">Total retencion</td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><input NAME="qbiret" type="text" class="cajaMedia" id="qbiret" maxlength="10" onblur="javascript:formatear_objeto('qbiret')"></td>
                                        <td width="25%"></td>
                                        <td width="25%"><input NAME="qporcret" type="text" class="cajaPequena" id="qporcret" maxlength="10" onblur="javascript:formatear_objeto('qporcret')"></td>
                                        <td width="25%"><input NAME="qtotalret" type="text" class="cajaMediaR" id="qtotalret" maxlength="10" readonly><img src="../img/calculadora.jpg" width="16" height="16" onclick="javascript:calcular_retencion()"></td></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Pagado a cuenta</td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><input NAME="pcuenta" type="text" class="cajaMedia" id="pcuenta" maxlength="10" onblur="javascript:formatear_objeto('pcuenta')"><img src="../img/calculadora.jpg" width="16" height="16" onclick="javascript:calcular_total()"></td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                        <td width="25%">Importe a pagar</td>
                                        <td width="25%"><input NAME="atotalcon" type="text" class="cajaMediaR" id="atotalcon" maxlength="10" readonly><img src="../img/calculadora.jpg" width="16" height="16" onclick="javascript:calcular_total()"></td></td>
                                    </tr>
                            </fieldset>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <input type="hidden" name="id" id="id" value="">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="javascript:document.getElementById('formulario').submit()" border="1" onMouseOver="style.cursor=cursor">
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
