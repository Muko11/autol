<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoL</title>
    <link rel="icon" type="image/png" href="imagenes/logo.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/profesor.css">
    <script src="https://kit.fontawesome.com/81fe1f798e.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    session_start();
    require_once "config/config.php";
    include('./modals/reservarPractica.php');
    include('./modals/cancelarPractica.php');

    // Obtener el ID de la autoescuela del usuario de la sesión
    $id_alumno = $_SESSION['sesion']['id_usuario'];
    $stmt = $bd->prepare("SELECT id_autoescuela FROM alumnos WHERE id_alumno = :id_alumno");
    $stmt->bindParam(":id_alumno", $id_alumno);
    $stmt->execute();
    $alumno = $stmt->fetch();

    // Añadir el ID de la autoescuela a la sesión
    $_SESSION['sesion']['id_autoescuela'] = $alumno['id_autoescuela'];

    ?>

    <div class="container-fluid g-0 mb-5">
        <?php
        include('views/partials/navAutoescuela.php');
        ?>
    </div>


    <div class="container-fluid panelContenido">
        <div class="row my-3">
            <div class="col mt-5 mb-3">
                <div>
                    <h3 class="text-uppercase text-center">BIENVENIDO A TU AUTOESCUELA</h3>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-3 mb-4">
                <div class="aside">

                    <?php
                    include('./views/partials/alumno/asideAlumno.php');
                    ?>

                </div>
            </div>



            <div class="col-md-9">
                <div class="row g-4">
                    <div class="col">
                        <div class="tab-content" id="nav-tabContent">


                            <!-- Aside - Mi autoescuela -->

                            <div class="tab-pane fade show active px-4" id="nav-autoescuela">

                                <?php
                                include('./views/partials/alumno/autoescuelaAlumno.php');
                                ?>
                            </div>



                            <!-- Aside - Comunicados -->

                            <div class="tab-pane fade show px-4" id="nav-comunicado">
                                <?php
                                include('./views/partials/alumno/comunicadosAlumno.php');
                                ?>
                            </div>


                            <!-- Aside - Prácticas -->

                            <div class="tab-pane fade show px-4" id="nav-practica">
                                <?php
                                include('./views/partials/alumno/practicasAlumno.php');
                                ?>
                            </div>


                            <!-- Aside - Historial -->

                            <div class="tab-pane fade show px-4" id="nav-historial">
                                <?php
                                include('./views/partials/alumno/historialAlumno.php');
                                ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include('./views/layouts/footer.html');
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>

</html>