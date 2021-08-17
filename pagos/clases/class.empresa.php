<?php

include_once("class.bd.php");

class empresa {

    var $idempresa;
    var $database;

    function empresa() {
        $this->database = new MySQL();
    }

    function select($idempresa) {
        $sql = "SELECT idempresa,nombre,cif,direccion,idpoblacion,idprovincia,idpais,telefono,movil,fax,cp,web,email,
                num_reg,num_pago,num_vencimiento,num_transferencia,identidad,idsucursal,iban
                FROM tab_empresa WHERE idempresa = $idempresa";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function update($idempresa) {
        $sql = "UPDATE tab_empresa SET nombre = '$this->nombre' , cif = '$this->cif', 
                direccion = '$this->direccion', idpoblacion = '$this->idpoblacion' , idprovincia = '$this->idprovincia',
                idpais = '$this->idpais', telefono = '$this->telefono' , movil = '$this->movil',
                fax = '$this->fax', cp = '$this->cp' , web = '$this->web', email = '$this->email' , num_reg = '$this->num_reg',
                num_pago = '$this->num_pago', num_vencimiento = '$this->num_vencimiento' , num_transferencia = '$this->num_transferencia',
                identidad = '$this->identidad', idsucursal = '$this->idsucursal', iban = '$this->iban'
                WHERE idempresa = $idempresa ";
        $result = mysql_query($sql);
    }

}

?>