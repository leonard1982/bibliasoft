<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
?>
<html>
    <head>
        <title>Envios</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script language="javascript">
		
            function inicio() {
                document.getElementById("form_busqueda").submit();
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
		
            function buscar() {
                var fechaini=document.getElementById("fechadesde").value;
                if (fechaini=="") { fechaini="01/01/1970"; }
                var fechafin=document.getElementById("fechahasta").value
                if (fechafin=="") { fechafin="31/12/2050"; }
                if (comparar_fechas(fechaini, fechafin)){
                    alert("La fecha de fin no puede ser mayor que la fecha de inicio")
                } else {
                    document.getElementById("form_busqueda").submit();
                }
            }
			
            function limpiar() {
                document.getElementById("denominacion").value="";
                document.getElementById("fechadesde").value="";
                document.getElementById("fechahasta").value="";
            }
            
            function nueva() {
                location.href="nueva.php";
            }
        </script>
    </head>
    <body onLoad="inicio()">
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">Buscar COPIAS DE SEGURIDAD</div>
                    <div id="frmBusqueda">
                        <form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
                                <tr>
                                    <td width="25%">Denominacion</td>
                                    <td width="75%"><input type="text" name="denominacion" id="denominacion" class="cajaGrande"></td>
                                    </tr>
                                <tr>
                                    <td width="25%">Desde</td>
                                    <td width="75%"><input id="fechadesde" type="text" class="cajaPequenaR" NAME="fechadesde" maxlength="10" readonly value="<?= $_SESSION['certifechini'] ?>"><img src="../img/calendario.png" name="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                        <script type="text/javascript">
                                            Calendar.setup(
                                            {
                                                inputField : "fechadesde",
                                                ifFormat   : "%d/%m/%Y",
                                                button     : "Image1"
                                            }
                                        );
                                        </script>
                                        Hasta <input id="fechahasta" type="text" class="cajaPequenaR" NAME="fechahasta" maxlength="10" readonly value="<?= $_SESSION['certifechfin'] ?>"><img src="../img/calendario.png" name="Image2" width="16" height="16" border="0" id="Image2" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                        <script type="text/javascript">
                                            Calendar.setup(
                                            {
                                                inputField : "fechahasta",
                                                ifFormat   : "%d/%m/%Y",
                                                button     : "Image2"
                                            }
                                        );
                                        </script>
                                </tr>
                            </table>
                            <hr>
                            </div>
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