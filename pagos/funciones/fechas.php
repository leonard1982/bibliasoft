<?php

function implota($fecha) { // bd2local
    if (($fecha == "") || ($fecha == "0000-00-00"))
        return "";
    $vector_fecha = explode("-", $fecha);
    $aux = $vector_fecha[2];
    $vector_fecha[2] = $vector_fecha[0];
    $vector_fecha[0] = $aux;
    return implode("/", $vector_fecha);
}

;

function explota($fecha) { // local2bd
    $vector_fecha = explode("/", $fecha);
    $aux = $vector_fecha[2];
    $vector_fecha[2] = $vector_fecha[0];
    $vector_fecha[0] = $aux;
    return implode("-", $vector_fecha);
}

;

function acinco($num) { //pone 5 d�gitos al n�mero de expediente con ceros iniciales
    while (strlen($num) < 5) {
        $num = "0" . $num;
    }
    return $num;
}

;

function convertir_fecha($fecha_datetime) {
    //Esta funci�n convierte la fecha del formato DATETIME de SQL
    //a formato DD-MM-YYYY HH:mm:ss
    //$fecha = split("-",$fecha_datetime);

    $anno = substr($fecha_datetime, 0, 4);
    $mes = substr($fecha_datetime, 5, 2);
    $dia = substr($fecha_datetime, 8, 2);
    $fecha_datetime = substr($fecha_datetime, 11);
    $fecha_convertida = $dia . '/' . $mes . '/' . $anno . '
	' . $fecha_datetime;
    return $fecha_convertida;
}

;

function nombremes($mes) {
    setlocale(LC_TIME, 'es_ES');
    $nombre = strftime("%B", mktime(0, 0, 0, $mes, 1, 2000));
    return $nombre;
}

;
?>