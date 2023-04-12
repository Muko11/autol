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
    include('config/config.php');
    include('./modals/agregarAlumno.php');
    include('./modals/agregarProfesor.php');
    include('./modals/borrarAutoescuela.php');
    include('./modals/borrarComunicado.php');
    include('./modals/borrarRegistro.php');
    include('./modals/editarComunicado.php');
    include('./modals/editarPractica.php');

    // Obtener el ID de la autoescuela del usuario de la sesión
    $id_profesor = $_SESSION['sesion']['id_usuario'];
    $stmt = $bd->prepare("SELECT id_autoescuela FROM profesores WHERE id_profesor = :id_profesor");
    $stmt->bindParam(":id_profesor", $id_profesor);
    $stmt->execute();
    $profesor = $stmt->fetch();

    // Añadir el ID de la autoescuela a la sesión
    $_SESSION['sesion']['id_autoescuela'] = $profesor['id_autoescuela'];


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
                    <h3 class="text-uppercase text-center">Panel de control</h3>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-3 mb-4">
                <div class="aside">

                    <?php
                    include('./views/partials/profesor/asideProfesor.php');
                    ?>

                </div>
            </div>



            <div class="col-md-9">
                <div class="row g-4">
                    <div class="col">
                        <div class="tab-content" id="nav-tabContent">



                            <!-- Aside - Datos autoescuela -->

                            <div class="tab-pane fade show active px-4" id="nav-autoescuela">
                                <?php
                                include('./views/partials/profesor/autoescuelaProfesor.php');
                                ?>

                            </div>

                            <!-- Aside - Profesor -->

                            <div class="tab-pane fade show px-4" id="nav-profesor">
                                <?php
                                include('./views/partials/profesor/tablaProfesores.php');
                                ?>
                            </div>



                            <!-- Aside - Alumno -->

                            <div class="tab-pane fade show px-4" id="nav-alumno">
                                <?php
                                include('./views/partials/profesor/tablaAlumnos.php');
                                ?>
                            </div>



                            <!-- Aside - Prácticas -->

                            <div class="tab-pane fade show px-4" id="nav-practica">

                                <?php
                                include('./views/partials/profesor/practicasProfesor.php');
                                ?>

                            </div>



                            <!-- Aside - Comunicados -->

                            <div class="tab-pane fade show px-4" id="nav-comunicado">
                                <?php
                                include('./views/partials/profesor/comunicadosProfesor.php');
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

<?php 

?>