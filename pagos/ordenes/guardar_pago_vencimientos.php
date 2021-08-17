<?php
//include ("../seguridad_usuario.inc");
include_once ("../clases/class.vencimientos.php");
include_once ("../funciones/fechas.php");

$vencimientos = new vencimientos();

$idpago = $_POST["idpago"];
$ejercicio = $_POST["ejercicio"];

$rsvencimientos = $vencimientos->listar($idpago, $ejercicio);

while ($rowv = mysql_fetch_row($rsvencimientos)) {
    $numero=$rowv[1];
    $ejercicio=$rowv[0];
    $fecha="afechapago"."-".$numero."-".$ejercicio;
    if ($_POST[$fecha]!="") {
        $fecha=explota($_POST[$fecha]);
        $insertar=$vencimientos->pagar_vencimiento($ejercicio,$numero,$fecha);
        $cabecera2 = "PAGAR VENCIMIENTO";
        $mensaje = "El registro ha sido insertado correctamente";
    }
}
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script language="javascript">
		
            function aceptar() {
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
		
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header"><?php echo $cabecera2 ?></div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                <td width="100%" colspan="2" class="mensaje"><?php echo $mensaje; ?></td>
                            </tr>				
                        </table>
                        <hr>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
                    </div>
                </div>
            </div>
    </body>
</html>