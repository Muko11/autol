<?php
require_once "config/config.php";
if (isset($_SESSION['sesion'])) {
    $id_profesor = $_SESSION['sesion']['id_usuario'];
    $stmt = $bd->prepare("SELECT id_administrador FROM autoescuelas WHERE id_administrador = :id_profesor");
    $stmt->bindParam(":id_profesor", $id_profesor);
    $stmt->execute();
    $es_administrador = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h4 class="mb-4">Profesores</h4>

<!-- <a href="#" data-bs-toggle="modal" data-bs-target="#modalAñadirProfesor"><i class="fa-solid fa-user-plus fa-2x i-añadir"></i></a> -->
<?php if ($es_administrador) { ?>
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
<?php } ?>


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
                <?php if ($es_administrador) { ?>
                    <th scope="col">Acciones</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody id="tablaProfesores">
            <?php

            $id_autoescuela = $_SESSION['sesion']['id_autoescuela'];

            // Realizar consulta a la base de datos
            $stmt = $bd->prepare("SELECT u.nombre, u.apellidos, u.correo, p.id_profesor FROM usuarios u INNER JOIN profesores p ON u.id_usuario = p.id_profesor WHERE p.id_autoescuela = :id_autoescuela");
            $stmt->bindParam(":id_autoescuela", $id_autoescuela);
            $stmt->execute();
            $profesores = $stmt->fetchAll();

            // Mostrar todos los profesores por defecto
            foreach ($profesores as $indice => $profesor) {
                echo "<tr data-id='" . $profesor['id_profesor'] . "'>";
                echo "<th scope='row'>" . ($indice + 1) . "</th>";
                echo "<td>" . $profesor['nombre'] . " " . $profesor['apellidos'] . "</td>";
                echo "<td>" . $profesor['correo'] . "</td>";
                if ($es_administrador) {
                    echo "<td><a href='#' data-bs-toggle='modal' data-bs-target='#modalBorrarRegistro'><i class='fa-solid fa-trash fa-2x i-trash'></i></a></td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    // Obtener la tabla de resultados y el campo de búsqueda
    const tablaProfesores = document.getElementById("tablaProfesores");
    const buscadorProfesor = document.getElementById("buscadorProfesor");

    // Añadir un evento de escucha al campo de búsqueda
    buscadorProfesor.addEventListener("input", () => {
        // Obtener el valor del campo de búsqueda
        const busqueda = buscadorProfesor.value.trim().toLowerCase();
        // Filtrar la tabla de resultados por el valor de búsqueda
        const filas = tablaProfesores.querySelectorAll("tr");
        filas.forEach((fila) => {
            const contenido = fila.textContent.toLowerCase();
            if (contenido.includes(busqueda)) {
                fila.style.display = "";
            } else {
                fila.style.display = "none";
            }
        });
    });
</script>