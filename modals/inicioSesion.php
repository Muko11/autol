<div class="modal fade" id="modalInicioSesion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-3">Iniciar sesión</p>
                <p class="text-muted">Inicia sesión con tu cuenta para continuar disfrutando de nuestras
                    oportunidades</p>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalRegistro">¿No tienes cuenta? Crea una
                    cuenta</a>
                <form id="formulario-login">
                    <div class="form-floating mt-3 mb-3">
                        <input type="email" class="form-control" id="loginCorreo" placeholder="Correo electrónico">
                        <label for="loginCorreo">Correo electrónico</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="loginPassword" placeholder="Contraseña">
                        <label for="loginPassword">Contraseña</label>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <input id="submitLogin" class="boton" type="submit" value="Iniciar sesión">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>