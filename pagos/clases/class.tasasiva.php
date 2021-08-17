<?php

include_once("class.bd.php");

class tasasiva {

    var $idtasaiva;
    var $idtipoiva;
    var $database;

    function tasasiva() {
        $this->database = new MySQL();
    }

    function select($idtasaiva) {
        $sql = "SELECT t1.idtasaiva,t1.idtipoiva,t1.porcentasa_iva,t1.porcentretasa_iva,t1.fechatasa_iva,t2.desctipo_iva 
                FROM tab_tasaiva t1 
                INNER JOIN tab_tipoiva t2 ON t1.idtipoiva=t2.codtipoiva 
                WHERE t1.idtasaiva = $idtasaiva AND t1.borrado=0";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($idtipoiva) {
        $cadena = "1=1";
        if (($idtipoiva <> "") && ($idtipoiva <> "0")) {
            $cadena.=" AND t1.idtipoiva=$idtipoiva";
        }
        $sql = "SELECT t1.idtasaiva,t1.idtipoiva,t1.porcentasa_iva,t1.porcentretasa_iva,t1.fechatasa_iva,t2.desctipo_iva 
                FROM tab_tasaiva t1 
                INNER JOIN tab_tipoiva t2 ON t1.idtipoiva=t2.codtipoiva 
                WHERE $cadena AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idtasaiva) {
        $sql = "UPDATE tab_tasaiva SET borrado='1' WHERE idtasaiva = $idtasaiva";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_tasaiva ( idtipoiva,porcentasa_iva,porcentretasa_iva,fechatasa_iva) 
                VALUES ($this->idtipoiva,'$this->porcentasa_iva','$this->porcentretasa_iva','$this->fechatasa_iva')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idtasaiva) {
        $sql = "UPDATE tab_tasaiva SET  idtipoiva = $this->idtipoiva, porcentasa_iva = $this->porcentasa_iva,
                porcentretasa_iva = $this->porcentretasa_iva, fechatasa_iva = '$this->fechatasa_iva'
                WHERE idtasaiva = $idtasaiva ";
        $result = mysql_query($sql);
    }
    
    function llenar_combo_tasasiva($tipoiva) {
        $sql = "SELECT idtasaiva,idtipoiva,porcentasa_iva,porcentretasa_iva,fechatasa_iva FROM tab_tasaiva 
                WHERE idtipoiva=".$tipoiva." AND borrado=0 ORDER BY porcentasa_iva ASC";
        $result = mysql_query($sql);
        return $result;
    }
    
}

?>