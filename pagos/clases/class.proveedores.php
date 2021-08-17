<?php

include_once("class.bd.php");

class proveedores {

    var $idproveedor;
    var $nomproveedor;
    var $cifproveedor;
    var $database;

    function proveedores() {
        $this->database = new MySQL();
    }

    function select($idproveedor) {
        $sql = "SELECT t1.idproveedor,t1.nomproveedor,t1.nomaltproveedor,t1.cifproveedor,t1.codcliproveedor,t1.identidad,
                t1.idsucursal,t2.codigoentidad,t2.nombreentidad,t3.codsucursal,t3.nombre,t1.ibanproveedor,t1.bicproveedor,
                t1.ndcproveedor,t1.ncuentaproveedor,t1.comentproveedor,t1.dirproveedor,t1.idpais,t1.idprovincia,t1.idpoblacion,
                t4.descpais,t5.denprovincia,t6.denpoblacion,t1.cpproveedor,t1.telproveedor,t1.faxproveedor,t1.emailproveedor,
                t1.contactoproveedor,t1.urlproveedor,t1.clavewebproveedor,t1.recargoeqproveedor,t1.irpfproveedor,t1.idformapago,
                t7.descformapago,t1.regimenfiscalproveedor,t1.idmoneda,t8.descmoneda,t1.codproveedor
                FROM tab_proveedores t1
                LEFT JOIN tab_entidades t2 ON t1.identidad=t2.identidad
                LEFT JOIN tab_sucursales t3 ON t1.idsucursal=t3.idsucursal
                LEFT JOIN tab_pais t4 ON t1.idpais=t4.idpais
                LEFT JOIN tab_provincias t5 ON t1.idprovincia=t5.idprovincia
                LEFT JOIN tab_poblaciones t6 ON (t1.idpoblacion=t6.idpoblacion AND t1.idpais=t6.idpais AND t1.idprovincia=t6.idprovincia)
                LEFT JOIN tab_formapago t7 ON t1.idformapago=t7.idformapago
                LEFT JOIN tab_monedas t8 ON t1.idmoneda=t8.idmoneda
                WHERE t1.idproveedor = $idproveedor AND t1.inactivoproveedor=0";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($nomproveedor, $cifproveedor) {
        $cadena = "1=1";
        if ($nomproveedor <> "") {
            $cadena.=" AND nomproveedor like '%$nomproveedor%'";
        }
        if ($cifproveedor <> "") {
            $cadena.=" AND cifproveedor like '%$cifproveedor%'";
        }
        $sql = "SELECT t1.idproveedor,t1.nomproveedor,t1.nomaltproveedor,t1.cifproveedor,t1.codcliproveedor,t1.identidad,
                t1.idsucursal,t2.codigoentidad,t2.nombreentidad,t3.codsucursal,t3.nombre,t1.ibanproveedor,t1.bicproveedor,
                t1.ndcproveedor,t1.ncuentaproveedor,t1.comentproveedor,t1.dirproveedor,t1.idpais,t1.idprovincia,t1.idpoblacion,
                t4.descpais,t5.denprovincia,t6.denpoblacion,t1.cpproveedor,t1.telproveedor,t1.faxproveedor,t1.emailproveedor,
                t1.contactoproveedor,t1.urlproveedor,t1.clavewebproveedor,t1.recargoeqproveedor,t1.irpfproveedor,t1.idformapago,
                t7.descformapago,t1.regimenfiscalproveedor,t1.idmoneda,t8.descmoneda,t1.codproveedor,t7.prefijo
                FROM tab_proveedores t1
                LEFT JOIN tab_entidades t2 ON t1.identidad=t2.identidad
                LEFT JOIN tab_sucursales t3 ON t1.idsucursal=t3.idsucursal
                LEFT JOIN tab_pais t4 ON t1.idpais=t4.idpais
                LEFT JOIN tab_provincias t5 ON t1.idprovincia=t5.idprovincia
                LEFT JOIN tab_poblaciones t6 ON (t1.idpoblacion=t6.idpoblacion AND t1.idpais=t6.idpais AND t1.idprovincia=t6.idprovincia)
                LEFT JOIN tab_formapago t7 ON t1.idformapago=t7.idformapago
                LEFT JOIN tab_monedas t8 ON t1.idmoneda=t8.idmoneda 
                WHERE $cadena AND t1.inactivoproveedor=0
                ORDER BY t1.nomproveedor ASC";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idproveedor) {
        $sql = "UPDATE tab_proveedores SET inactivoproveedor=1 WHERE idproveedor = $idproveedor";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_proveedores (nomproveedor,nomaltproveedor,cifproveedor,codproveedor,codcliproveedor,
                identidad,idsucursal,idpais,idprovincia,idpoblacion,ibanproveedor,bicproveedor,ndcproveedor,ncuentaproveedor,
                comentproveedor,dirproveedor,cpproveedor,telproveedor,faxproveedor,emailproveedor,contactoproveedor,urlproveedor,
                clavewebproveedor,recargoeqproveedor,irpfproveedor,idformapago,idmoneda,regimenfiscalproveedor) 
                VALUES ('$this->nomproveedor','$this->nomaltproveedor','$this->cifproveedor','$this->codproveedor',
                '$this->codcliproveedor',$this->identidad,$this->idsucursal,$this->idpais,$this->idprovincia,
                $this->idpoblacion,'$this->ibanproveedor','$this->bicproveedor','$this->ndcproveedor','$this->ncuentaproveedor',
                '$this->comentproveedor','$this->dirproveedor','$this->cpproveedor','$this->telproveedor','$this->faxproveedor','$this->emailproveedor',
                '$this->contactoproveedor','$this->urlproveedor','$this->clavewebproveedor',$this->recargoeqproveedor,'$this->irpfproveedor',
                $this->idformapago,$this->idmoneda,'$this->regimenfiscalproveedor')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idproveedor) {
        $sql = "UPDATE tab_proveedores SET  nomaltproveedor = '$this->nomaltproveedor',
                 codproveedor = '$this->codproveedor', codcliproveedor = '$this->codcliproveedor', identidad = $this->identidad, idsucursal = $this->idsucursal,
                 idpais = $this->idpais,idprovincia = $this->idprovincia,idpoblacion = $this->idpoblacion,ibanproveedor = '$this->ibanproveedor',
                bicproveedor = '$this->bicproveedor',ndcproveedor = '$this->ndcproveedor',ncuentaproveedor = '$this->ncuentaproveedor',comentproveedor = '$this->comentproveedor',
                dirproveedor = '$this->dirproveedor',cpproveedor = '$this->cpproveedor',telproveedor = '$this->telproveedor',faxproveedor = '$this->faxproveedor',
                emailproveedor = '$this->emailproveedor',contactoproveedor = '$this->contactoproveedor',urlproveedor = '$this->urlproveedor',clavewebproveedor = '$this->clavewebproveedor',
                recargoeqproveedor = $this->recargoeqproveedor,irpfproveedor = '$this->irpfproveedor',idformapago = $this->idformapago,idmoneda = $this->idmoneda,
                regimenfiscalproveedor = '$this->regimenfiscalproveedor'
                 WHERE idproveedor = $idproveedor";
        $result = mysql_query($sql);
    }
    
    function cif_duplicado($cif) {
        $sql = "SELECT cifproveedor FROM tab_proveedores WHERE cifproveedor='" . $cif . "'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

}