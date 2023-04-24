<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoL</title>
    <link rel="icon" type="image/png" href="imagenes/logo.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/formulario.css">
    <script src="https://kit.fontawesome.com/81fe1f798e.js" crossorigin="anonymous"></script>
</head>

<?php
require_once "config/config.php";

if (isset($_GET['loginExitoso'])) {
    $loginExitoso = $_GET['loginExitoso'];
    if ($loginExitoso == "true") {
        header("Location: index.php");
    } else {
        echo "<script>alert('Correo electrónico o contraseña incorrecto')</script>";
    }
}
?>


<body>

    <div class="container my-5">
        <a href="index.php" class="boton my-4">Volver a inicio</a>
    </div>


    <div class="container formulario">
        <p class="fs-4 text-center">INICIAR SESIÓN</p>
        <form id="formulario-login" method="POST" action="forms/procesarLogin.php">
            <input type="email" class="form-control" id="loginCorreo" name="correo" placeholder="Introduzca su correo electrónico"><br>
            <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Introduzca su contraseña"><br>

            <div class="d-grid justify-content-center">
                <a href="singup.php">¿No tienes cuenta? Crear una cuenta</a><br>
                <input id="submitLogin" class="boton " type="submit" name="login" value="Iniciar sesión">
            </div>
        </form>
    </div>

</body>

</html>