<h4 class="mb-4">Reservar práctica</h4>

<form class="mb-5">
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3">
        <div class="mb-4">
            <label for="fechaPractica" class="fw-bold mb-2">Filtrar por fecha</label>
            <input type="date" class="form-control" id="fechaPractica">
        </div>
        <div class="mb-4">
            <label for="profesorPractica" class="fw-bold mb-2">Filtrar por
                profesor</label>
            <select id="profesorPractica" class="form-control">
                <option value="" selected="selected">Selecciona un profesor</option>
                <option value="">Oterino</option>
                <option value="">Rafa</option>
                <option value="">Ester</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="tipoPractica" class="fw-bold mb-2">Filtrar por tipo de
                práctica</label>
            <select class="form-control" id="tipoPractica">
                <option value="">Selecciona un tipo de práctica</option>
                <option value="">AM</option>
                <option value="">A1</option>
                <option value="">A2</option>
                <option value="">A</option>
                <option value="">B1</option>
                <option value="">B</option>
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
        <div>
            <input class="boton" type="submit" value="Buscar prácticas">
        </div>
    </div>
</form>

<div class="table-responsive-lg">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Tipo</th>
                <th scope="col">Profesor</th>
                <th scope="col">Reservar</th>
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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalReservar"><i class="fa-regular fa-hand fa-2x i-reserva"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>