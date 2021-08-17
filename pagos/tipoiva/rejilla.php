<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include ("../clases/class.tipoiva.php");

$_SESSION['manttipoivaden'] = $_POST["denominacion"];

$denominacion = $_POST["denominacion"];

$tipoiva = new tipoiva();

$resultado = $tipoiva->buscar($denominacion);
?>
<html>
    <head>
        <title>Tipos de IVA</title>
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
		
    function ver(codigo) {
        parent.location.href="ver.php?codigo=" + codigo;
    }
		
    function modificar(codigo) {
        parent.location.href="modificar.php?codigo=" + codigo;
    }
		
    function eliminar(codigo) {
        if (confirm("Desea eliminar el elemento seleccionado")) parent.location.href="eliminar.php?codigo=" + codigo;
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
                            <th width="81%">DENOMINACION</th>
                            <th width="10%">TIPO</th>
<!--                            <th width="4%">&nbsp;</th>-->
                            <th width="6%">&nbsp;</th>
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
                                <td width="81%"><div align="center"><?= $row[2] ?></div></td>
                                <td width="10%"><div align="center"><?= $row[1] ?></div></td>
    <!--                                <td width="4%"><div align="center"><a href="#"><img src="../img/modificar.png" width="16" height="16" border="0" onClick="modificar('<?= $row[0] ?>')" title="Modificar"></a></div></td>-->
                                <td width="6%"><div align="center"><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" onClick="ver('<?= $row[0] ?>')" title="Visualizar"></a></div></td>
                                <?php if ($permisos == 'escritura') { ?><td width="6%"><div align="center"><a href="#"><img src="../img/eliminar.png" width="16" height="16" border="0" onClick="eliminar('<?= $row[0] ?>')" title="Eliminar"></a></div></td><?php } else { ?><td width="6%"></td><?php } ?>
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
