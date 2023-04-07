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
    <link rel="stylesheet" href="public/css/index.css">
    <script src="https://kit.fontawesome.com/81fe1f798e.js" crossorigin="anonymous"></script>
</head>

<body>

    <div data-bs-spy="scroll" data-bs-target="#nav-scroll" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">


        <div class="d-flex justify-content-center align-items-center portada">
            <div class="container position-relative">
                <h1 id="inicio">AutoL - Organiza tu autoescuela</h1>
                <h2>Software para la gestión de autoescuelas. ¡Comienza ahora!</h2>
                <br>
                <a href="#oportunidades" class="boton btn-portada">Comenzar</a>
            </div>
        </div>

        <div id="servicios"></div>

        <div class="container-fluid g-0 mb-5">
            <?php
            include('views/partials/navIndex.php');
            ?>
        </div>


        <br>

        <div class="container pt-5 pb-5">
            <?php
            include('./views/layouts/servicios.html');
            ?>

        </div>



        <div id="oportunidades"></div>
        <br>
        <br>


        <div class="container-fluid px-4 py-5 contenedor-autoescuela">

            <h3 class="text-center m-3">CREA TU AUTOESCUELA</h3>
            <div class="container-fluid px-md-5 px-sm-2 mt-4">
                <div class="row row-cols row-cols-md-2 align-items-center">
                    <div class="d-flex justify-content-center mb-4">
                        <img class="w-50" src="public/imagenes/autoescuela.png" alt="Autoescuela">
                    </div>

                    <?php
                    include('./forms/registraAutoescuela.php');
                    ?>
                </div>
            </div>

        </div>



        <div id="contacto"></div>
        <br>
        <br>
        <br>



        <div class="container mb-5">
            <h3 class="text-center m-5 titulos">CONTÁCTANOS</h3>
            <?php
            include('./forms/contacto.php');
            ?>
        </div>
        <br>



        <?php
        include('./views/layouts/footer.html');
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
<?php

/* if (isset($_SESSION['sesion']) && is_array($_SESSION['sesion'])) {
    echo "La sesión está iniciada:";
    echo "<pre>";
    print_r($_SESSION['sesion']);
    echo "</pre>";
} else {
    echo "La sesión no está iniciada";
}
 */

?>

</html>