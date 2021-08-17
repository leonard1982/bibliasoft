<?php

include_once("class.bd.php");

class backup {

    var $idusuario;
    var $database;

    function backup() {
        $this->database = new MySQL();
    }

    function eliminar($id) {
        $sql = "UPDATE tab_backup SET borrado=1 WHERE id = " . $id;
        $result = mysql_query($sql);
    }

    function insertar() {
        $sql = "INSERT INTO tab_backup (denominacion,archivo) 
                VALUES ('" . $this->denominacion . "','" . $this->archivo . "')";
        $result = mysql_query($sql);
    }

    function dame_dirbase() {
        $sql = "show variables where variable_name= 'basedir'";
        $result = mysql_query($sql);
        return mysql_result($result, 0, "value");
    }

    function buscar($fechaini, $fechafin, $denominacion) {
        $cadena = "1=1";
        if ($denominacion <> "") {
            $cadena.=" AND denominacion like '%" . $denominacion . "%'";
        }
        $sql = "SELECT id,denominacion,DATE_FORMAT(fecha,'%d/%m/%Y %H:%i:%s'),archivo FROM tab_backup
                 WHERE " . $cadena . " AND borrado=0 AND (fecha BETWEEN '".$fechaini."' AND '".$fechafin."')";
        $result = mysql_query($sql);
        return $result;
    }

    function dame_maximo() {
        $sel_maximo = "SELECT max(id) as maximo FROM tab_backup";
        $rs_maximo = mysql_query($sel_maximo);
        $identif = mysql_result($rs_maximo, 0, "maximo");
        if ($identif=="") $identif=0;
        $identif++;
        return $identif;
    }

    function select($id) {
        $sql = "SELECT id,denominacion,DATE_FORMAT(fecha,'%d/%m/%Y %H:%i:%s'),archivo FROM tab_backup
                 WHERE id=" . $id;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function Backup_Database() {
        $sql = "SELECT database() as base_datos";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        $this->dbName = $row[0];
        $this->charset = 'utf8';

        if (!mysql_set_charset($this->charset)) {
            mysql_query('SET NAMES ' . $this->charset);
        }
        $tables = '*';
        $outputDir = '.';
        try {

            if ($tables == '*') {
                $tables = array();
                $result = mysql_query('SHOW TABLES');
                while ($row = mysql_fetch_row($result)) {
                    $tables[] = $row[0];
                }
            } else {
                $tables = is_array($tables) ? $tables : explode(',', $tables);
            }

            $sql = 'CREATE DATABASE IF NOT EXISTS ' . $this->dbName . ";\n\n";
            $sql .= 'USE ' . $this->dbName . ";\n\n";


            foreach ($tables as $table) {
                if ($table != "tab_backup") {

                    $result = mysql_query('SELECT * FROM ' . $table);
                    $numFields = mysql_num_fields($result);

                    $sql .= 'DROP TABLE IF EXISTS ' . $table . ';';
                    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE ' . $table));
                    $sql.= "\n\n" . $row2[1] . ";\n\n";

                    for ($i = 0; $i < $numFields; $i++) {
                        while ($row = mysql_fetch_row($result)) {
                            $sql .= 'INSERT INTO ' . $table . ' VALUES(';
                            for ($j = 0; $j < $numFields; $j++) {
                                $row[$j] = addslashes($row[$j]);
                                $row[$j] = ereg_replace("\n", "\\n", $row[$j]);
                                if (isset($row[$j])) {
                                    $sql .= '"' . $row[$j] . '"';
                                } else {
                                    $sql.= '""';
                                }

                                if ($j < ($numFields - 1)) {
                                    $sql .= ',';
                                }
                            }

                            $sql.= ");\n";
                        }
                    }

                    $sql.="\n\n\n";
                }
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }

        return $this->saveFile($sql);
    }

    protected function saveFile(&$sql) {
        $outputDir = '../copias';
        $nombre = $this->dame_maximo();
        if (!$sql)
            return false;

        try {
            $handle = fopen($outputDir . '/' . $nombre . '.sql', 'w+');
            fwrite($handle, $sql);
            fclose($handle);
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }

        return true;
    }

}
?>