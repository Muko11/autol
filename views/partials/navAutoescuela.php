<?php 
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
                <a class="nav-link" href="index.php"><img class="iconos-menu" src="public/imagenes/logo.svg" alt="Logo"></a>
            </li>
        </ul>
        <div class="menu menu-grid collapse navbar-collapse mx-4" id="navbarNavDropdown">


            <div class="navbar-nav">
                <div class="contenido-menu toogle-contenido">
                    <div class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="index.php#servicios">Servicios</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="index.php#oportunidades">Crear autoescuela</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="index.php#contacto">Contacto</a>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav dropstart">
                <li class="nav-item dropdown toogle-usuario">
                    <a class="navbar-brand nav-link dropdown-toggle me-0" href="#" id="dropdownMenu" data-bs-toggle="dropdown"><i class="fa-solid fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenu">
                        <li><a class="dropdown-item" href="#">Mi cuenta</a></li>
                        <li><a class="dropdown-item" href="#">Salir</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalCerrarSesion">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>