<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include_once ("../funciones/fechas.php");
include ("../clases/class.facturas.php");

$_SESSION['mantfacnom'] = $_POST["anombreproveedor"];
$_SESSION['mantfaceje'] = $_POST["ejercicio"];
$_SESSION['mantfacpro'] = $_POST["procesadas"];
$_SESSION['mantfacidpro'] = $_POST["nidproveedor"];

$idproveedor = $_POST["nidproveedor"];
$ejercicio = $_POST["ejercicio"];
$procesadas = $_POST["procesadas"];

$facturas = new facturas();

$resultado = $facturas->buscar($idproveedor, $ejercicio, $procesadas);
?>
<html>
    <head>
        <title>Facturas</title>
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
		
    function ver(codigo,ejercicio) {
        parent.location.href="ver.php?codigo=" + codigo + "&ejercicio=" + ejercicio;
    }
		
    function modificar(codigo,ejercicio) {
        parent.location.href="modificar.php?codigo=" + codigo + "&ejercicio=" + ejercicio;
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
                            <th width="12%">N. REGISTRO</th>
                            <th width="12%">N. FACTURAP</th>
                            <th width="40%">PROVEEDOR</th>
                            <th width="8%">FECHA</th>
                            <th width="11%">IMPORTE</th>
                            <th width="5%">FACTURA</th>
                            <th width="4%">&nbsp;</th>
                            <th width="4%">&nbsp;</th>
<!--                            <th width="4%">&nbsp;</th>-->
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
                                <td width="12%"><div align="center"><?= $row[0] . "/" . $row[1] ?></div></td>
                                <td width="12%"><div align="center"><?= $row[2] ?></div></td>
                                <td width="40%"><div align="center"><?= $row[32] ?></div></td>
                                <td width="8%"><div align="center"><?= implota($row[4]) ?></div></td>
                                <td width="11%"><div align="center"><?= $row[13] . " " . $row[43] ?></div></td>
                                <?php if (file_exists("./facpdf/" . $row[0] . '-' . $row[1] . ".pdf")) { ?>
                                    <td width="5%"><div align="center"><a href="./facpdf/<?= $row[0] . '-' . $row[1] ?>.pdf" target="_blank"><img src="../img/pdf.png" width="16" height="16" border="0"></a></div></td>
                                <?php } else { ?>
                                    <td width="5%"></td>
                                    <?php
                                }
                                if (($permisos == 'escritura') && ($row[29]==0)) {
                                    ?><td width="4%"><div align="center"><a href="#"><img src="../img/modificar.png" width="16" height="16" border="0" onClick="modificar('<?= $row[0] ?>','<?= $row[1] ?>')" title="Modificar"></a></div></td><?php } else { ?><td width="4%"></td><?php } ?>
                                <td width="4%"><div align="center"><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" onClick="ver('<?= $row[0] ?>','<?= $row[1] ?>')" title="Visualizar"></a></div></td>                               
    <!--                                <td width="4%"></td>-->
                            </tr>
                            <?php
                            $contador++;
                        }
                        ?>			
                        </tr>
                    </tbody>
                </table>
                </body>
