<h4 class="mb-4">Crear un comunicado</h4>


<form class="mb-5">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <input type="text" class="form-control" id="comunicadoTitulo" placeholder="Título del comunicado">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <textarea class="form-control" id="comunicadoMensaje" rows="5" placeholder="Escribe tu comunicado..."></textarea>
    </div>

    <div>
        <input class="boton" id="comunicadoSubmit" type="submit" value="Publicar">
    </div>
</form>


<h4 class="mb-4">Lista de comunicados</h4>

<div class="row row-cols">
    <div class="comunicados mb-5">
        <h5>Examen práctico día 30 de enero de 2023</h5>
        <h6>Mari Carmen</h6>
        <p><small>20/10/2023</small></p>
        <p>Para presentaros al examen práctico debéis de realizar el
            pago en la autoescuela antes del día 25 de enero de 2023. Gracias.</p>
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditarComunicado"><i class="fa-solid fa-pen-to-square fa-2x i-edit"></i></a>

        <a href="#" data-bs-toggle="modal" data-bs-target="#modalBorrarComunicado"><i class="fa-solid fa-trash fa-2x i-trash"></i></a>
    </div>
</div>