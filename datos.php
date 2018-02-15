<?php
session_start();
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
    <title>Bienvenido</title>
</head>
<body>
<header>
    <h1>Bienvenido <?=$fila["login"]?></h1>
</header>
<main>
    <?php
    if ($fila["rol"]==1) echo "<a href='otro.php?id=".$fila['id_usuario']."'>Ver al resto de usuarios</a>";
    echo "<p>Nombre: ".$fila['nombre']."</p>";
    echo "<p>Primer Apellido: ".$fila['apellido1']."</p>";
    echo "<p>Segundo apellido: ".$fila['apellido2']."</p>";
    echo "<p>Login: ".$fila['login']."</p>";
    echo "<p>Password: ".$fila['password']."</p>";
    echo "<p>Salt: ".$fila['salt']."</p>";
    echo "<p>Rol: ".$fila['rol']."</p>";
    ?>
</main>
<button id="salir">Cerrar sesion</button>
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