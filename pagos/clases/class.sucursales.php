<?php

include_once("class.bd.php");

class sucursales {

    var $identidad;
    var $idsucursal;
    var $nombre;
    var $idpais;
    var $idprovincia;
    var $idpoblacion;
    var $database;

    function sucursales() {
        $this->database = new MySQL();
    }

    function select($idsucursal) {
        $sql = "SELECT t1.idsucursal,t1.identidad,t1.codsucursal,t5.codigoentidad,t1.nombre,t1.telefono,t1.direccion,
                t1.cp,t1.idpoblacion,t1.idprovincia,t1.idpais,t1.contacto,t1.correo,t2.descpais,t3.denprovincia,
                t4.denpoblacion,t5.nombreentidad
                FROM tab_sucursales t1 
                INNER JOIN tab_pais t2 ON t1.idpais=t2.idpais 
                INNER JOIN tab_provincias t3 ON t1.idprovincia=t3.idprovincia
                INNER JOIN tab_poblaciones t4 ON t1.idpoblacion=t4.idpoblacion
                INNER JOIN tab_entidades t5 ON t1.identidad=t5.identidad
                WHERE t1.idsucursal = $idsucursal AND t1.borrado=0";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($identidad, $nombre, $idpais, $idprovincia, $idpoblacion) {
        $cadena = "1=1";
        if (($identidad <> "") && ($identidad <> "0")) {
            $cadena.=" AND t1.identidad=$identidad";
        }
        if (($idpais <> "") && ($idpais <> "0")) {
            $cadena.=" AND t1.idpais=$idpais";
        }
        if (($idprovincia <> "") && ($idprovincia <> "0")) {
            $cadena.=" AND t1.idprovincia=$idprovincia";
        }
        if (($idpoblacion <> "") && ($idpoblacion <> "0")) {
            $cadena.=" AND t1.idpoblacion=$idpoblacion";
        }
        if ($nombre <> "") {
            $cadena.=" AND t1.nombre like '%$nombre%'";
        }
        $sql = "SELECT t1.idsucursal,t1.identidad,t1.codsucursal,t5.codigoentidad,t1.nombre,t1.telefono,t1.direccion,
                t1.cp,t1.idpoblacion,t1.idprovincia,t1.idpais,t1.contacto,t1.correo,t2.descpais,t3.denprovincia,
                t4.denpoblacion,t5.nombreentidad 
                FROM tab_sucursales t1 
                INNER JOIN tab_pais t2 ON t1.idpais=t2.idpais 
                INNER JOIN tab_provincias t3 ON t1.idprovincia=t3.idprovincia
                INNER JOIN tab_poblaciones t4 ON t1.idpoblacion=t4.idpoblacion
                INNER JOIN tab_entidades t5 ON t1.identidad=t5.identidad
                WHERE $cadena AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idsucursal) {
        $sql = "UPDATE tab_sucursales SET borrado='1' WHERE idsucursal = $idsucursal";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_sucursales (identidad,codsucursal,nombre,telefono,direccion,cp,idpais,idprovincia,
                idpoblacion,contacto,correo) VALUES 
                ($this->identidad,'$this->codsucursal','$this->nombre','$this->telefono','$this->direccion','$this->cp',
                $this->idpais,$this->idprovincia,$this->idpoblacion,'$this->contacto','$this->correo')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idsucursal) {
        $sql = "UPDATE tab_sucursales SET  telefono = '$this->telefono',direccion = '$this->direccion',
                cp = '$this->cp',idpais = $this->idpais,idprovincia = $this->idprovincia,
                idpoblacion = $this->idpoblacion,contacto = '$this->contacto',correo = '$this->correo'
                WHERE idsucursal = $idsucursal";
        $result = mysql_query($sql);
    }

    function llenar_combo_entidades_por_sucursal($identidad) {
        $sql = "SELECT idsucursal,nombre FROM tab_sucursales WHERE identidad=$identidad AND borrado=0 ORDER BY nombre ASC";
        $result = mysql_query($sql);
        return $result;
    }

}

?>