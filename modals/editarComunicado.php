<div class="modal fade" id="modalEditarComunicado" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fs-3 text-center">Editar comunicado</p>
                <p class="text-muted text-center">Puedes modificar el comunicado en cualquier momento</p>

                <form class="mb-3">
                    <!--                         <div class="mb-4">
                            <label for="comunicadoNombre" class="fw-bold mb-2">De</label>
                            <input type="text" class="form-control" id="comunicadoNombreModal" placeholder="De"
                                value="Mari Carmen">
                        </div> -->
                    <div class="mb-4">
                        <label for="comunicadoTitulo" class="fw-bold mb-2">Título</label>
                        <input type="text" class="form-control" id="comunicadoTituloModal" placeholder="Título del comunicado" value="Examen práctico día 30 de enero de 2023">
                    </div>
                    <div class="mb-4">
                        <label for="comunicadoMensaje" class="fw-bold mb-2">Comunicado</label>
                        <textarea class="form-control" id="comunicadoMensajeModal" rows="5" placeholder="Escribe tu comunicado...">Para presentaros al examen práctico debéis de realizar el pago en la autoescuela antes del día 25 de enero de 2023. Gracias.</textarea>
                    </div>
                </form>
                <div class="d-flex justify-content-center mb-3 g-2">
                    <button id="botonGuardarComunicado" class="boton">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>