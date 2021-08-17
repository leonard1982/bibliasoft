<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.ordenes.php");
include ("../clases/class.formapago.php");
include ("../clases/class.entidades.php");
include ("../clases/class.facturas.php");
include ("../clases/class.sucursales.php");
include ("../clases/class.empresa.php");
include ("../funciones/fechas.php");

$ordenes = new ordenes();
$formapago = new formapago();
$entidades = new entidades();
$facturas = new facturas();
$sucursales = new sucursales();
$empresa = new empresa();

$idpago = $_GET["codigo"];
$ejercicio = $_GET["ejercicio"];

$cabecera2 = "ORDEN DE PAGO -- VENCIMIENTOS";
$rsordenes = $ordenes->select($idpago, $ejercicio);
$rsfp = $formapago->llenar_combo_formapago_pre($rsordenes[29]);
$rsentidades = $entidades->llenar_combo_entidades();
$rsentidadesd = $entidades->llenar_combo_entidades();
$rsfacturas = $facturas->listar_facturas_procesadas_ordenpago($idpago, $ejercicio);
$rsempresa = $empresa->select(1);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
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
            
            function cerrar() {
                document.getElementById("capaproveedores").style.display='none';
                document.getElementById("bgtransparent").style.display='none';
            }
            
            function esReal(strNumero){
                regexp = /^-?\d+(\.\d+)?$/;
                return regexp.test(strNumero);
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
            
            function comprobar_fp() {
                if ($("#es_transferencia").val()=="si") {
                    $("#transferencia").show()
                } else {
                    $("#transferencia").hide()
                }
            }
            
            function convertir_fecha(dateobj){
                var year = dateobj.getFullYear();
                var month= ('0' + (dateobj.getMonth()+1)).slice(-2);
                var date = ('0' + dateobj.getDate()).slice(-2);
                var hours = ('0' + dateobj.getHours()).slice(-2);
                var minutes = ('0' + dateobj.getMinutes()).slice(-2);
                var seconds = ('0' + dateobj.getSeconds()).slice(-2);
                var day = dateobj.getDay();
                var months = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
                var dates = ['SUN','MON','TUE','WED','THU','FRI','SAT'];
                var converted_date = '';

                converted_date = date + '/' + month + '/' + year;
                return converted_date;
            }
            
            function cambiar_situacion() {
                if (confirm("Si cambia la situacion a facturado no podra continuar con la edicion de la orden. Desea continuar?"))
                    var idp=document.getElementById("idpago").value;
                var ejercicio=document.getElementById("ejerciciopago").value;
                location.href="cambiar_situacion.php?idpago="+ idp + "&ejercicio=" + ejercicio;
            }
            
            function calcular_importe() {
                if ((document.getElementById("importe").value>0) && (document.getElementById("nidfp").value>0)) {
                    if (document.getElementById('pagado').value>0) {
                        var pagado_ant=Math.round(parseFloat(document.getElementById('pagado').value)*100)/100;
                    } else {
                        var pagado_ant=0;
                    }
                    var deuda=document.getElementById("aimporte").value;
                    var valor=Math.round(parseFloat(document.getElementById('importe').value)*100)/100;
                    var pagado_total=parseFloat(pagado_ant+valor);
                    var total=parseFloat(deuda-pagado_total);
                    document.getElementById("pendiente").value=Math.round(parseFloat(total)*100)/100;
                    document.getElementById("pagado").value=Math.round(parseFloat(pagado_total)*100)/100;
                    var vto=document.getElementById("vencimiento").value;
                    if (vto=="") { vto=0 }
                    var valor1=parseInt(vto);
                    var valor2=parseInt(valor1+1);
                    document.getElementById("vencimiento").value=valor2;
                }
            }
            
            $(document).ready(function() {
                $(document).ready(function(){
                    $("#guardando").click(function(){
                        if ($('#importe').val()=="") {
                            alert ("El campo importe es obligatorio")   
                        } else {
                            if ($('#nidfp').val()=="0") {
                                alert ("Debe seleccionar una forma de pago")
                            } else {
                                if (($('#nidfp').val()=="9") || ($('#nidfp').val()=="10")) {
                                    if (($('#ctaorigen').val()=="") || ($('#nidentidad').val()=="") || ($('#nidsucursal').val()=="") || ($('#ctadestino').val()=="") || ($('#nidentidadd').val()=="") || ($('#nidsucursald').val()=="") ) {
                                        alert ("Debe rellenar los campos de la transferencia")
                                    } else {
                                        $("#formulario").submit();
                                        $('#importe').val('');
                                        $('#diasvto').val('');
                                        $('#fechavto').val('');
                                        $('#nidfp').val('0');
                                        $('#transferencia').hide();
                                    }
                                } else {
                                    $("#formulario").submit();
                                    $('#importe').val('');
                                    $('#nidfp').val('0');
                                    $('#ctaorigen').val('');
                                    $('#nidentidad').val('');
                                    $('#nidsucursal').val('');
                                    $('#ctadestino').val('');
                                    $('#nidentidadd').val('');
                                    $('#nidsucursald').val('');
                                    $('#diasvto').val('');
                                    $('#fechavto').val('');
                                    $('#transferencia').hide();
                                }
                            }
                        }
                    });
                });
                $("#nidentidad").change(function () {
                    $("#nidentidad option:selected").each(function () {
                        elegido3=$(this).val();
                        $.post("obtener_sucursales.php", { elegido3: elegido3 }, function(data){
                            $("#nidsucursal").html(data);
                        });     
                    });
                });
                $("#nidentidadd").change(function () {
                    $("#nidentidadd option:selected").each(function () {
                        elegido4=$(this).val();
                        $.post("obtener_sucursales.php", { elegido3: elegido4 }, function(data){
                            $("#nidsucursald").html(data);
                        });     
                    });
                });
                $("#nidfp").change(function () {
                    $("#nidfp option:selected").each(function () {
                        elegido5=$(this).val();
                        if (elegido5>0) {
                            fe=$("#fecha").val();
                            $("#valorfp").val(elegido5);
                            $("#fechainivto").val(fe);
                            $("#formfp").submit();
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
                                <td width="28%"><input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly value="<?= $rsordenes[13] ?>"></td>
                                <td width="4%"></td>
                                <td width="20%">Vencimientos</td>
                                <td width="28%"><input NAME="vencimiento" type="text" class="cajaPequenaR" id="vencimiento" maxlength="12" readonly value="<?= $rsordenes[11] ?>"></td>
                            </tr>
                            <tr>
                                <td width="20%">Importe pagado</td>
                                <td width="28%"><input NAME="pagado" type="text" class="cajaMediaR" id="pagado" maxlength="12" readonly value="<?= $rsordenes[26] ?>"></td>
                                <td width="4%"></td>
                                <td width="20%">Importe pendiente</td>
                                <td width="28%"><input NAME="pendiente" type="text" class="cajaMediaR" id="pendiente" maxlength="12" readonly value="<?= $rsordenes[27] ?>"></td>
                            </tr>
                            <tr>
                                <td width="20%">Situacion</td>
                                <td width="28%"><select name="situacion" id="situacion" class="comboMedio" onchange="cambiar_situacion()">
                                        <?php if ($rsordenes[28] == 0) { ?><option value="0" selected>Pendiente</option><?php } else { ?><option value="0">Pendiente</option><?php } ?>
                                        <?php if ($rsordenes[28] == 1) { ?><option value="1" selected>Facturada</option><?php } else { ?><option value="1">Facturada</option><?php } ?>
                                    </select>
                                <td></td>
                                <td>Forma de pago</td>
                                <td><input NAME="aformpago" type="text" class="cajaPequena" id="aformpago" maxlength="12" readonly value="<?= $rsordenes[29] ?>"></td>
                            </tr>
                        </table>
                        <hr>
                        <fieldset><legend>Facturas</legend>
                            <div id="lineas_doc">
                                <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                    <tr class="mensaje">
                                        <td width="20%">N. Registro</td>
                                        <td width="20%">N. Factura Prov.</td>
                                        <td width="15%">Fecha</td>
                                        <td width="20%">Total Fact.</td>
                                        <td width="20%">Importe a pagar</td>
                                        <td width="5%"></td>
                                    </tr>
                                    <?php while ($row = mysql_fetch_row($rsfacturas)) { ?>
                                        <tr>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[0] . '/' . $row[1] ?>" readonly>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[2] ?>" readonly></td>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= implota($row[3]) ?>" readonly></td>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[4] ?>" readonly></td>
                                            <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[5] ?>" readonly></td>    
                                            <?php if (file_exists("../facturas/facpdf/" . $row[0] . '-' . $row[1] . ".pdf")) { ?>
                                                <td><a href="../facturas/facpdf/<?= $row[0] . '-' . $row[1] ?>.pdf" target="_blank"><img src="../img/pdf.png" width="16" height="16" border="0"></a></td>
                                            <?php } else { ?>
                                                <td></td>
                                            <?php } ?>
                                        </tr>                                
                                    <?php } ?>
                                </table>
                            </div>
                        </fieldset>
                        <?php
                        $hoy = date("d/m/Y");
                        ?>
                        <fieldset>
                            <legend>Datos vencimientos</legend>
                            <div id="lineas_ven">
                                <form class="formulario" id="formulario" name="formulario" target="contenedor_vencimientos" action="guardar_vencimiento.php" method="post">
                                    <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                        <tr>
                                            <td width="4%">Fecha</td>
                                            <td width="12%"><input id="fecha" type="text" class="cajaPequenaR" NAME="fecha" maxlength="10" readonly value="<?= $hoy ?>"><img src="../img/calendario.png" name="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                                <script type="text/javascript">
                                                    Calendar.setup(
                                                    {
                                                        inputField : "fecha",
                                                        ifFormat   : "%d/%m/%Y",
                                                        button     : "Image1",
                                                        onClose   : function() { 
                                                            var multi=$("#diasvto").val();
                                                            if (multi>0) {
                                                                var fechaaux=$("#fecha").val();
                                                                var f = fechaaux.split("/");
                                                                var dia = f[0];
                                                                var mes = f[1];
                                                                if (mes==1) {
                                                                    mes=12
                                                                } else {
                                                                    mes=mes-1
                                                                }
                                                                var anyo = f[2];
                                                                var miFecha = new Date(anyo, mes, dia);
                                                                var multi=$("#diasvto").val();
                                                                miFecha.setTime(miFecha.getTime()+multi*24*60*60*1000);
                                                                $("#fechavto").val((convertir_fecha(miFecha)));
                                                            }
                                                            this.hide(); }
                                                    }
                                                );
                                                </script></td>
                                            <td width="5%">Importe</td>
                                            <td width="8%"><input type="text" name="importe" id="importe" class="cajaPequena" onblur="javascript:formatear_objeto('importe')"></td>
                                            <td width="10%">Forma pago</td>
                                            <td width="20%"><select id="nidfp" name="nidfp" class="comboMedio" onchange="comprobar_fp()">
                                                    <option value="0">---</option>
                                                    <?php while ($rowf = mysql_fetch_row($rsfp)) { ?>
                                                        <option value="<?= $rowf[0] ?>"><?= $rowf[1] ?></option>
                                                        <?php
                                                        if ($rowf[2] == "T") {
                                                            $es_transferencia = "si";
                                                        } else {
                                                            $es_transferencia = "no";
                                                        }
                                                    }
                                                    ?>
                                                </select></td>
                                        <input type="hidden" name="es_transferencia" id="es_transferencia" value="<?= $es_transferencia ?>">
                                        <td width="9%">Dias Vto.</td>
                                        <td width="10%"><input type="text" name="diasvto" id="diasvto" class="cajaPequenaR" readonly></td>
                                        <td width="9%">Fecha Vto.</td>
                                        <td width="10%"><input type="text" name="fechavto" id="fechavto" class="cajaPequenaR" readonly></td>
                                        <td width="3%"><img src="../img/disco.png" width="16" height="16" id="guardando" border="0" title="Guardar" onclick="calcular_importe()"></td>
                                        <input type="hidden" id="idpago" name="idpago" value="<?= $idpago ?>"></input>
                                        <input type="hidden" id="ejerciciopago" name="ejerciciopago" value="<?= $ejercicio ?>"></input>
                                        <input type="hidden" id="idproveedor" name="idproveedor" value="<?= $rsordenes[2] ?>"></input>
                                        <input type="hidden" id="prefijo" name="prefijo" value="<?= $rsordenes[29] ?>"></input>    
                                        </tr>
                                    </table>
                                    <div id="transferencia" name="transferencia" style="display: none">
                                        <fieldset>
                                            <legend>Datos transferencia</legend>
                                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                                <tr>
                                                    <td width="20%">Cuenta de cargo origen</td>
                                                    <td width="25%"><input type="text" name="ctaorigen" id="ctaorigen" class="cajaMedia" maxlength="24" value="<?=$rsempresa[19]?>"></td>
                                                    <td width="5%"></td>
                                                    <td width="20%"></td>
                                                    <td width="25%"></td>
                                                </tr>
                                                <tr>
                                                    <td>Entidad Bancaria Origen</td>
                                                    <td><select id="nidentidad" name="nidentidad" class="comboGrande">
                                                            <option value="0">---</option>
                                                            <?php while ($rowe = mysql_fetch_row($rsentidades)) { 
                                                                if ($rowe[0]==$rsempresa[17]) { ?>
                                                                <option value="<?= $rowe[0] ?>" selected><?= $rowe[1] ?> [<?= $rowe[2] ?>]</option>
                                                            <?php } else { ?>
                                                                <option value="<?= $rowe[0] ?>"><?= $rowe[1] ?> [<?= $rowe[2] ?>]</option>
                                                                <?php } 
                                                                } ?>
                                                        </select></td>
                                                    <td></td>
                                                    <?php
                                                    $rssucorigen=$sucursales->llenar_combo_entidades_por_sucursal($rsempresa[17]);
                                                    ?>
                                                    <td>Sucursal Origen</td>
                                                    <td><select id="nidsucursal" name="nidsucursal" class="comboGrande">
                                                            <option value="0">---</option>
                                                            <?php while ($rowsuc = mysql_fetch_row($rssucorigen)) { 
                                                                if ($rowsuc[0]==$rsempresa[18]) { ?>
                                                                <option value="<?= $rowsuc[0] ?>" selected><?= $rowsuc[1] ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= $rowsuc[0] ?>"><?= $rowsuc[1] ?></option>
                                                                <?php } 
                                                                } ?>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Cuenta de cargo destino</td>
                                                    <td width="25%"><input type="text" name="ctadestino" id="ctadestino" class="cajaMedia" maxlength="24" value="<?=$rsordenes[32]?>"></td>
                                                    <td width="5%"></td>
                                                    <td width="20%"></td>
                                                    <td width="25%"></td>
                                                </tr>
                                                <tr>
                                                    <td>Entidad Bancaria Destino</td>
                                                    <td><select id="nidentidadd" name="nidentidadd" class="comboGrande">
                                                            <option value="0">---</option>
                                                            <?php while ($rowd = mysql_fetch_row($rsentidadesd)) { 
                                                                if ($rowd[0]==$rsordenes[30]) { ?>
                                                                <option value="<?= $rowd[0] ?>" selected><?= $rowd[1] ?> [<?= $rowd[2] ?>]</option>
                                                            <?php } else { ?>
                                                                <option value="<?= $rowd[0] ?>"><?= $rowd[1] ?> [<?= $rowd[2] ?>]</option>
                                                                <?php } 
                                                                } ?>
                                                        </select></td>
                                                    <td></td>
                                                    <?php
                                                    $rssucdestino=$sucursales->llenar_combo_entidades_por_sucursal($rsordenes[30]);
                                                    ?>
                                                    <td>Sucursal Destino</td>
                                                    <td><select id="nidsucursald" name="nidsucursald" class="comboGrande">
                                                            <option value="0">---</option>
                                                            <?php while ($rowsd = mysql_fetch_row($rssucdestino)) { 
                                                                if ($rowsd[0]==$rsordenes[31]) { ?>
                                                                <option value="<?= $rowsd[0] ?>" selected><?= $rowsd[1] ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= $rowsd[0] ?>"><?= $rowsd[1] ?></option>
                                                                <?php } 
                                                                } ?>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td>Numero de facturas</td>
                                                    <td><input type="text" name="numfacturas" id="numfacturas" class="cajaPequena" onblur="formatear_objeto_entero('numfacturas')"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Vencimientos</legend>
                            <div id="respuesta"></div>
                            <iframe frameborder="0" width="100%" name="contenedor_vencimientos" style="display: block">
                            </iframe>
                        </fieldset>
                        </form>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor = cursor">
                    </div>
                </div>
            </div>
            <form id="formfp" id="formfp" target="frame_datos" action="obtener_fp.php" method="post">
                <input type="hidden" name="valorfp" id="valorfp">
                <input type="hidden" name="fechainivto" id="fechainivto">
            </form>
            <div>
                <iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
            </div>
    </body>
</html>
