<form id="f-contact" class="formulario-contacto p-3">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-4 form-floating">
                <input type="text" class="form-control" id="contactoNombre" placeholder="Nombre">
                <label for="contactoNombre">Tu nombre</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-4 form-floating">
                <input type="email" class="form-control" id="contactoEmail" placeholder="Correo electrónico">
                <label for="contactoEmail">Tu correo electrónico</label>
            </div>
        </div>
    </div>
    <div class="mb-4 form-floating">
        <input type="text" class="form-control" id="contactoAsunto" placeholder="Asunto">
        <label for="contactoAsunto">Asunto</label>
    </div>

    <div class="mb-4">
        <textarea class="form-control" id="contactoMensaje" rows="5" placeholder="Escribe tu mensaje..."></textarea>

    </div>

    <div class="d-flex justify-content-center mb-4">
        <input class="boton" id="contactoSubmit" type="submit" value="Enviar">
    </div>
</form>