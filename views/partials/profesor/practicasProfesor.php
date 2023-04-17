<?php
require_once "config/config.php";
if (isset($_SESSION['sesion'])) {
    $id_profesor = $_SESSION['sesion']['id_usuario'];

    $stmt = $bd->prepare("SELECT * FROM practicas WHERE id_profesor = :id_profesor ORDER BY fecha ASC, hora ASC");
    $stmt->bindParam(':id_profesor', $id_profesor);
    $stmt->execute();
    $practicas = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h4 class="mb-4">Crear una práctica</h4>

<form class="mb-5" method="POST" action="forms/procesarPractica.php">
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3">
        <div class="mb-4">
            <label for="fechaPractica" class="fw-bold mb-2">Fecha</label>
            <input type="date" class="form-control" id="fechaPractica" name="fecha">
        </div>
        <div class="mb-4">
            <label for="horaPractica" class="fw-bold mb-2">Hora</label>
            <input type="time" class="form-control" id="horaPractica" name="hora">
        </div>
        <div class="mb-4">
            <label for="tipoPractica" class="fw-bold mb-2">Tipo de práctica</label>
            <select class="form-control" id="tipoPractica" name="tipo">
                <option value="">Selecciona un tipo de práctica</option>
                <option value="am">AM</option>
                <option value="a1">A1</option>
                <option value="a2">A2</option>
                <option value="a">A</option>
                <option value="b1">B1</option>
                <option value="b">B</option>
                <option value="c1">C1</option>
                <option value="c">C</option>
                <option value="d1">D1</option>
                <option value="d">D</option>
                <option value="be">BE</option>
                <option value="c1e">C1E</option>
                <option value="ce">CE</option>
                <option value="d1e">D1E</option>
                <option value="de">DE</option>
            </select>
        </div>
        <div>
            <input class="boton" type="submit" name="crearPractica" value="Crear práctica">
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
            <?php foreach ($practicas as $index => $practica) { ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= date('d/m/Y', strtotime($practica['fecha'])) ?></td>
                    <td><?= substr($practica['hora'], 0, 5) ?></td>
                    <td><?= strtoupper($practica['tipo']) ?></td>
                    <td <?php if ($practica['id_alumno']) {
                            echo 'style="color: blue"';
                        } else {
                            echo 'style="color: red"';
                        } ?>>
                        <?php
                        if ($practica['id_alumno']) {
                            $stmt = $bd->prepare("SELECT nombre, apellidos FROM usuarios WHERE id_usuario = :id_alumno");
                            $stmt->bindParam(':id_alumno', $practica['id_alumno']);
                            $stmt->execute();
                            $alumno = $stmt->fetch();
                            echo "Reservado por " . $alumno['nombre'] . " " . $alumno['apellidos'];
                        } else {
                            echo "Sin reservar";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditarRegistro"><i class="fa-solid fa-pen-to-square fa-2x i-edit"></i></a>

                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalBorrarRegistro"><i class="fa-solid fa-trash fa-2x i-trash"></i></a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>