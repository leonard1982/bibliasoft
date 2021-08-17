<?php

include_once("class.bd.php");

class poblaciones {

    var $idpais;
    var $idprovincia;
    var $idpoblacion;
    var $denpoblacion;
    var $database;

    function poblaciones() {
        $this->database = new MySQL();
    }

    function select($idpoblacion) {
        $sql = "SELECT t1.idpoblacion,t1.denpoblacion,t1.idpais,t2.descpais,t1.idprovincia,t3.denprovincia FROM tab_poblaciones t1 
        INNER JOIN tab_pais t2 ON t1.idpais=t2.idpais 
        INNER JOIN tab_provincias t3 ON t1.idprovincia=t3.idprovincia
        WHERE t1.idpoblacion = $idpoblacion AND t1.borrado=0";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($idpais, $idprovincia, $denpoblacion) {
        $cadena = "1=1";
        if (($idpais <> "") && ($idpais <> "0")) {
            $cadena.=" AND t1.idpais=$idpais";
        }
        if (($idprovincia <> "") && ($idprovincia <> "0")) {
            $cadena.=" AND t1.idprovincia=$idprovincia";
        }
        if ($denpoblacion <> "") {
            $cadena.=" AND t1.denpoblacion like '%$denpoblacion%'";
        }
        $sql = "SELECT t1.idpoblacion,t1.denpoblacion,t1.idpais,t2.descpais,t1.idprovincia,t3.denprovincia FROM tab_poblaciones t1 
        INNER JOIN tab_pais t2 ON t1.idpais=t2.idpais 
        INNER JOIN tab_provincias t3 ON t1.idprovincia=t3.idprovincia
        WHERE $cadena AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idpoblacion) {
        $sql = "UPDATE tab_poblaciones SET borrado='1' WHERE idpoblacion = $idpoblacion";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_poblaciones ( idpais, idprovincia, denpoblacion) VALUES ( ".$this->idpais.",".$this->idprovincia.",'".$this->denpoblacion."'  )";
        $result = mysql_query($sql);
        return $idpoblacion++;
    }

    function update($idpoblacion) {
        $sql = " UPDATE tab_poblaciones SET  denpoblacion = '$this->denpoblacion', idpais = $this->idpais, idprovincia = $this->idprovincia WHERE idpoblacion = $idpoblacion ";
        $result = mysql_query($sql);
    }

    function llenar_combo_poblaciones() {
        $sql = "SELECT idpoblacion,denpoblacion FROM tab_poblaciones WHERE borrado=0 ORDER BY denpoblacion ASC";
        $result = mysql_query($sql);
        return $result;
    }
    
     function llenar_combo_poblaciones_por_provincias($idprovincia) {
        $sql = "SELECT idpoblacion,denpoblacion FROM tab_poblaciones WHERE idprovincia=$idprovincia AND borrado=0 ORDER BY denpoblacion ASC";
        $result = mysql_query($sql);
        return $result;
    }

}

?>