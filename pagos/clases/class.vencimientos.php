<?php

include_once("class.bd.php");

class vencimientos {

    var $ejercicio;
    var $numero;
    var $idpago;
    var $ejerciciopago;
    var $fecha;
    var $idproveedor;
    var $database;

    function vencimientos() {
        $this->database = new MySQL();
    }

    function select($ejercicio, $numero) {
        $sql = "SELECT t1.ejercicio,t1.numero,t1.idpago,t1.ejerciciopago,t1.fecha,t1.idproveedor,t1.importe,t1.idformapago,
                t1.situacion,t1.borrado,t2.nomproveedor,t3.importepago,t4.descformapago,t1.diasvto,t1.fechavto,t4.prefijo
                FROM tab_vencimientos t1 
                INNER JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor 
                INNER JOIN tab_ordenpagos t3 ON t1.idpago=t3.idpago AND t1.ejerciciopago=t3.ejerciciopago
                INNER JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
                WHERE t1.ejercicio =" . $ejercicio . " AND t1.numero=" . $numero . " AND t1.borrado=0";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function delete($ejercicio, $numero) {
        $sql = "UPDATE tab_vencimientos SET borrado='1' WHERE ejercicio =" . $ejercicio . " AND numero=" . $numero;
        $result = mysql_query($sql);
    }

    function insert($idpago, $ejerciciopago, $fecha, $importe, $idformapago, $idproveedor, $diasvto, $fechavto) {
        $sql = "SELECT MAX(numero) as maximo FROM tab_vencimientos WHERE ejercicio=" . $ejerciciopago;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        if (empty($row[0])) {
            $numero = 1;
        } else {
            $numero = $row[0] + 1;
        }
        $this->id = "";
        $sql = "INSERT INTO tab_vencimientos (ejercicio,numero,idpago,ejerciciopago,fecha,idproveedor,importe,idformapago,diasvto,fechavto) 
            VALUES (" . $ejerciciopago . "," . $numero . "," . $idpago . "," . $ejerciciopago . ",'" . $fecha . "'," . $idproveedor . ",
                    '" . $importe . "'," . $idformapago . "," . $diasvto . ",'" . $fechavto . "')";
        $result = mysql_query($sql);
        return $numero;
    }

    function listar($idpago, $ejerciciopago) {
        $sql = "SELECT t1.ejercicio,t1.numero,t1.idpago,t1.ejerciciopago,t1.fecha,t1.idproveedor,t1.importe,t1.idformapago,
                t1.situacion,t1.borrado,t2.nomproveedor,t3.importepago,t4.descformapago,t4.prefijo,t1.diasvto,t1.fechavto,
                t1.fecha_pago
                FROM tab_vencimientos t1 
                INNER JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor 
                INNER JOIN tab_ordenpagos t3 ON t1.idpago=t3.idpago AND t1.ejerciciopago=t3.ejerciciopago
                INNER JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
                WHERE t1.idpago =" . $idpago . " AND t1.ejerciciopago=" . $ejerciciopago . " AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }
    
