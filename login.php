<?php
if (isset($_POST["login"])==false || isset($_POST["pass"])==false){
    header("location:index.php");
}else {
    $login = $_POST["login"];
}

//conexion a la bbdd
$mysqli=new mysqli('localhost','empresa','empresa','empresa');

//controlamos si existe un error en la conexion con la base de datos
if ($mysqli->connect_errno){
    $error=$mysqli->connect_errno;
    $mysqli->close();
    header('location:index.php');
}

$salt="SELECT salt FROM usuarios WHERE login='$login'";

if(!($res_salt=$mysqli->query($salt))){
    $error=$mysqli->errno;
    $mysqli->close();
    header('location:index.php?error='.$error);
}

$_POST["pass"].=$res_salt->fetch_assoc()["salt"];
$password = sha1($_POST["pass"]);

$sql="SELECT count(*) numero,id_usuario FROM usuarios WHERE login='$login' AND password='$password'";

if(!($resultado=$mysqli->query($sql))){
    $error=$mysqli->errno;
    $resultado->close();
    $mysqli->close();
    header('location:index.php?error='.$error);
}

$fila=$resultado->fetch_assoc();

if ($fila["numero"]==0){
    $resultado->close();
    $mysqli->close();
    header('location:index.php');
}else {
    $id_usuario=$fila["id_usuario"];
    $time=time();
    echo $tiempo="INSERT INTO tiempos(tiempo_entrada,id_usuario) VALUES (CURRENT_TIMESTAMP ,$id_usuario)";

    if(!($res_time=$mysqli->query($tiempo))){
        $error=$mysqli->errno;
        $mysqli->close();
        header('location:index.php?error='.$error);
    }
    session_start();
    $_SESSION["id_tiempo"]=$mysqli->insert_id;
    $_SESSION["id_usuario"]=$id_usuario;
    header('location:datos.php');
}