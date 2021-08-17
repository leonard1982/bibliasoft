<?php

include_once("class.bd.php");

class trabajadores {

    var $idtrabajador;
    var $nomtrabajador;
    var $apetrabajador;
    var $nsstrabajador;
    var $database;

    function trabajadores() {
        $this->database = new MySQL();
    }

    function select($idtrabajador) {
        $sql = "SELECT idtrabajador,nomtrabajador,apellidostrabajador,dirtrabajador,nsstrabajador,teltrabajador,
                moviltrabajador,emailtrabajador,activotrabajador FROM tab_trabajador 
                WHERE idtrabajador = $idtrabajador AND activotrabajador=1";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($nomtrabajador, $apetrabajador, $nsstrabajador) {
        $cadena = "1=1";
        if ($nomtrabajador <> "") {
            $cadena.=" AND nomtrabajador like '%$nomtrabajador%'";
        }
        if ($apetrabajador <> "") {
            $cadena.=" AND apetrabajador like '%$apetrabajador%'";
        }
        if ($nsstrabajador <> "") {
            $cadena.=" AND nsstrabajador like '%$nsstrabajador%'";
        }
        $sql = "SELECT idtrabajador,nomtrabajador,apellidostrabajador,dirtrabajador,nsstrabajador,teltrabajador,
                moviltrabajador,emailtrabajador,activotrabajador 
                FROM tab_trabajador WHERE $cadena AND activotrabajador=1";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idtrabajador) {
        $sql = "UPDATE tab_trabajador SET activotrabajador=0 WHERE idtrabajador = $idtrabajador";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_trabajador (nomtrabajador,apellidostrabajador,dirtrabajador,nsstrabajador,
                teltrabajador,moviltrabajador,emailtrabajador) 
                VALUES ('$this->nomtrabajador','$this->apellidostrabajador','$this->dirtrabajador',
                '$this->nsstrabajador','$this->teltrabajador','$this->moviltrabajador','$this->emailtrabajador')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idtrabajador) {
        $sql = " UPDATE tab_trabajador SET  nomtrabajador = '$this->nomtrabajador', apellidostrabajador = '$this->apellidostrabajador', dirtrabajador = '$this->dirtrabajador',
                 nsstrabajador = '$this->nsstrabajador', teltrabajador = '$this->teltrabajador', moviltrabajador = '$this->moviltrabajador', emailtrabajador = '$this->emailtrabajador'
                 WHERE idtrabajador = $idtrabajador";
        $result = mysql_query($sql);
    }

}