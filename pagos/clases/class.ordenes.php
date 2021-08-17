<?php

include_once("class.bd.php");

class ordenes {

    var $idpago;
    var $ejerciciopago;
    var $idproveedorpago;
    var $database;

    function ordenes() {
        $this->database = new MySQL();
    }

    function select($idpago, $ejercicio) {
        $sql = "SELECT t1.idpago,t1.ejerciciopago,t1.idproveedorpago,t1.fechapago,t1.importepago,t1.refpago,0,
               t1.comentpago,t1.idusuariopago,t1.idformapago,t1.nfacpago,t1.nvencipago,t1.sitcartapago,t2.nomproveedor,t2.cifproveedor,
               t3.nombre,t4.descformapago,t5.descmoneda,t1.idmoneda,t2.dirproveedor,t6.denprovincia,t7.denpoblacion,t2.cpproveedor,t4.literal1,
               t4.literal2,t4.literal3,t1.importepagado,t1.importependiente,t1.situacion,t1.prefijo,t2.identidad,t2.idsucursal,t2.ibanproveedor,
               t2.bicproveedor,t2.ndcproveedor
               FROM tab_ordenpagos t1
               LEFT JOIN tab_proveedores t2 ON t1.idproveedorpago=t2.idproveedor
               LEFT JOIN tab_usuarios t3 ON t1.idusuariopago=t3.idusuario
               LEFT JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
               LEFT JOIN tab_monedas t5 ON t1.idmoneda=t5.idmoneda
               LEFT JOIN tab_provincias t6 ON t2.idprovincia=t6.idprovincia
               LEFT JOIN tab_poblaciones t7 ON t2.idpoblacion=t7.idpoblacion
               WHERE t1.idpago = " . $idpago . " AND t1.ejerciciopago=" . $ejercicio;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($idproveedor, $ejercicio, $situacion) {
        $cadena = "1=1";
        if ($idproveedor <> "") {
            $cadena.=" AND t1.idproveedorpago = " . $idproveedor;
        }
        if ($situacion <> "") {
            $cadena.=" AND t1.sitcartapago = " . $situacion;
        }
        if (($ejercicio <> "") && ($ejercicio <> "0")) {
            $cadena.=" AND t1.ejerciciopago = '" . $ejercicio . "'";
        }
        $sql = "SELECT t1.idpago,t1.ejerciciopago,t1.idproveedorpago,t1.fechapago,t1.importepago,t1.refpago,0,
               t1.comentpago,t1.idusuariopago,t1.idformapago,t1.nfacpago,t1.nvencipago,t1.sitcartapago,t2.nomproveedor,t2.cifproveedor,
               t3.nombre,t4.descformapago,t5.descmoneda,t5.codmoneda,t1.importepagado,t1.importependiente,t1.situacion
               FROM tab_ordenpagos t1
               LEFT JOIN tab_proveedores t2 ON t1.idproveedorpago=t2.idproveedor
               LEFT JOIN tab_usuarios t3 ON t1.idusuariopago=t3.idusuario
               LEFT JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
               LEFT JOIN tab_monedas t5 ON t1.idmoneda=t5.idmoneda 
               WHERE " . $cadena . " AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete_borrando($idpago, $ejercicio) {
        $sql = "UPDATE tab_ordenpagos SET borrado=1 WHERE idpago = " . $idpago . " AND ejerciciopago=" . $ejercicio;
        $result = mysql_query($sql);
    }

    function delete_sin_borrar($idpago, $ejercicio) {
        $hoy = date("Y-m-d");
        $sql = "UPDATE tab_ordenpagos SET importepago=0,fechapago='" . $hoy . "',sitcartapago=1 
                WHERE idpago = " . $idpago . " AND ejerciciopago=" . $ejercicio;
        $result = mysql_query($sql);
    }

    function obtener_num_orden($ejercicio) {
        $sql = "SELECT MAX(idpago) as maximo FROM tab_ordenpagos WHERE ejerciciopago=" . $ejercicio;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        if (empty($row[0])) {
            $numorden = 1;
        } else {
            $numorden = $row[0] + 1;
        }
        return $numorden;
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_ordenpagos (idpago,ejerciciopago,idproveedorpago,fechapago,importepago,refpago,
                comentpago,idusuariopago,idformapago,nfacpago,nvencipago,sitcartapago,idmoneda,prefijo) 
                VALUES ('$this->idpago','$this->ejerciciopago','$this->idproveedorpago','$this->fechapago',
                '$this->importepago','$this->refpago','$this->comentpago','$this->idusuariopago',
                '$this->idformapago','$this->nfacpago','$this->nvencipago','$this->sitcartapago','$this->idmoneda','$this->prefijo')";
        $result = mysql_query($sql);
    }

    function update($idpago, $ejercicio) {
        $sql = "UPDATE tab_ordenpagos SET  idproveedorpago = '$this->idproveedorpago', fechapago = '$this->fechapago', 
                importepago = '$this->importepago',refpago = '$this->refpago', 
                comentpago = '$this->comentpago', idusuariopago = '$this->idusuariopago',idformapago = '$this->idformapago',
                nfacpago = '$this->nfacpago',nvencipago = '$this->nvencipago',sitcartapago = '$this->sitcartapago',
                idmoneda = '$this->idmoneda', prefijo = '$this->prefijo'
                WHERE idpago =" . $idpago . " AND ejerciciopago=" . $ejercicio;
        $result = mysql_query($sql);
    }

    function insertar_doc($idpago, $ejerciciopago, $denominacion) {
        $sql = "INSERT INTO tab_docordenes (idpago,ejercicio,denominacion) VALUES (" . $idpago . "," . $ejerciciopago . ",'" . $denominacion . "')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function listar_doc($idpago, $ejercicio) {
        $sql = "SELECT iddoc,denominacion FROM tab_docordenes where idpago=" . $idpago . " AND ejercicio=" . $ejercicio;
        $result = mysql_query($sql);
        return $result;
    }

    function eliminar_doc($iddoc) {
        $sql = "DELETE FROM tab_docordenes WHERE iddoc=" . $iddoc;
        $result = mysql_query($sql);
    }

    function liberar_documentos($idpago, $ejercicio) {
        $sql = "DELETE FROM tab_docordenes WHERE idpago=" . $idpago . " AND ejercicio=" . $ejercicio;
        $result = mysql_query($sql);
    }

    function actualizar_orden($idpago, $ejercicio, $importe, $numfac) {
        $sql = "UPDATE tab_ordenpagos SET importepago='" . $importe . "',nfacpago='" . $numfac . "',importepagado=0,importependiente='" . $importe . "' WHERE idpago=" . $idpago . " AND ejerciciopago=" . $ejercicio;
        $result = mysql_query($sql);
    }

    function actualizar_orden_impresa($idpago, $ejercicio) {
        $sql = "UPDATE tab_ordenpagos SET sitcartapago=1 WHERE idpago=" . $idpago . " AND ejerciciopago=" . $ejercicio;
        $result = mysql_query($sql);
    }

    function buscar_cartas_pago($idproveedor, $fechadesde, $fechahasta,$impresas) {
        $cadena = "1=1";
        if ($idproveedor <> "") {
            $cadena.=" AND t1.idproveedorpago = " . $idproveedor;
        }
        if ($impresas <> "") {
            $cadena.=" AND t1.sitcartapago = " . $impresas;
        }
        $sql = "SELECT t1.idpago,t1.ejerciciopago,t1.idproveedorpago,t1.fechapago,t1.importepago,t1.refpago,0,
               t1.comentpago,t1.idusuariopago,t1.idformapago,t1.nfacpago,t1.nvencipago,t1.sitcartapago,t2.nomproveedor,t2.cifproveedor,
               t3.nombre,t4.descformapago,t5.descmoneda,t5.codmoneda,t2.dirproveedor,t6.denprovincia,t7.denpoblacion,t2.cpproveedor,t4.literal1,t4.literal2,t4.literal3,
               t1.importepagado,t1.importependiente
               FROM tab_ordenpagos t1
               LEFT JOIN tab_proveedores t2 ON t1.idproveedorpago=t2.idproveedor
               LEFT JOIN tab_usuarios t3 ON t1.idusuariopago=t3.idusuario
               LEFT JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
               LEFT JOIN tab_monedas t5 ON t1.idmoneda=t5.idmoneda 
               LEFT JOIN tab_provincias t6 ON t2.idprovincia=t6.idprovincia
               LEFT JOIN tab_poblaciones t7 ON t2.idpoblacion=t7.idpoblacion
               WHERE " . $cadena . " AND t1.borrado=0 AND (t1.fechapago BETWEEN '" . $fechadesde . "' AND '" . $fechahasta . "')";
        $result = mysql_query($sql);
        return $result;
    }
    
    function imprimir_cartas_pago($idproveedor, $fechadesde, $fechahasta) {
        $cadena = "1=1";
        if ($idproveedor <> "") {
            $cadena.=" AND t1.idproveedorpago = " . $idproveedor;
        }
        $sql = "SELECT t1.idpago,t1.ejerciciopago,t1.idproveedorpago,t1.fechapago,t1.importepago,t1.refpago,0,
               t1.comentpago,t1.idusuariopago,t1.idformapago,t1.nfacpago,t1.nvencipago,t1.sitcartapago,t2.nomproveedor,t2.cifproveedor,
               t3.nombre,t4.descformapago,t5.descmoneda,t5.codmoneda,t2.dirproveedor,t6.denprovincia,t7.denpoblacion,t2.cpproveedor,t4.literal1,t4.literal2,t4.literal3,
               t1.importepagado,t1.importependiente,t1.prefijo
               FROM tab_ordenpagos t1
               LEFT JOIN tab_proveedores t2 ON t1.idproveedorpago=t2.idproveedor
               LEFT JOIN tab_usuarios t3 ON t1.idusuariopago=t3.idusuario
               LEFT JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
               LEFT JOIN tab_monedas t5 ON t1.idmoneda=t5.idmoneda 
               LEFT JOIN tab_provincias t6 ON t2.idprovincia=t6.idprovincia
               LEFT JOIN tab_poblaciones t7 ON t2.idpoblacion=t7.idpoblacion
               WHERE " . $cadena . " AND t1.borrado=0 AND (t1.fechapago BETWEEN '" . $fechadesde . "' AND '" . $fechahasta . "') AND t1.sitcartapago=0";
        $result = mysql_query($sql);
        return $result;
    }

    function actualizar_ordenes_impresa($idproveedor, $fechadesde, $fechahasta) {
        $cadena = "1=1";
        if ($idproveedor <> "") {
            $cadena.=" AND idproveedorpago = " . $idproveedor;
        }
        $sql = "UPDATE tab_ordenpagos SET sitcartapago=1 WHERE " . $cadena . " AND borrado=0 AND (fechapago BETWEEN '" . $fechadesde . "' AND '" . $fechahasta . "') AND sitcartapago=0";
        $result = mysql_query($sql);
    }

    function actualizar_importes($idpago, $ejerciciopago, $importe, $valor) {
        $sql = "SELECT importepago,importepagado,importependiente,nvencipago FROM tab_ordenpagos WHERE idpago=" . $idpago . " AND ejerciciopago=" . $ejerciciopago;
        $rs = mysql_query($sql);
        $importepago = mysql_result($rs, 0, "importepago");
        $importepagado = mysql_result($rs, 0, "importepagado");
        $importependiente = mysql_result($rs, 0, "importependiente");
        $vencimientos = mysql_result($rs, 0, "nvencipago");
        if ($valor == 1) {
            $importepagado = $importepagado + $importe;
            $vencimientos++;
        } else {
            $importepagado = $importepagado - $importe;
            $vencimientos--;
        }
        $importependiente = $importepago - $importepagado;
        $actualizar = "UPDATE tab_ordenpagos SET importepagado='" . $importepagado . "', importependiente='" . $importependiente . "',nvencipago=".$vencimientos." WHERE idpago=" . $idpago . " AND ejerciciopago=" . $ejerciciopago;
        $rsactualizar = mysql_query($actualizar);
    }
    
    function actualizar_situacion($idpago,$ejerciciopago) {
        $actualizar = "UPDATE tab_ordenpagos SET situacion=1 WHERE idpago=" . $idpago . " AND ejerciciopago=" . $ejerciciopago;
        $rsactualizar = mysql_query($actualizar);
    }
    
    function imprimir_ordenes($idproveedor, $fechaini, $fechafin, $situacion) {
        $cadena = "1=1";
        if ($idproveedor <> "") {
            $cadena.=" AND idproveedorpago = " . $idproveedor;
        }
        if ($situacion!="") {
            $cadena.=" AND situacion = " . $situacion;
        }
        $sql = "SELECT idpago,ejerciciopago,idproveedorpago,fechapago,importepago,nfacpago,nvencipago,
               importepagado,importependiente,prefijo
               FROM tab_ordenpagos
               WHERE " . $cadena . " AND borrado=0 AND (fechapago BETWEEN '" . $fechaini . "' AND '" . $fechafin . "')";
        $result = mysql_query($sql);
        return $result;
    }

}