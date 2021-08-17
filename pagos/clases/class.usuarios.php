<?php

include_once("class.bd.php");

class usuarios {

    var $idusuario;
    var $login;
    var $nombre;
    var $database;

    function usuarios() {
        $this->database = new MySQL();
    }

    function select($idusuario) {
        $sql = "SELECT login,pswd,nombre,email FROM tab_usuarios
                WHERE idusuario = " . $idusuario . " AND activo=1";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($login, $nombre) {
        $cadena = "1=1";
        if ($login <> "") {
            $cadena.=" AND login like '%$login%'";
        }
        if ($nombre <> "") {
            $cadena.=" AND nombre like '%$login%'";
        }
        $sql = "SELECT idusuario,login,pswd,nombre,email FROM tab_usuarios WHERE $cadena AND activo=1";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idusuario) {
        $sql = "UPDATE tab_usuarios SET activo=0 WHERE idusuario = " . $idusuario;
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_usuarios (login,pswd,nombre,email) 
                VALUES ('$this->login','$this->pswd','$this->nombre',
                '$this->email')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function login_duplicado($login) {
        $sql = "SELECT login FROM tab_usuarios WHERE login='" . $login . "'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function update($idusuario) {
        $sql = "UPDATE tab_usuarios SET  pswd = '$this->pswd', email = '$this->email'
                 WHERE idusuario = " . $idusuario;
        $result = mysql_query($sql);
    }

    function update_parcial($idusuario) {
        $sql = "UPDATE tab_usuarios SET  nombre = '$this->nombre', email = '$this->email'
                 WHERE idusuario = " . $idusuario;
        $result = mysql_query($sql);
    }

    function llenar_combo_usuarios() {
        $sql = "SELECT idusuario,login,nombre FROM tab_usuarios WHERE activo=1 ORDER BY nombre ASC";
        $result = mysql_query($sql);
        return $result;
    }

    function funciones_padres() {
        $sql = "SELECT idfunciones,denominacion,orden 
               FROM tab_funciones 
               WHERE idpadre=0
               ORDER BY orden ASC";
        $result = mysql_query($sql);
        return $result;
    }

    function funciones_hijos($idpadre) {
        $sql = "SELECT idfunciones,denominacion,orden,idpadre,url 
               FROM tab_funciones 
               WHERE idpadre=" . $idpadre . "
               ORDER BY orden ASC";
        $result = mysql_query($sql);
        return $result;
    }

    function funciones_total_hijos() {
        $sql = "SELECT idfunciones,denominacion,orden,idpadre,url 
               FROM tab_funciones 
               WHERE idpadre>0
               ORDER BY idfunciones ASC";
        $result = mysql_query($sql);
        return $result;
    }

    function insertar_permisos() {
        $sql = "INSERT INTO tab_permisos (idusuario,idfuncion,permisos) 
                VALUES ($this->idusuario,$this->idfuncion,'$this->permisos')";
        $result = mysql_query($sql);
    }

    function delete_permisos($idusuario) {
        $sql = "DELETE FROM tab_permisos WHERE idusuario=" . $idusuario;
        $result = mysql_query($sql);
    }

    function permisos_usuario_por_funcion($idusuario, $idfuncion) {
        $sql = "SELECT permisos FROM tab_permisos WHERE idusuario=" . $idusuario . " AND idfuncion=" . $idfuncion;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function tiene_hijos_autorizados($idusuario, $idfuncion) {
        $sql = "SELECT t3.idfunciones FROM tab_permisos t2
                INNER JOIN tab_funciones t3 ON t2.idfuncion=t3.idfunciones
                WHERE t2.idusuario=".$idusuario." AND t3.idpadre=".$idfuncion." AND t2.permisos<>'prohibido'";
        $result = mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            return 1;
        } else {
            return 0;
        }
    }

}
