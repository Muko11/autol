<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoL</title>
    <link rel="icon" type="image/png" href="imagenes/logo.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/index.css">
    <script src="https://kit.fontawesome.com/81fe1f798e.js" crossorigin="anonymous"></script>
</head>

<?php
require_once "config/config.php";

if (isset($_GET['registroExitoso'])) {
    $registroExitoso = $_GET['registroExitoso'];
    if ($registroExitoso == "true") {
        header("Location: profesor.php");
    } else {
        echo "<script>alert('El profesor ya pertenece a una autoescuela');</script>";
        header("Refresh: 0; URL=index.php");
    }
}

?>

<body>
    <form id="formulario-autoescuela" method="POST" action="forms/procesarAutoescuela.php" class="p-4">
        <h4 class="fw-bold mb-4 text-center">Rellena el formulario para crear tu autoescuela</h4>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="autoescuela" name="autoescuela" placeholder="Nombre de la autoescuela">
            <label for="modalNombreAutoescuela">Nombre de la autoescuela</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
            <label for="modalTelefono">Teléfono</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio por clase práctica">
            <label for="modalPrecio">Precio por clase práctica</label>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <input id="registroAutoescuela" name="registroAutoescuela" class="boton" type="submit" value="Crear autoescuela">
        </div>
    </form>
</body>

</html>