    function buscar_importe($importe) {
        $cadena="1=1";
        if ($importe!="") {
            $cadena.= " AND t1.importe like '%".$importe."%'";
        }
        $sql = "SELECT t1.ejercicio,t1.numero,t1.idpago,t1.ejerciciopago,t1.fecha,t1.idproveedor,t1.importe,t1.idformapago,
                t1.situacion,t1.borrado,t2.nomproveedor,t3.importepago,t4.descformapago,t4.prefijo,t1.diasvto,t1.fechavto,
                t1.fecha_pago
                FROM tab_vencimientos t1 
                INNER JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor 
                INNER JOIN tab_ordenpagos t3 ON t1.idpago=t3.idpago AND t1.ejerciciopago=t3.ejerciciopago
                INNER JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
                WHERE ".$cadena." AND t1.fecha_pago='0000-00-00' AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function imprimir_vencimientos($fechaini, $fechafin, $estado) {
        $cadena = "1=1";
        if ($estado == 1) {
            $cadena.=" AND fecha_pago<>'0000-00-00'";
        }
        if ($estado == 2) {
            $cadena.=" AND fecha_pago='0000-00-00'";
        }
        $sql = "SELECT t1.ejercicio,t1.numero,t1.idpago,t1.ejerciciopago,t1.fecha,t1.idproveedor,t1.importe,t1.idformapago,
                t1.situacion,t1.borrado,t2.nomproveedor,t3.importepago,t4.descformapago,t4.prefijo,t1.diasvto,t1.fechavto,
                t2.codproveedor
                FROM tab_vencimientos t1 
                INNER JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor 
                INNER JOIN tab_ordenpagos t3 ON t1.idpago=t3.idpago AND t1.ejerciciopago=t3.ejerciciopago
                INNER JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
                WHERE " . $cadena . " AND (t1.fechavto BETWEEN '" . $fechaini . "' AND '" . $fechafin . "') AND t1.borrado=0
                ORDER BY t1.fechavto ASC";
        $result = mysql_query($sql);
        return $result;
    }

    function pagar_vencimiento($ejercicio, $numero, $fecha) {
        $sql = "UPDATE tab_vencimientos SET fecha_pago='" . $fecha . "' WHERE ejercicio =" . $ejercicio . " AND numero=" . $numero;
        $result = mysql_query($sql);
    }

    function imprimir_pagares($idproveedor, $fechaini, $fechafin, $situacion) {
        $cadena = "1=1";
        if ($situacion != "") {
            $cadena.=" AND situacion=" . $situacion;
        }
        if ($idproveedor != "") {
            $cadena.=" AND t1.idproveedor=" . $idproveedor;
        }
        $sql = "SELECT t1.importe, t1.fechavto, t2.nomproveedor FROM tab_vencimientos t1
            INNER JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor
            INNER JOIN tab_formapago t3 ON t1.idformapago=t3.idformapago
            WHERE t3.prefijo='P' AND " . $cadena . " AND (t1.fechavto BETWEEN '" . $fechaini . "' AND '" . $fechafin . "') AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function imprimir_recibos($idproveedor, $fechaini, $fechafin) {
        $cadena = "1=1";
        if ($idproveedor != "") {
            $cadena.=" AND t1.idproveedor=" . $idproveedor;
        }
        $sql = "SELECT t1.importe, t1.fechavto, t2.nomproveedor,t1.idpago,t1.ejerciciopago 
            FROM tab_vencimientos t1
            INNER JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor
            INNER JOIN tab_formapago t3 ON t1.idformapago=t3.idformapago
            WHERE t3.prefijo='E' AND " . $cadena . " AND (t1.fechavto BETWEEN '" . $fechaini . "' AND '" . $fechafin . "') AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }
    
    function facturas_x_orden($ejercicio,$numero) {
        $sql = "SELECT t1.numfacturap,t1.ffacturap,t1.totalfacturap FROM tab_facturas t1
                LEFT JOIN tab_ordenpagos t2 ON t2.idpago=t1.idordenpago AND t2.ejerciciopago=t1.ejerciciopago
                WHERE t2.idpago=".$numero." AND t2.ejerciciopago=".$ejercicio." AND t2.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }
    
    function vencimientos_x_orden($idpago,$ejerciciopago) {
        $sql = "SELECT t1.fechavto,t1.importe,t3.prefijo FROM tab_vencimientos t1
                LEFT JOIN tab_ordenpagos t2 ON t2.idpago=t1.idpago AND t2.ejerciciopago=t1.ejerciciopago
                INNER JOIN tab_formapago t3 ON t1.idformapago=t3.idformapago
                WHERE t2.idpago=".$idpago." AND t2.ejerciciopago=".$ejerciciopago." AND t2.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }
    
    function numero_vencimientos_x_orden($idpago,$ejerciciopago) {
        $sql = "SELECT t1.fechavto,t1.importe,t3.prefijo FROM tab_vencimientos t1
                LEFT JOIN tab_ordenpagos t2 ON t2.idpago=t1.idpago AND t2.ejerciciopago=t1.ejerciciopago
                INNER JOIN tab_formapago t3 ON t1.idformapago=t3.idformapago
                WHERE t2.idpago=".$idpago." AND t2.ejerciciopago=".$ejerciciopago." AND t2.borrado=0";
        $result = mysql_query($sql);
        return mysql_num_rows($result);
    }
}

?>