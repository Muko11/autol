<?php
require_once "config/config.php";
if (isset($_SESSION['sesion'])) {
    $id_alumno = $_SESSION['sesion']['id_usuario'];

    // Obtener datos de la autoescuela
    $stmt = $bd->prepare("SELECT al.id_autoescuela, a.nombre, a.telefono, a.precio_practica FROM alumnos al
                            JOIN autoescuelas a ON a.id_autoescuela = al.id_autoescuela
                            WHERE al.id_alumno = :id_alumno");
    $stmt->bindParam(":id_alumno", $id_alumno);
    $stmt->execute();
    $autoescuela = $stmt->fetch();
}
?>

<h4 class="mb-4">Datos de la autoescuela</h4>
<form class="mb-5">
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3">
        <div class="mb-4">
            <label for="nombreAutoescuela" class="fw-bold mb-2">Nombre de la autoescuela</label>
            <input type="text" class="form-control" id="nombreAutoescuela" placeholder="Nombre de la autoescuela" value="<?php echo isset($autoescuela) ? $autoescuela['nombre'] : ''; ?>" disabled>
        </div>
        <div class="mb-4">
            <label for="telefonoAutoescuela" class="fw-bold mb-2">Teléfono</label>
            <input type="tel" class="form-control" id="telefonoAutoescuela" placeholder="Teléfono" value="<?php echo isset($autoescuela) ? $autoescuela['telefono'] : ''; ?>" disabled>
        </div>
        <div class="mb-4">
            <label for="practicaAutoescuela" class="fw-bold mb-2">Precio por clase práctica</label>
            <input type="text" class="form-control" id="practicaAutoescuela" placeholder="Precio por clase práctica" value="<?php echo isset($autoescuela) ? $autoescuela['precio_practica'] : ''; ?>€" step=".01" disabled>
        </div>
    </div>
</form>