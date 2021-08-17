<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include ("../clases/class.proveedores.php");

$proveedores = new proveedores();

$resultado = $proveedores->buscar('', '');
?>
<html>
    <head>
        <title>Listar Ordenes</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script language="javascript">
            
            function imprimir() {
                var idproveedor=document.getElementById("nidproveedor").value;
                var fechaini=document.getElementById("fechadesde").value;
                if (fechaini=="") { fechaini="01/01/1970"; }
                var fechafin=document.getElementById("fechahasta").value
                if (fechafin=="") { fechafin="31/12/2050"; }
                var situacion=document.getElementById("situacion").value;
                if (comparar_fechas(fechaini, fechafin)){
                    alert("La fecha de fin no puede ser mayor que la fecha de inicio")
                } else {
                    if ((fechaini=="") || (fechafin=="")) {
                        alert ("Debe rellenar las fechas de inicio y fecha de fin");
                    } else {
                        if (idproveedor=="") {
                            if (confirm("No ha elegido ningun proveedor. Saldra un listado con todos los proveedores. Desea continuar con la impresion?"))
                                location.href="imprimir_listado_ordenes.php?fechadesde=" + fechaini + "&fechahasta=" + fechafin + "&idproveedor=" + idproveedor + "&situacion=" + situacion;
                        } else {
                            location.href="imprimir_listado_ordenes.php?fechadesde=" + fechaini + "&fechahasta=" + fechafin + "&idproveedor=" + idproveedor + "&situacion=" + situacion; 
                        }    
                    }
                }
            }
            
            function comparar_fechas(fecha, fecha2)  
            {  
                var xMonth=fecha.substring(3, 5);  
                var xDay=fecha.substring(0, 2);  
                var xYear=fecha.substring(6,10);  
                var yMonth=fecha2.substring(3, 5);  
                var yDay=fecha2.substring(0, 2);  
                var yYear=fecha2.substring(6,10);  
                if (xYear> yYear)  
                {  
                    return(true)  
                }  
                else  
                {  
                    if (xYear == yYear)  
                    {   
                        if (xMonth> yMonth)  
                        {  
                            return(true)  
                        }  
                        else  
                        {   
                            if (xMonth == yMonth)  
                            {  
                                if (xDay> yDay)  
                                    return(true);  
                                else  
                                    return(false);  
                            }  
                            else  
                                return(false);  
                        }  
                    }  
                    else  
                        return(false);  
                }  
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
                document.getElementById("anombreproveedor").value="";
                document.getElementById("nidproveedor").value="";
                document.getElementById("fechadesde").value="";
                document.getElementById("fechahasta").value="";
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
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">LISTADO ORDENES</div>
                    <div id="frmBusqueda">
                        <form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
                                <tr>
                                    <td width="25%">Nombre proveedor</td>
                                    <td width="70%"><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" id="lupa" name="lupa" title="Seleccionar proveedor" vertical-align="baseline"></a>&nbsp;&nbsp;&nbsp;<input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly value="<?= $_SESSION['cartaprov'] ?>"></td>
                                    <td width="5%"><input type="hidden" name="nidproveedor" id="nidproveedor" class="cajaPequenaR" value="<?= $_SESSION['cartanid'] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="25%">Desde</td>
                                    <td width="70%"><input id="fechadesde" type="text" class="cajaPequenaR" NAME="fechadesde" maxlength="10" readonly value="<?= $_SESSION['cartafechini'] ?>"><img src="../img/calendario.png" name="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                        <script type="text/javascript">
                                            Calendar.setup(
                                            {
                                                inputField : "fechadesde",
                                                ifFormat   : "%d/%m/%Y",
                                                button     : "Image1"
                                            }
                                        );
                                        </script>
                                        Hasta <input id="fechahasta" type="text" class="cajaPequenaR" NAME="fechahasta" maxlength="10" readonly value="<?= $_SESSION['cartafechfin'] ?>"><img src="../img/calendario.png" name="Image2" width="16" height="16" border="0" id="Image2" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                        <script type="text/javascript">
                                            Calendar.setup(
                                            {
                                                inputField : "fechahasta",
                                                ifFormat   : "%d/%m/%Y",
                                                button     : "Image2"
                                            }
                                        );
                                        </script>
                                    <td width="5%"></td>
                                </tr>
                                <tr>
                                    <td width="25%">Situacion</td>
                                    <td width="70%"><select name="situacion" id="situacion" class="comboPequeno">
                                            <option value="" selected>Todas</option>
                                            <option value="1">Facturado</option>
                                            <option value="0">Pendiente</option>
                                        </select></td>
                                    <td width="5%"></td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="bgtransparent" class="bgtransparent"></div>
                            <div id="capaproveedores" class="capaproveedores"><?php include_once("rejilla_proveedores.php") ?></div>
                            <div id="botonBusqueda">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
                                <?php if ($permisos == 'escritura') { ?>
                                    <img src="../img/botonimprimir.jpg" width="79" height="22" border="1" onClick="imprimir()" onMouseOver="style.cursor=cursor">
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