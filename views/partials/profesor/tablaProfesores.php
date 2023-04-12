<?php
require_once "config/config.php";

?>

<h4 class="mb-4">Profesores</h4>

<!-- <a href="#" data-bs-toggle="modal" data-bs-target="#modalAñadirProfesor"><i class="fa-solid fa-user-plus fa-2x i-añadir"></i></a> -->

<form class="mb-5" method="POST" action="forms/procesarProfesor.php">
    <div class="row row-cols row-cols-md-2">
        <div class="mb-4">
            <label for="emailProfesor" class="fw-bold mb-2">Agregar profesor</label>
            <input type="email" class="form-control" id="emailProfesor" name="emailProfesor" placeholder="Correo del profesor">
        </div>
    </div>
    <div>
        <input class="boton" type="submit" name="botonAñadirProfesor" value="Agregar profesor">
    </div>

</form>


<form>
    <div class="my-4">
        <input type="text" class="form-control" id="buscadorProfesor" placeholder="Buscar profesores" value="">
    </div>
</form>

<div class="table-responsive-lg">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Profesor</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id_autoescuela = $_SESSION['sesion']['id_autoescuela'];



            // Realizar consulta a la base de datos
            $stmt = $bd->prepare("SELECT u.nombre, u.apellidos, u.correo FROM usuarios u INNER JOIN profesores p ON u.id_usuario = p.id_profesor WHERE p.id_autoescuela = :id_autoescuela");
            $stmt->bindParam(":id_autoescuela", $id_autoescuela);
            $stmt->execute();
            $profesores = $stmt->fetchAll();


            // Recorrer resultados de la consulta
            foreach ($profesores as $indice => $profesor) {
                echo "<tr>";
                echo "<th scope='row'>" . ($indice + 1) . "</th>";
                echo "<td>" . $profesor['nombre'] . " " . $profesor['apellidos'] . "</td>";
                echo "<td>" . $profesor['correo'] . "</td>";
                echo "<td><a href='#' data-bs-toggle='modal' data-bs-target='#modalBorrarRegistro'><i class='fa-solid fa-trash fa-2x i-trash'></i></a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>