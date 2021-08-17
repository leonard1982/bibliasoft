<?php

include_once("class.bd.php");

class envios {

    var $idenvio;
    var $fechadesde;
    var $fechahasta;
    var $idproveedor;
    var $database;

    function envios() {
        $this->database = new MySQL();
    }

    function select($idenvio) {
        $sql = "SELECT idenvio,fechaenvio,idproveedor,cpproveedor,razonsocial,direccion,poblacion,provincia,cif,codigo,borrado
               FROM tab_envios 
               WHERE idenvio = " . $idenvio;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($idproveedor, $fechadesde, $fechahasta) {
        $cadena = "1=1";
        if ($idproveedor <> "") {
            $cadena.=" AND idproveedor = " . $idproveedor;
        }
        $sql = "SELECT idenvio,fechaenvio,idproveedor,cpproveedor,razonsocial,direccion,poblacion,provincia,cif,codigo
                FROM tab_envios                
                WHERE " . $cadena . " AND borrado=0 AND (fechaenvio BETWEEN '" . $fechadesde . "' AND '" . $fechahasta . "')";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idenvio) {
        $sql = "UPDATE tab_envios SET borrado=1 WHERE idenvio = " . $idenvio;
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_envios (fechaenvio,idproveedor,cpproveedor,razonsocial,direccion,poblacion,
                provincia,cif,codigo) 
                VALUES ('$this->fechaenvio','$this->idproveedor','$this->cpproveedor','$this->razonsocial',
                '$this->direccion','$this->poblacion','$this->provincia','$this->cif','$this->codigo')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idenvio) {
        $sql = "UPDATE tab_envios SET  fechaenvio = '$this->fechaenvio', idproveedor = '$this->idproveedor', 
                cpproveedor = '$this->cpproveedor',razonsocial = '$this->razonsocial', 
                direccion = '$this->direccion', poblacion = '$this->poblacion',provincia = '$this->provincia',
                cif = '$this->cif',codigo = '$this->codigo'
                WHERE idenvio =" . $idenvio;
        $result = mysql_query($sql);
    }

}