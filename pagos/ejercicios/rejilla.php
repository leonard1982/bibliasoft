<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include ("../clases/class.ejercicios.php");

$_SESSION['mantejeden'] = $_POST["denominacion"];

$denominacion = $_POST["denominacion"];

$ejercicios = new ejercicios();

$resultado = $ejercicios->buscar($denominacion);
?>
<html>
    <head>
        <title>Ejercicios</title>
        <style type="text/css" title="currentStyle">
            @import "../ajax/css/demo_page.css";
            @import "../ajax/css/demo_table.css";
            .Estilo1 {
                color: #AEA962;
                font-weight: bold;
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 10pt;
            }
            body {
                margin-top: 0px;
            }
        </style>
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').dataTable( {
                    "sPaginationType": "full_numbers",
<?php if ($operacion == "si") { ?>"bStateSave": false<?php } ?>
<?php if ($operacion == "no") { ?>"bStateSave": true<?php } ?>					
        } );
    } );
                                    
    function conmutacion() {
        document.getElementById("nueva").style.display="none";
        document.getElementById("container").style.display="block";
    }
		
//    function ver(codigo) {
//        parent.location.href="ver.php?codigo=" + codigo;
//    }
//		
//    function modificar(codigo) {
//        parent.location.href="modificar.php?codigo=" + codigo;
//    }
		
    function activar(codigo) {
        if (confirm("Si activa este ejercicio, el que estuviera anteriormente activo sera desactivado. Desea continuar")) parent.location.href="activar.php?codigo=" + codigo;
    }
        </script>
    </head>	
    <body id="dt_example" class="example_alt_pagination" onload="conmutacion()">
        <div id="nueva" style="display:block">
            <table width="100%"  border="0">
                <tr>
                    <td>&nbsp;</td>
                    <td><div align="center"><span class="Estilo1">Cargando resultados </span></div></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><div align="center"><img src="../img/cargando.gif" width="128" height="128"></div></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><div align="center"><span class="Estilo1">Espere un momento </span></div></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
        <div id="container" style="display:none">			
            <div id="demo">
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                    <thead>
                        <tr>
                            <th width="60%">EJERCICIO ECONOMICO</th>
                            <th width="28%">ESTADO</th>
<!--                            <th width="6%">&nbsp;</th>-->
                            <th width="6%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        while ($row = mysql_fetch_row($resultado)) {
                            if ($contador % 2) {
                                $fondolinea = "itemParTabla";
                            } else {
                                $fondolinea = "itemImparTabla";
                            }
                            ?>
                            <tr class="<?= $fondolinea ?>">
                                <td width="60%"><div align="center"><?= $row[1] ?></div></td>
                                <?php if ($row[2]==0) { $estado="inactivo"; } else { $estado="activo"; } ?>
                                <td width="28%"><div align="center"><?= $estado ?></div></td>
    <!--                                <td width="4%"><div align="center"><a href="#"><img src="../img/modificar.png" width="16" height="16" border="0" onClick="modificar('<?= $row[0] ?>')" title="Modificar"></a></div></td>-->
<!--                                <td width="6%"><div align="center"><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" onClick="ver('<?= $row[0] ?>')" title="Visualizar"></a></div></td>-->
                                <?php if (($permisos == 'escritura') && ($row[2]!=1)) { ?><td width="6%"><div align="center"><a href="#"><img src="../img/activar.png" width="16" height="16" border="0" onClick="activar('<?= $row[0] ?>')" title="Activar"></a></div></td><?php } else { ?><td width="6%"></td><?php } ?>
                            </tr>
                            <?php
                            $contador++;
                        }
                        ?>			
                        </tr>
                    </tbody>
                </table>
                </body>
                </html>
