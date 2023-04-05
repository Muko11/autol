<?php
require_once "config/config.php";

// Obtener los valores de los campos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$rol = $_POST['rol'];


if (!empty($nombre) && !empty($apellidos) && !empty($correo) && !empty($password) && isset($rol) && isset($_POST["registra"])) {

    try {
        $bd->beginTransaction();
        $stmt = $bd->prepare("INSERT INTO usuarios (nombre, apellidos, correo, password, rol) VALUES (:nombre, :apellidos, :correo, :password, :rol)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':rol', $rol);
        $stmt->execute();

        // Confirmación de la transacción para la tabla de clientes
        $bd->commit();
        header("Location: index.php");
    } catch (Exception $e) {
        // Deshacer la transacción en caso de error
        $bd->rollBack();
        throw $e;
    }
}

?>

<div class="modal fade" id="modalRegistro" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-3">Crear cuenta</p>
                <p class="text-muted">Crea una cuenta gratuita para acceder a nuestras
                    oportunidades.</p>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalInicioSesion">¿Ya tienes una cuenta? Inicia
                    sesión</a>
                <form id="formulario-registro" method="POST" action="">
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="registroNombre" name="nombre" placeholder="Nombre">
                        <label for="registroNombre">Nombre</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="registroApellido" name="apellidos" placeholder="Apellidos">
                        <label for="registroApellido">Apellidos</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="registroEmail" name="correo" placeholder="nombre@ejemplo.com">
                        <label for="registroEmail">Correo electrónico</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="registroPassword" name="password" placeholder="Contraseña">
                        <label for="registroPassword">Contraseña</label>
                    </div>
                    <p class="text-start fw-bold">Tipo de cuenta:</p>
                    <div class="btn-group d-flex mb-3" role="group">
                        <input type="radio" class="btn-check" name="rol" id="rol1" value="profesor" checked="checked" autocomplete="off">
                        <label class="btn btn-outline-primary" for="rol1">Profesor</label>

                        <input type="radio" class="btn-check" name="rol" id="rol2" value="alumno" autocomplete="off">
                        <label class="btn btn-outline-primary" for="rol2">Alumno</label>
                    </div>
                    <!--                     <div class="mb-3">
                        <input type="checkbox" id="registroAcepto">
                        <label for="registroAcepto">Acepto los términos de privacidad</label>
                    </div> -->
                    <div class="d-flex justify-content-center mb-3">
                        <input id="submitRegistro" name="registra" class="boton" type="submit" value="Registrarse">
                    </div>
                </form>
                <!--                 <a href="#">
                    Política de datos
                </a>
                <p></p>
                <a href="#">
                    Política de cookies
                </a> -->
            </div>
        </div>
    </div>
</div>

<script src="/public/js/formularioRegistro.js"></script>