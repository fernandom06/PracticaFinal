<?php
session_start();
if (isset($_SESSION["id_usuario"])==false) header('location:index.php');
$id_usuario=$_SESSION["id_usuario"];
//conexion a la bbdd
$mysqli=new mysqli('localhost','empresa','empresa','empresa');

//controlamos si existe un error en la conexion con la base de datos
if ($mysqli->connect_errno){
    $error=$mysqli->connect_errno;
    $mysqli->close();
    header('location:index.php');
}

$sql="SELECT * from usuarios WHERE id_usuario=$id_usuario";

$resultado=$mysqli->query($sql);

$fila=$resultado->fetch_assoc();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos/bootstrap.css">
    <title>Bienvenido</title>
</head>
<body>
<header class="jumbotron">
    <h1>Bienvenido <?=$fila["login"]?></h1>
</header>
<main class="container">
    <?php
    if ($fila["rol"]==1) echo "<a href='otro.php?id=".$fila['id_usuario']."' class='btn btn-primary'>Ver al resto de usuarios</a>";
    echo "<p><strong>Nombre:</strong> ".$fila['nombre']." ".$fila['apellido1']." ".$fila['apellido2']."</p>";
    echo "<p><strong>Login: </strong>".$fila['login']."</p>";
    echo "<p><strong>Password: </strong>".$fila['password']."</p>";
    echo "<p><strong>Salt: </strong>".$fila['salt']."</p>";
    echo "<p><strong>Rol: </strong>".$fila['rol']."</p>";
    ?>
    <button id="salir" class="btn btn-danger">Cerrar sesion</button>
</main>
<script src="js/jquery-3.2.1.min.js"></script>
<script>
    $(function () {
        $("#salir").on("click",function () {
            window.location='salir.php';
        });
    })
</script>
</body>
</html>