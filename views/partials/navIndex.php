<?php

?>

<head>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Obtener el elemento 'a'
            var navbarBrand = document.querySelector(".navbar-brand");

            // Obtener el nombre de usuario de la sesión
            var nombreUsuario = "<?php echo $_SESSION['sesion']['nombre']; ?>";

            // Actualizar el contenido del elemento 'a'
            navbarBrand.innerHTML = nombreUsuario;

            // Poner un subrayado al elemento
            navbarBrand.style.textDecoration = "underline";

        });
    </script>

</head>


<nav id="nav-scroll" class="navbar navbar-expand-lg fixed-top bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-sharp fa-solid fa-bars fa-2x"></i>
        </button>
        <ul class="navbar-nav mx-4">
            <li class="nav-item toogle-logo">
                <a class="nav-link" href="#"><img class="iconos-menu" src="public/imagenes/logo.svg" alt="Logo"></a>
            </li>
        </ul>
        <div class="menu menu-grid collapse navbar-collapse mx-4" id="navbarNavDropdown">
            <div class="navbar-nav">
                <div class="contenido-menu toogle-contenido">
                    <div class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </div>

                    <?php
                    if (isset($_SESSION['sesion'])) { // Si la sesión está iniciada 
                        if ($_SESSION['sesion']['rol'] == "profesor") {

                            // Obtener el ID del profesor desde la variable $_SESSION
                            $id_profesor = $_SESSION['sesion']['id_usuario'];

                            // Realizar la consulta para verificar si el id_profesor existe en la tabla profesores
                            $stmt = $bd->prepare("SELECT * FROM profesores WHERE id_profesor = :id_profesor");
                            $stmt->bindParam(":id_profesor", $id_profesor);
                            $stmt->execute();
                            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                            // Ocultar el div y el enlace a "Crear autoescuela" si el id_profesor existe en la tabla profesores
                            if ($resultado) {
                                // no se muestra nada
                            } else { ?>
                                <div class="nav-item">
                                    <a class="nav-link" href="#oportunidades">Crear autoescuela</a>
                                </div>
                    <?php }
                        }
                    }
                    ?>



                    <div class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav dropstart">
                <li class="nav-item dropdown toogle-usuario">
                    <a id="perfil" class="navbar-brand nav-link dropdown-toggle me-0" href="#" id="dropdownMenu" data-bs-toggle="dropdown"><i class="fa-solid fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenu">

                        <?php
                        if (isset($_SESSION['sesion'])) { // Si la sesión está iniciada 
                            if ($_SESSION['sesion']['rol'] == "profesor") {

                                // Obtener el ID del profesor desde la variable $_SESSION
                                $id_profesor = $_SESSION['sesion']['id_usuario'];

                                // Realizar la consulta para verificar si el id_profesor existe en la tabla profesores
                                $stmt = $bd->prepare("SELECT * FROM profesores WHERE id_profesor = :id_profesor");
                                $stmt->bindParam(":id_profesor", $id_profesor);
                                $stmt->execute();
                                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                                // Mostrar el enlace a profesor.php si el id_profesor existe en la tabla profesores
                                if ($resultado) { ?>
                                    <li><a class="dropdown-item" href="profesor.php">Soy profesor</a></li>
                                <?php } else { ?>
                                    <li><a class="dropdown-item" href="#">Sin autoescuela</a></li>
                                <?php } ?>

                                <li><a class="dropdown-item" href="account.php">Mi cuenta</a></li>
                                <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>

                                <?php } else if ($_SESSION['sesion']['rol'] == "alumno") {

                                // Obtener el ID del alumno desde la variable $_SESSION
                                $id_alumno = $_SESSION['sesion']['id_usuario'];

                                // Realizar la consulta para verificar si el id_alumno existe en la tabla alumnos
                                $stmt = $bd->prepare("SELECT * FROM alumnos WHERE id_alumno = :id_alumno");
                                $stmt->bindParam(":id_alumno", $id_alumno);
                                $stmt->execute();
                                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                                // Mostrar el enlace a alumno.php si el id_alumno existe en la tabla alumnos
                                if ($resultado) { ?>
                                    <li><a class="dropdown-item" href="alumno.php">Soy alumno</a></li>
                                <?php } else { ?>
                                    <li><a class="dropdown-item" href="#">Sin autoescuela</a></li>
                                <?php } ?>

                                <li><a class="dropdown-item" href="account.php">Mi cuenta</a></li>
                                <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>

                            <?php } ?>
                        <?php } else { // Si la sesión no está iniciada 
                        ?>
                            <li><a class="dropdown-item" href="login.php">Iniciar sesión</a></li>
                            <li><a class="dropdown-item" href="singup.php">Crear cuenta</a></li>
                        <?php } ?>


                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>