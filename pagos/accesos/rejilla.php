<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include ("../clases/class.accesos.php");
include ("../funciones/fechas.php");

$idusuario = $_POST["idusuario"];

$accesos = new accesos();

$resultado = $accesos->buscar($idusuario);
?>
<html>
    <head>
        <title>Accesos</title>
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
		
    function eliminar(codigo,fecha) {
        if (confirm("Desea eliminar el elemento seleccionado")) parent.location.href="eliminar.php?codigo=" + codigo + "&fecha=" + fecha;
    }
        </script>
    </head>
    <body id="dt_example" class="example_alt_pagination" onload="conmutacion()">
        <div id="nueva" style="display:block; background-color: #FFF; text-align: center">
            <img src="../img/cargando.gif" width="128" height="128">
        </div>
        <div id="container" style="display:none">			
            <div id="demo">
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                    <thead>
                        <tr>
                            <th width="21%">FECHA</th>
                            <th width="55%">USUARIO</th>
                            <th width="20%">LOGIN</th>
                            <th width="4%">&nbsp;</th>
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
                                <td width="21%"><div align="center"><?= $row[1] ?></div></td>
                                <td width="55%"><div align="center"><?= $row[2] ?></div></td>
                                <td width="20%"><div align="center"><?= $row[3] ?></div></td>                                
                                <?php if ($permisos=='escritura') { ?><td width="4%"><div align="center"><a href="#"><img src="../img/eliminar.png" width="16" height="16" border="0" onClick="eliminar('<?= $row[0] ?>','<?= $row[1] ?>')" title="Eliminar"></a></div></td><?php } else { ?><td width="4%"></td><?php } ?>
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