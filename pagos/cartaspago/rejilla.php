<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include_once ("../funciones/fechas.php");
include ("../clases/class.ordenes.php");

$_SESSION['cartanid'] = $_POST["nidproveedor"];
$_SESSION['cartafechini'] = $_POST["fechadesde"];
$_SESSION['cartaprov'] = $_POST["anombreproveedor"];
$_SESSION['cartafechfin'] = $_POST["fechahasta"];
$_SESSION['cartaimpresas'] = $_POST["impresas"];

$idproveedor = $_POST["nidproveedor"];
if (empty($_POST["fechadesde"])) { $fechadesde='1970-01-01'; } else { $fechadesde = explota($_POST["fechadesde"]); }
if (empty($_POST["fechahasta"])) { $fechahasta='2050-12-31'; } else { $fechahasta = explota($_POST["fechahasta"]); }
$impresas = $_POST["impresas"];

$ordenes = new ordenes();

$resultado = $ordenes->buscar_cartas_pago($idproveedor, $fechadesde, $fechahasta,$impresas);
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
    
    function imprimir(codigo,ejercicio) {
        if (confirm("Las ordenes de pago pasaran a estar procesadas. Desea continuar con la impresion?")) parent.location.href="imprimir_carta_pago.php?idpago=" + codigo + "&ejercicio=" + ejercicio;
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
                            <th width="12%">N. ORDEN</th>
                            <th width="49%">PROVEEDOR</th>
                            <th width="10%">FECHA</th>
                            <th width="16%">IMPORTE</th>
                            <th width="10%">IMPRESA</th>
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
                                <td width="12%"><div align="center"><?= $row[0] . "/" . $row[1] ?></div></td>
                                <td width="49%"><div align="center"><?= $row[13] ?></div></td>
                                <td width="10%"><div align="center"><?= implota($row[3]) ?></div></td>
                                <td width="16%"><div align="center"><?= $row[4] . " " . $row[18] ?></div></td>
                                <?php
                                if ($row[12] == 0) {
                                    $cad = "NO";
                                } else {
                                    $cad = "SI";
                                }
                                ?>
                                <td widht="10%"><div align="center"><?= $cad ?></div></td>
                                <td width="3%"><div align="center"><a href="#"><img src="../img/imprimir.png" width="16" height="16" border="0" onClick="imprimir('<?= $row[0] ?>','<?= $row[1] ?>')" title="Imprimir"></a></div></td>                    
                            </tr>
                            <?php
                            $contador++;
                        }
                        ?>			
                        </tr>
                    </tbody>
                </table>
                </body>