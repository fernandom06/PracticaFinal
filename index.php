<?php
session_start();
if (isset($_SESSION["id_usuario"])) header('location:datos.php');
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos/bootstrap.css">
    <title>Acceso a la empresa</title>
</head>
<body>
<header class="jumbotron">
    <h1>Acceso</h1>
</header>
<main class="container">
<form action="login.php" method="post" class="form-group">
    <label for="login">Nombre de usuario</label>
    <input type="text" name="login" id="login" class="form-control"><br>
    <label for="pass">Contraseña</label>
    <input type="password" name="pass" id="pass" class="form-control"><br>
    <button class="btn btn-primary">Acceder</button>
</form>
</main>
</body>
</html>