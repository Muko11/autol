<?php
require_once "config/config.php";

?>
<h4 class="mb-4">Alumnos</h4>

<!-- <a href="#" data-bs-toggle="modal" data-bs-target="#modalAñadirAlumno"><i class="fa-solid fa-user-plus fa-2x i-añadir"></i></a> -->

<?php if ($es_administrador) { ?>
    <form class="mb-5" method="POST" action="forms/procesarAlumno.php">
        <div class="row row-cols row-cols-md-2">
            <div class="mb-4">
                <label for="emailAlumno" class="fw-bold mb-2">Agregar alumno</label>
                <input type="email" class="form-control" id="emailAlumno" name="emailAlumno" placeholder="Correo del alumno">
            </div>
        </div>
        <div>
            <input class="boton" type="submit" name="botonAñadirAlumno" value="Agregar alumno">
        </div>

    </form>
<?php } ?>

<form>
    <div class="my-4">
        <input type="text" class="form-control" id="buscadorAlumno" placeholder="Buscar alumnos" value="">
    </div>
</form>

<div class="table-responsive-lg">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Alumno</th>
                <th scope="col">Email</th>
                <?php if ($es_administrador) { ?>
                    <th scope="col">Acciones</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody id="tablaAlumnos">
            <?php
            $id_autoescuela = $_SESSION['sesion']['id_autoescuela'];

            // Realizar consulta a la base de datos
            $stmt = $bd->prepare("SELECT u.nombre, u.apellidos, u.correo FROM usuarios u INNER JOIN alumnos al ON u.id_usuario = al.id_alumno WHERE al.id_autoescuela = :id_autoescuela");
            $stmt->bindParam(":id_autoescuela", $id_autoescuela);
            $stmt->execute();
            $alumnos = $stmt->fetchAll();


            // Recorrer resultados de la consulta
            foreach ($alumnos as $indice => $alumno) {
                echo "<tr>";
                echo "<th scope='row'>" . ($indice + 1) . "</th>";
                echo "<td>" . $alumno['nombre'] . " " . $alumno['apellidos'] . "</td>";
                echo "<td>" . $alumno['correo'] . "</td>";
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
    const tablaAlumnos = document.getElementById("tablaAlumnos");
    const buscadorAlumno = document.getElementById("buscadorAlumno");

    // Añadir un evento de escucha al campo de búsqueda
    buscadorAlumno.addEventListener("input", () => {
        // Obtener el valor del campo de búsqueda
        const busqueda = buscadorAlumno.value.trim().toLowerCase();
        // Filtrar la tabla de resultados por el valor de búsqueda
        const filas = tablaAlumnos.querySelectorAll("tr");
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