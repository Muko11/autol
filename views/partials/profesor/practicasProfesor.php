<h4 class="mb-4">Crear una práctica</h4>

<form class="mb-5">
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3">
        <div class="mb-4">
            <label for="fechaPractica" class="fw-bold mb-2">Fecha</label>
            <input type="date" class="form-control" id="fechaPractica">
        </div>
        <div class="mb-4">
            <label for="horaPractica" class="fw-bold mb-2">Hora</label>
            <input type="time" class="form-control" id="horaPractica">
        </div>
        <div class="mb-4">
            <label for="tipoPractica" class="fw-bold mb-2">Tipo de práctica</label>
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
            <input class="boton" type="submit" value="Crear práctica">
        </div>
    </div>
</form>


<h4 class="mb-4">Tabla de prácticas</h4>

<div class="table-responsive-lg">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Tipo</th>
                <th scope="col">Alumno</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>10/10/2010</td>
                <td>10:00</td>
                <td>B</td>
                <td>Sin reservar</td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditarRegistro"><i class="fa-solid fa-pen-to-square fa-2x i-edit"></i></a>

                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalBorrarRegistro"><i class="fa-solid fa-trash fa-2x i-trash"></i></a>

                </td>
            </tr>
        </tbody>
    </table>
</div>