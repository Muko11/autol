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

if (isset($_GET['registroExitoso'])) {
    $registroExitoso = $_GET['registroExitoso'];
    if ($registroExitoso == "true") {
        header("Location: index.php");
    } else if ($registroExitoso == "correo") {
        echo "<script>alert('Ya existe una cuenta con ese correo electrónico')</script>";
    } else {
        echo '<script>alert("Porfavor, rellena todos los campos del formulario para crear la cuenta")</script>';
    }
}
?>


<body>

    <div class="container my-5">
        <a href="index.php" class="boton my-4">Volver a inicio</a>
    </div>

    <div class="container formulario">
        <p class="fs-4 text-center">CREAR CUENTA</p>

        <form id="formulario-registro" method="POST" action="forms/procesarSingup.php">
            <input type="text" class="form-control" id="registroNombre" name="nombre" placeholder="Introduzca su nombre"><br>
            <input type="text" class="form-control" id="registroApellido" name="apellidos" placeholder="Introduzca sus apellidos"><br>
            <input type="email" class="form-control" id="registroEmail" name="correo" placeholder="nombre@ejemplo.com"><br>
            <input type="password" class="form-control" id="registroPassword" name="password" placeholder="Contraseña"><br>


            <p class="text-start">Tipo de cuenta:</p>
            <div class="btn-group d-flex mb-3" role="group">
                <input type="radio" class="btn-check" name="rol" id="rol1" checked=checked value="profesor" autocomplete="off">
                <label class="btn btn-outline-primary" for="rol1">Profesor</label>

                <input type="radio" class="btn-check" name="rol" id="rol2" value="alumno" autocomplete="off">
                <label class="btn btn-outline-primary" for="rol2">Alumno</label>
            </div>
            <div class="d-grid justify-content-center">
                <a href="login.php">¿Ya tienes una cuenta? Inicia
                    sesión</a><br>
                <input id="submitRegistro" name="registra" class="boton" type="submit" value="Registrarse">
            </div>
        </form>

    </div>
</body>

</html>