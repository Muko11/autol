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
        <p class="fs-3">Iniciar sesión</p>
        <p class="text-muted">Inicia sesión con tu cuenta para continuar disfrutando de nuestras
            oportunidades</p>
        <a href="singup.php">¿No tienes cuenta? Crea una
            cuenta</a>
        <form id="formulario-login" method="POST" action="forms/procesarLogin.php">
            <div class="form-floating mt-3 mb-3">
                <input type="email" class="form-control" id="loginCorreo" name="correo" placeholder="Correo electrónico">
                <label for="loginCorreo">Correo electrónico</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Contraseña">
                <label for="loginPassword">Contraseña</label>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <input id="submitLogin" class="boton" type="submit" name="login" value="Iniciar sesión">
            </div>
        </form>


    </div>




</body>

</html>