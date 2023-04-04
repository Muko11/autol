<div class="modal fade" id="modalEditarRegistro" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fs-3 text-center">Editar registro</p>
                <p class="text-muted text-center">Puedes modificar la fecha, hora o tipo de la práctica</p>
                <form class="mb-3">
                    <div class="mb-4">
                        <label for="fechaPractica" class="fw-bold mb-2">Fecha</label>
                        <input type="date" class="form-control" id="fechaPracticaModal" value="2010-10-10">
                    </div>
                    <div class="mb-4">
                        <label for="horaPractica" class="fw-bold mb-2">Hora</label>
                        <input type="time" class="form-control" id="horaPracticaModal" value="10:10">
                    </div>
                    <div class="mb-4">
                        <label for="tipoPractica" class="fw-bold mb-2">Tipo de práctica</label>
                        <select class="form-control" id="tipoPractica">
                            <option value="">AM</option>
                            <option value="">A1</option>
                            <option value="">A2</option>
                            <option value="">A</option>
                            <option value="">B1</option>
                            <option value="" selected="selected">B</option>
                            <option value="">C1</option>
                            <option value="">C</option>
                            <option value="">D1</option>
                            <option value="">D</option>
                            <option value="">BE</option>
                            <option value="">C1E</option>
                            <option value="">CE</option>
                            <option value="">D1E</option>
                            <option value="">DE</option>
                        </select>
                    </div>
                </form>
                <div class="d-flex justify-content-center mb-3 g-2">
                    <button id="botonGuardarCambios" class="boton">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>