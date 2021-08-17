<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.backup.php");

$backup = new backup();

$denominacion = $_POST["denominacion"];

$backupDatabase= $backup->Backup_Database();


if (!$backupDatabase) {
	$mensaje="ERROR. La copia de seguridad no se ha creado correctamente.";
	$cabecera2="NUEVA COPIA DE SEGURIDAD";
} else {
        $nombre_archivo=$backup->dame_maximo();
        $archivo="../copias/".$nombre_archivo.".sql";
        $backup->archivo=$archivo;
        $backup->denominacion=$denominacion;
        $insertado=$backup->insertar();
        $mensaje="La copia de seguridad se ha creado correctamente.";
	$cabecera2="NUEVA COPIA DE SEGURIDAD";
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
