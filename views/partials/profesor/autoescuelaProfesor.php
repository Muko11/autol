<?php
require_once "config/config.php";
if (isset($_SESSION['sesion'])) {
    $id_profesor = $_SESSION['sesion']['id_usuario'];

    // Obtener datos de la autoescuela
    $stmt = $bd->prepare("SELECT * FROM autoescuelas WHERE id_profesor = :id_profesor");
    $stmt->bindParam(":id_profesor", $id_profesor);
    $stmt->execute();
    $autoescuela = $stmt->fetch();
}
?>

<h4 class="mb-4">Datos de la autoescuela</h4>
<form class="mb-5">
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3">
        <div class="mb-4">
            <label for="nombreAutoescuela" class="fw-bold mb-2">Nombre de la autoescuela</label>
            <input type="text" class="form-control" id="nombreAutoescuela" placeholder="Nombre de la autoescuela" value="<?php echo isset($autoescuela) ? $autoescuela['nombre'] : ''; ?>">
        </div>
        <div class="mb-4">
            <label for="telefonoAutoescuela" class="fw-bold mb-2">Teléfono</label>
            <input type="tel" class="form-control" id="telefonoAutoescuela" placeholder="Teléfono" value="<?php echo isset($autoescuela) ? $autoescuela['telefono'] : ''; ?>">
        </div>
        <div class="mb-4">
            <label for="practicaAutoescuela" class="fw-bold mb-2">Precio por clase práctica</label>
            <input type="text" class="form-control" id="practicaAutoescuela" placeholder="Precio por clase práctica" value="<?php echo isset($autoescuela) ? $autoescuela['precio_clase'] : ''; ?>" step=".01">
        </div>
    </div>




    <div>
        <input class="boton" type="submit" value="Guardar cambios">
    </div>

</form>

<div class="d-flex justify-content-end">
    <a href="#" class="boton-borrar" data-bs-toggle="modal" data-bs-target="#modalBorrarAutoescuela">Borrar autoescuela</a>
</div>