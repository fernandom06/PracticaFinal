<?php
if (isset($_POST["login"])==false || isset($_POST["pass"])==false){
    header("location:index.php");
}else {
    $login = $_POST["login"];
    $password = sha1($_POST["pass"]);
}

//conexion a la bbdd
$mysqli=new mysqli('localhost','empresa','empresa','empresa');

//controlamos si existe un error en la conexion con la base de datos
if ($mysqli->connect_errno){
    $error=$mysqli->connect_errno;
    $mysqli->close();
    header('location:index.php');
}

echo $sql="SELECT count(*) numero,id_usuario,rol,login FROM usuarios WHERE login='$login' AND password='$password'";

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
    ?>
    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <header>
        <h1>Bienvenido a tu muro <?=$fila["login"]?></h1>
    </header>
    </body>
    </html>
    <?php
}?>