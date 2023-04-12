<div class="modal fade" id="modalAñadirProfesor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fs-3 text-center">Agregar profesor</p>
                <form class="mb-3" method="POST" action="forms/procesarProfesor.php">
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="emailProfesor" name="emailProfesor" value="" placeholder="ejemplo@ejemplo.com">
                        <label for="emailProfesor">Correo electrónico del profesor</label>
                    </div>

                    <div class="d-flex justify-content-center mb-3 g-2">
                        <button id="botonAñadirProfesor" name="botonAñadirProfesor" class="boton">Añadir profesor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>