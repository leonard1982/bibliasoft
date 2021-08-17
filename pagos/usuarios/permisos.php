<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.usuarios.php");

$usuarios = new usuarios();

$usuario = $_GET["codigo"];

$rsfpadres = $usuarios->funciones_padres();
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script language="javascript">

            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor='hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor='pointer';
            }
            
            function cancelar() {
                location.href="index.php";
            }
			
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">ADMINISTRACION PERMISOS</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar_permisos.php">
                                <?php while ($rowpadres = mysql_fetch_row($rsfpadres)) { ?>
                                <fieldset><legend><?= $rowpadres[1] ?></legend>
                                <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                    <?php 
                                    $rsfhijos = $usuarios->funciones_hijos($rowpadres[0]);
                                    while ($rowhijos = mysql_fetch_row($rsfhijos)) { 
                                        $rspermisos=$usuarios->permisos_usuario_por_funcion($usuario, $rowhijos[0]);?>
                                    <tr>
                                        <td width="25%"></td>
                                        <td width="25%"><?= $rowhijos[1] ?></td>
                                        <td width="25%"><select name="<?= $rowhijos[0] ?>" id="<?= $rowhijos[0] ?>" class="comboMedio">
                                                <?php if ($rspermisos[0]=='prohibido') { ?><option value="prohibido" selected>Sin acceso</option><?php } else { ?><option value="prohibido">Sin acceso</option><?php } ?>
                                                <?php if ($rspermisos[0]=='lectura') { ?><option value="lectura" selected>Lectura</option><?php } else { ?><option value="lectura">Lectura</option><?php } ?>
                                                <?php if ($rspermisos[0]=='escritura') { ?><option value="escritura" selected>Escritura</option><?php } else { ?><option value="escritura">Escritura</option><?php } ?>
                                            </select></td>
                                        <td width="25%"></td>
                                    </tr> 
                                <?php } ?>
                                    </table>
                                </fieldset>
                                <?php } ?>
                            </div>
                            <div id="botonBusqueda">
                                <input type="hidden" name="codigo" id="codigo" value="<?= $usuario ?>">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="javascript:document.getElementById('formulario').submit()" border="1" onMouseOver="style.cursor=cursor">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
