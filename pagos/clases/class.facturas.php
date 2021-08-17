<?php

include_once("class.bd.php");

class facturas {

    var $idfactura;
    var $ejercicio;
    var $nomproveedor;
    var $database;

    function facturas() {
        $this->database = new MySQL();
    }

    function select($idfactura, $ejercicio) {
        $sql = "SELECT t1.idfacturap,t1.ejercicio,t1.numfacturap,t1.reffacturap,t1.ffacturap,t1.descfacturap,t1.contactfacturap,
               t1.telfacturap,t1.procesadafacturap,t1.comentfacturap,t1.idusuario,t1.idproveedor,t1.idformapago,t1.totalfacturap,t1.b1impfacturap,         
               t1.b2impfacturap,t1.b3impfacturap,t1.b4impfacturap,t1.bretimpfacturap,t1.tiva1facturap,t1.tiva2facturap,
               t1.tiva3facturap,t1.tiva4facturap,t1.tret1facturap,t1.tiporetefacturap,t1.c1ivafacturap,t1.c2ivafacturap,
               t1.c3ivafacturap,t1.c4ivafacturap,t1.idordenpago,t1.nlorpago_facturap,t1.idmoneda,t2.nomproveedor,
               t2.cifproveedor,t3.nombre,t4.descformapago,t5.descmoneda,t1.impfacturap,t1.idcentroscoste,t1.idtasaiva1,t1.idtasaiva2,t1.idtasaiva3,
               t1.idtasaiva4,t1.pcuenta
               FROM tab_facturas t1
               LEFT JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor
               LEFT JOIN tab_usuarios t3 ON t1.idusuario=t3.idusuario
               LEFT JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
               LEFT JOIN tab_monedas t5 ON t1.idmoneda=t5.idmoneda
               WHERE t1.idfacturap = " . $idfactura . " AND t1.ejercicio=" . $ejercicio;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($idproveedor, $ejercicio, $procesadas) {
        $cadena = "1=1";
        if ($procesadas <> "") {
            $cadena.=" AND t1.procesadafacturap = " . $procesadas;
        }
        if ($idproveedor <> "") {
            $cadena.=" AND t1.idproveedor = " . $idproveedor;
        }
        if (($ejercicio <> "") && ($ejercicio <> "0")) {
            $cadena.=" AND t1.ejercicio = '" . $ejercicio . "'";
        }
        $sql = "SELECT t1.idfacturap,t1.ejercicio,t1.numfacturap,t1.reffacturap,t1.ffacturap,t1.descfacturap,t1.contactfacturap,
               t1.telfacturap,t1.procesadafacturap,t1.comentfacturap,t1.idusuario,t1.idproveedor,t1.idformapago,t1.totalfacturap,t1.b1impfacturap,         
               t1.b2impfacturap,t1.b3impfacturap,t1.b4impfacturap,t1.bretimpfacturap,t1.tiva1facturap,t1.tiva2facturap,
               t1.tiva3facturap,t1.tiva4facturap,t1.tret1facturap,t1.tiporetefacturap,t1.c1ivafacturap,t1.c2ivafacturap,
               t1.c3ivafacturap,t1.c4ivafacturap,t1.idordenpago,t1.nlorpago_facturap,t1.idmoneda,t2.nomproveedor,
               t2.cifproveedor,t3.nombre,t4.descformapago,t5.descmoneda,t1.impfacturap,t1.idcentroscoste,t1.idtasaiva1,t1.idtasaiva2,t1.idtasaiva3,
               t1.idtasaiva4,t5.codmoneda,t1.pcuenta
               FROM tab_facturas t1
               LEFT JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor
               LEFT JOIN tab_usuarios t3 ON t1.idusuario=t3.idusuario
               LEFT JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
               LEFT JOIN tab_monedas t5 ON t1.idmoneda=t5.idmoneda 
               LEFT JOIN tab_centroscoste t6 ON t1.idcentroscoste=t6.idcentroscoste
               WHERE " . $cadena;
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idfactura, $ejercicio) {
        $sql = "UPDATE tab_facturas SET borrado=1 WHERE idfactura = " . $idfactura . " AND ejercicio=" . $ejercicio;
        $result = mysql_query($sql);
    }

