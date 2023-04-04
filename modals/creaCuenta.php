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
                <form id="formulario-registro">
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="registroNombre" placeholder="Nombre">
                        <label for="registroNombre">Nombre</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="registroApellido" placeholder="Apellidos">
                        <label for="registroApellido">Apellidos</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="registroEmail" placeholder="nombre@ejemplo.com">
                        <label for="registroEmail">Correo electrónico</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="registroPassword" placeholder="Contraseña">
                        <label for="registroPassword">Contraseña</label>
                    </div>
                    <p class="text-start fw-bold">Tipo de cuenta:</p>
                    <div class="btn-group d-flex mb-3" role="group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio1">Profesor</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2">Alumno</label>
                    </div>
                    <!--                     <div class="mb-3">
                        <input type="checkbox" id="registroAcepto">
                        <label for="registroAcepto">Acepto los términos de privacidad</label>
                    </div> -->
                    <div class="d-flex justify-content-center mb-3">
                        <input id="submitRegistro" class="boton" type="submit" value="Registrarse">
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