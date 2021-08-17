<?php
include ("../seguridad_usuario.inc");
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
        <style>
            #ifra {
                width:100%;
            }
        </style>
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
            
            function validacion() {
                document.getElementById("formulario").submit();
            }
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">INSERTAR ENVIO</div>
                    <div id="frmBusqueda">
                        <hr>
                        <form class="formulario" id="formulario" name="formulario" action="guardar_envio_multiple.php" method="post">       
                            <fieldset>
                                <legend>Fecha envio</legend>
                                <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                    <tr>
                                        <?php
                                        $hoy = date("d/m/Y");
                                        ?>
                                        <td width="20%">Fecha Orden Pago (*)</td>
                                        <td width="80%"><input id="afechaenvio" type="text" class="cajaPequenaR" NAME="afechaenvio" maxlength="10" readonly value="<?= $hoy ?>"><img src="../img/calendario.png" name="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario">
                                            <script type="text/javascript">
                                                Calendar.setup(
                                                {
                                                    inputField : "afechaenvio",
                                                    ifFormat   : "%d/%m/%Y",
                                                    button     : "Image1"
                                                }
                                            );
                                            </script></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <fieldset>
                                <legend>Proveedores</legend>
                                <div id="ifra"><?php include_once ("listado_proveedores.php") ?></div>
                            </fieldset>
                        </form>
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
    </body>
</html>