    function obtener_num_factura($ejercicio) {
        $sql = "SELECT MAX(idfacturap) as maximo FROM tab_facturas WHERE ejercicio=" . $ejercicio;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        if (empty($row[0])) {
            $numfactura = 1;
        } else {
            $numfactura = $row[0] + 1;
        }
        return $numfactura;
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_facturas (ejercicio,idfacturap,ffacturap,numfacturap,reffacturap,descfacturap,
                contactfacturap,telfacturap,procesadafacturap,idusuario,idproveedor,idformapago,idmoneda,totalfacturap,comentfacturap,
                b1impfacturap,b2impfacturap,b3impfacturap,b4impfacturap,tiva1facturap,tiva2facturap,tiva3facturap,tiva4facturap,
                idtasaiva1,idtasaiva2,idtasaiva3,idtasaiva4,c1ivafacturap,c2ivafacturap,c3ivafacturap,c4ivafacturap,tret1facturap,
                tiporetefacturap,impfacturap,bretimpfacturap,totalret,idcentroscoste,pcuenta) 
                VALUES ('$this->ejercicio','$this->idfacturap','$this->ffacturap','$this->numfacturap','$this->reffacturap','$this->descfacturap',
                '$this->contactfacturap','$this->telfacturap','$this->procesadafacturap','$this->idusuario',
                '$this->idproveedor','$this->idformapago','$this->idmoneda','$this->totalfacturap','$this->comentfacturap','$this->b1impfacturap',
                '$this->b2impfacturap','$this->b3impfacturap','$this->b4impfacturap','$this->tiva1facturap','$this->tiva2facturap','$this->tiva3facturap',
                '$this->tiva4facturap','$this->tasaiva1','$this->tasaiva2','$this->tasaiva3','$this->tasaiva4',
                '$this->c1ivafacturap','$this->c2ivafacturap','$this->c3ivafacturap','$this->c4ivafacturap',
                '$this->tret1facturap','$this->tiporetefacturap','$this->impfacturap','$this->bretimpfacturap','$this->totalret','$this->idcentroscoste','$this->pcuenta')";
        $result = mysql_query($sql);
    }

    function update($idfactura, $ejercicio) {
        $sql = "UPDATE tab_facturas SET  ffacturap = '$this->ffacturap', numfacturap = '$this->numfacturap', reffacturap = '$this->reffacturap',
                descfacturap = '$this->descfacturap', contactfacturap = '$this->contactfacturap', telfacturap = '$this->telfacturap', procesadafacturap = '$this->procesadafacturap',
                idusuario = '$this->idusuario',idproveedor = '$this->idproveedor',idformapago = '$this->idformapago',idmoneda = '$this->idmoneda',
                totalfacturap = '$this->totalfacturap',comentfacturap = '$this->comentfacturap',b1impfacturap = '$this->b1impfacturap',b2impfacturap = '$this->b2impfacturap',
                b3impfacturap = '$this->b3impfacturap',b4impfacturap = '$this->b4impfacturap',tiva1facturap = '$this->tiva1facturap',tiva2facturap = '$this->tiva2facturap',
                tiva3facturap = '$this->tiva3facturap',tiva4facturap = '$this->tiva4facturap',idtasaiva1 = '$this->idtasaiva1',idtasaiva2 = '$this->idtasaiva2',
                idtasaiva3 = '$this->idtasaiva3',idtasaiva4 = '$this->idtasaiva4',c1ivafacturap = $this->c1ivafacturap,c2ivafacturap = '$this->c2ivafacturap',
                c3ivafacturap = '$this->c3ivafacturap',c4ivafacturap = '$this->c4ivafacturap',tret1facturap = '$this->tret1facturap',tiporetefacturap = '$this->tiporetefacturap',
                impfacturap = '$this->impfacturap',bretimpfacturap = '$this->bretimpfacturap',totalret = '$this->totalret',idcentroscoste = '$this->idcentroscoste',pcuenta = '$this->pcuenta'
                WHERE idfacturap =" . $idfactura . " AND ejercicio=" . $ejercicio;
        $result = mysql_query($sql);
    }

    function update_factura_ordenpago($idfactura, $ejercicio, $idpago, $ejerciciop, $linea) {
        $consulta = "SELECT MAX(nlorpago_facturap) as maximo FROM tab_facturas WHERE idfacturap=".$idfactura." AND
                ejercicio=".$ejercicio;
        $rs = mysql_query($consulta);
        $row = mysql_fetch_row($rs);
        if ($row[0]=="") { $linea=0; } else { $linea=$row[0]; }
        $linea++;
        $sql = "UPDATE tab_facturas SET procesadafacturap=1,idordenpago=" . $idpago . ",ejerciciopago=".$ejerciciop.",
                nlorpago_facturap=" . $linea . "
                WHERE idfacturap =" . $idfactura . " AND ejercicio=" . $ejercicio;
        $result = mysql_query($sql);
    }
    
    function listar_facturas_sinprocesar_proveedor($idp) {
        $sql = "SELECT idfacturap,ejercicio,numfacturap,ffacturap,totalfacturap,impfacturap FROM tab_facturas
                    WHERE idproveedor=".$idp." AND procesadafacturap=0";
        $result = mysql_query($sql);
        return $result;
    }
    
