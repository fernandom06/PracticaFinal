<?php
session_start();
$id_tiempo=$_SESSION["id_tiempo"];
//conexion a la bbdd
$mysqli=new mysqli('localhost','empresa','empresa','empresa');

//controlamos si existe un error en la conexion con la base de datos
if ($mysqli->connect_errno){
    $error=$mysqli->connect_errno;
    $mysqli->close();
    header('location:index.php');
}

echo $sql="UPDATE tiempos SET tiempo_salida=CURRENT_TIMESTAMP WHERE id_tiempo=$id_tiempo";
$mysqli->query($sql);
session_destroy();
header('location:index.php');
?>