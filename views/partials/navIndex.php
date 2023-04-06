<?php 
include('./modals/inicioSesion.php');
include('./modals/creaCuenta.php');
include('./modals/miCuenta.php');
include('./modals/cierraSesion.php');
?>

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
                    <div class="nav-item">
                        <a class="nav-link" href="#oportunidades">Crear autoescuela</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav dropstart">
                <li class="nav-item dropdown toogle-usuario">
                    <a class="navbar-brand nav-link dropdown-toggle me-0" href="#" id="dropdownMenu" data-bs-toggle="dropdown"><i class="fa-solid fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenu">
                        <!-- <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalInicioSesion">Iniciar sesión</a></li> -->
                        <li><a class="dropdown-item" href="login.php">Iniciar sesión</a></li>
                        <!-- <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalRegistro">Crear cuenta</a></li> -->
                        <li><a class="dropdown-item" href="singup.php">Crear cuenta</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalCerrarSesion">Cerrar sesión</a></li>
                        <li><a class="dropdown-item" href="#">Mi cuenta</a></li>
                        <li><a class="dropdown-item" href="profesor.php">Soy profesor</a></li>
                        <li><a class="dropdown-item" href="alumno.php">Soy alumno</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>