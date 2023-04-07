<?php
require_once "config/config.php";
session_start();
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoL</title>
    <link rel="icon" type="image/png" href="imagenes/logo.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/formulario.css">
    <style>
        .formulario {
            margin-top: 30px;
        }

        .card {
            margin-top: 30px;
            max-width: 400px;
        }
    </style>
    <script src="https://kit.fontawesome.com/81fe1f798e.js" crossorigin="anonymous"></script>
</head>


<body>

    <div class="container my-5">
        <a href="index.php" class="boton my-4">Volver a inicio</a>
    </div>


    <div class="container formulario">
        <p class="fs-3">Bienvenid@, <?php echo $_SESSION['sesion']['nombre']; ?></p>
        <p class="text-muted">Datos de tu cuenta</p>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $_SESSION['sesion']['nombre'] . ' ' . $_SESSION['sesion']['apellidos']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $_SESSION['sesion']['rol']; ?></h6>
                <p class="card-text">Correo electrónico: <?php echo $_SESSION['sesion']['correo']; ?></p>
            </div>
        </div>

    </div>








</body>

</html>