<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.usuarios.php");

$usuarios = new usuarios();

$idusuario = $_POST["codigo"];

$mensaje = "Los datos se han guardado correctamente.<br>Para la aplicacion correcta y completa de los cambios el usuario afectado debera iniciar sesion.";
$cabecera2 = "ADMINISTRACION PERMISOS";

$insertar=$usuarios->delete_permisos($idusuario);

$rsfhijos = $usuarios->funciones_total_hijos();

while ($rowhijos = mysql_fetch_row($rsfhijos)) { 
    $funcion=$rowhijos[0];
    $permiso=$_POST[$funcion];
    $usuarios->idusuario=$idusuario;
    $usuarios->idfuncion=$funcion;
    $usuarios->permisos=$permiso;
    $insertar=$usuarios->insertar_permisos();
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
