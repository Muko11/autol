<h4 class="mb-4">Prácticas reservadas</h4>
<div class="table-responsive-lg mb-5">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Tipo</th>
                <th scope="col">Profesor</th>
                <th scope="col">Cancelar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>10/10/2010</td>
                <td>10:00</td>
                <td>AM</td>
                <td>Oterino</td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalCancelarReserva"><i class="fa-solid fa-rectangle-xmark fa-2x i-trash"></i></a>

                </td>
            </tr>
        </tbody>
    </table>
</div>


<h4 class="mb-4">Calcular precio de prácticas realizadas</h4>

<div class="alert alert-primary alert-dismissible fade show mb-4" role="alert">
    Puedes calcular el precio que tendrías que pagar por las prácticas introduciendo un
    número de prácticas
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<form class="mb-5">
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3">
        <div class="mb-4">
            <label for="practicaCompletada" class="fw-bold mb-2">Prácticas
                completadas</label>
            <input type="number" class="form-control" id="practicaCompletada" placeholder="Introduzca un número" value="">
        </div>
        <div class="mb-4">
            <label for="practicaAutoescuela" class="fw-bold mb-2">Precio por clase
                práctica</label>
            <input type="text" class="form-control" id="practicaAutoescuelaHistorial" value="25.00€" step=".01" disabled>
        </div>
        <div class="mb-4">
            <label for="totalPracticas" class="fw-bold mb-2">Precio total de las
                prácticas</label>
            <input type="text" class="form-control" id="totalPracticas" placeholder="0€" value="" disabled>
        </div>
        <div>
            <input class="boton" type="submit" value="Calcular">
        </div>
    </div>
</form>