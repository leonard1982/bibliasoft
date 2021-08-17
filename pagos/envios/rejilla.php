<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include_once ("../funciones/fechas.php");
include ("../clases/class.envios.php");

$_SESSION['certinid'] = $_POST["nidproveedor"];
$_SESSION['certifechini'] = $_POST["fechadesde"];
$_SESSION['certiprov'] = $_POST["anombreproveedor"];
$_SESSION['certifechfin'] = $_POST["fechahasta"];

$idproveedor = $_POST["nidproveedor"];
if (empty($_POST["fechadesde"])) { $fechadesde='1970-01-01'; } else { $fechadesde = explota($_POST["fechadesde"]); }
if (empty($_POST["fechahasta"])) { $fechahasta='2050-12-31'; } else { $fechahasta = explota($_POST["fechahasta"]); }

$envios = new envios();

$resultado = $envios->buscar($idproveedor, $fechadesde, $fechahasta);
?>
<html>
    <head>
        <title>Envios</title>
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
                            <th width="10%">NUM. CERT.</th>
                            <th width="33%">PROVEEDOR</th>
                            <th width="20%">POBLACION</th>
                            <th width="20%">PROVINCIA</th>
                            <th width="8%">F. ENVIO</th>
                            <th width="3%">&nbsp;</th>
                            <th width="3%">&nbsp;</th>
                            <th width="3%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        while ($row = mysql_fetch_row($resultado)) {
                            if ($contador % 2) {
                                $fondolinea = "gradeA";
                            } else {
                                $fondolinea = "gradeA";
                            }
                            ?>
                            <tr class="<?= $fondolinea ?>">
                                <td width="10%"><div align="center"><?= $row[9] ?></div></td>
                                <td width="33%"><div align="center"><?= $row[4] ?></div></td>
                                <td width="20%"><div align="center"><?= $row[6] ?></div></td>
                                <td width="20%"><div align="center"><?= $row[7] ?></div></td>
                                <td width="8%"><div align="center"><?= implota($row[1]) ?></div></td>
                                <td width="3%"><div align="center"><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" onClick="ver('<?= $row[0] ?>')" title="Visualizar"></a></div></td>
                                <?php if ($permisos == 'escritura') { ?><td width="3%"><div align="center"><a href="#"><img src="../img/modificar.png" width="16" height="16" border="0" onClick="modificar('<?= $row[0] ?>')" title="Modificar"></a></div></td><?php } else { ?><td width="3%"></td><?php } ?>                                         
                                <?php if ($permisos == 'escritura') { ?><td width="3%"><div align="center"><a href="#"><img src="../img/eliminar.png" width="16" height="16" border="0" onClick="eliminar('<?= $row[0] ?>')" title="Eliminar"></a></div></td><?php } else { ?><td width="3%"></td><?php } ?>
                            </tr>
                            </tr>
                            <?php
                            $contador++;
                        }
                        ?>			
                        </tr>
                    </tbody>
                </table>
                </body>