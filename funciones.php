<?php
function no_sqli($dato){
    $dato=str_replace("'","",$dato);
    $dato=str_replace("%27","",$dato);
    $dato=str_replace(" ","",$dato);
    $dato=str_replace("%20","",$dato);
    $dato=str_replace("=","",$dato);
    $dato=str_replace("%3D","",$dato);
    $dato=str_replace("\"","",$dato);
    $dato=str_replace("%22","",$dato);
    $dato=str_replace("select","",$dato);
    $dato=str_replace("union","",$dato);
    return $dato;
}
?>