    function listar_facturas_procesadas_ordenpago($idpago,$ejerciciopago) {
        $sql = "SELECT idfacturap,ejercicio,numfacturap,ffacturap,totalfacturap,impfacturap FROM tab_facturas
                    WHERE idordenpago=".$idpago." AND ejerciciopago=".$ejerciciopago." AND procesadafacturap=1";
        $result = mysql_query($sql);
        return $result;
    }
    
    function numero_listar_facturas_procesadas_ordenpago($idpago,$ejerciciopago) {
        $sql = "SELECT idfacturap,ejercicio,numfacturap,ffacturap,totalfacturap,impfacturap FROM tab_facturas
                    WHERE idordenpago=".$idpago." AND ejerciciopago=".$ejerciciopago." AND procesadafacturap=1";
        $result = mysql_query($sql);
        return mysql_num_rows($result);
    }
    
    function actualizar_procesadas($codfacturap, $ejercicio, $idpago, $ejerciciopago, $numlinea) {
        $sql = "UPDATE tab_facturas SET procesadafacturap=1,idordenpago=".$idpago.",ejerciciopago=".$ejerciciopago.",nlorpago_facturap=".$numlinea." 
                WHERE idfacturap=".$codfacturap." AND ejercicio=".$ejercicio;
        $rs = mysql_query($sql);
    }
    
    function liberar_facturas($idpago,$ejercicio) {
        $sql ="UPDATE tab_facturas SET procesadafacturap=0,idordenpago=0,ejerciciopago=0,nlorpago_facturap=0
                WHERE idordenpago=".$idpago." AND ejerciciopago=".$ejercicio;
        $rs = mysql_query($sql);
    }
    
    function imprimir_facturas($idproveedor, $fechadesde, $fechahasta, $pagadas) {
        $cadena = " AND 1=1";
        if ($pagadas== "1") {
            $cadena.=" AND t1.idordenpago > 0";
        }
        if ($pagadas== "0") {
            $cadena.=" AND t1.idordenpago = 0";
        }
        $sql = "SELECT t1.idfacturap,t1.ejercicio,t1.numfacturap,t1.reffacturap,t1.ffacturap,t1.descfacturap,t1.contactfacturap,
               t1.telfacturap,t1.procesadafacturap,t1.comentfacturap,t1.idusuario,t1.idproveedor,t1.idformapago,t1.totalfacturap,t1.b1impfacturap,         
               t1.b2impfacturap,t1.b3impfacturap,t1.b4impfacturap,t1.bretimpfacturap,t1.tiva1facturap,t1.tiva2facturap,
               t1.tiva3facturap,t1.tiva4facturap,t1.tret1facturap,t1.tiporetefacturap,t1.c1ivafacturap,t1.c2ivafacturap,
               t1.c3ivafacturap,t1.c4ivafacturap,t1.idordenpago,t1.nlorpago_facturap,t1.idmoneda,t2.nomproveedor,
               t2.cifproveedor,t3.nombre,t4.descformapago,t5.descmoneda,t1.impfacturap,t1.idcentroscoste,t1.idtasaiva1,t1.idtasaiva2,t1.idtasaiva3,
               t1.idtasaiva4,t5.codmoneda,t1.pcuenta
               FROM tab_facturas t1
               LEFT JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor
               LEFT JOIN tab_usuarios t3 ON t1.idusuario=t3.idusuario
               LEFT JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
               LEFT JOIN tab_monedas t5 ON t1.idmoneda=t5.idmoneda 
               LEFT JOIN tab_centroscoste t6 ON t1.idcentroscoste=t6.idcentroscoste
               WHERE t1.idproveedor = " . $idproveedor. " AND (t1.ffacturap BETWEEN '".$fechadesde."' AND '".$fechahasta."')".$cadena. "
                    ORDER BY t1.ffacturap ASC";
        $result = mysql_query($sql);
        return $result;
    }
    
    function imprimir_libro_facturas($fechadesde, $fechahasta) {
        $sql = "SELECT t1.idfacturap,t1.ejercicio,t1.numfacturap,t1.ffacturap,t1.idproveedor,t1.idformapago,
                t1.totalfacturap,t2.nomproveedor,t4.descformapago,t1.impfacturap,t1.pcuenta,t2.codproveedor
               FROM tab_facturas t1
               LEFT JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor
               LEFT JOIN tab_formapago t4 ON t1.idformapago=t4.idformapago
               WHERE (t1.ffacturap BETWEEN '".$fechadesde."' AND '".$fechahasta."') 
                    ORDER BY t1.ejercicio ASC, t1.idfacturap ASC";
        $result = mysql_query($sql);
        return $result;
    }

}