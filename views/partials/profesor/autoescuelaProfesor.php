<?php
require_once "config/config.php";
if (isset($_SESSION['sesion'])) {
    $id_profesor = $_SESSION['sesion']['id_usuario'];

    // Obtener datos de la autoescuela
    $stmt = $bd->prepare("SELECT p.id_autoescuela, a.nombre, a.telefono, a.precio_practica FROM profesores p
                            JOIN autoescuelas a ON a.id_autoescuela = p.id_autoescuela
                            WHERE p.id_profesor = :id_profesor");
    $stmt->bindParam(":id_profesor", $id_profesor);
    $stmt->execute();
    $autoescuela = $stmt->fetch();


    $stmt = $bd->prepare("SELECT id_administrador FROM autoescuelas WHERE id_administrador = :id_profesor");
    $stmt->bindParam(":id_profesor", $id_profesor);
    $stmt->execute();
    $es_administrador = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h4 class="mb-4">Datos de la autoescuela</h4>
<form class="mb-5" method="POST" action="forms/actualizaDatosAutoescuela.php">
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3">
        <div class="mb-4">
            <label for="nombreAutoescuela" class="fw-bold mb-2">Nombre de la autoescuela</label>
            <input type="text" class="form-control" id="nombreAutoescuela" name="autoescuela" placeholder="Nombre de la autoescuela" value="<?php echo isset($autoescuela) ? $autoescuela['nombre'] : ''; ?>" <?php if (!$es_administrador) {
                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                } ?>>
        </div>
        <div class="mb-4">
            <label for="telefonoAutoescuela" class="fw-bold mb-2">Teléfono</label>
            <input type="tel" class="form-control" id="telefonoAutoescuela" name="telefono" placeholder="Teléfono" value="<?php echo isset($autoescuela) ? $autoescuela['telefono'] : ''; ?>" <?php if (!$es_administrador) {
                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                } ?>>
        </div>
        <div class="mb-4">
            <label for="practicaAutoescuela" class="fw-bold mb-2">Precio por clase práctica</label>
            <input type="text" class="form-control" id="practicaAutoescuela" name="precio" placeholder="Precio por clase práctica" value="<?php echo isset($autoescuela) ? $autoescuela['precio_practica'] : ''; ?>" step=".01" <?php if (!$es_administrador) {
                                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                                } ?>>
        </div>
    </div>

    <?php if ($es_administrador) { ?>
        <div>
            <input class="boton" type="submit" name="actualizaDatos" value="Guardar cambios">
        </div>

        <div class="d-flex justify-content-end">
            <a href="#" class="boton-borrar" data-bs-toggle="modal" data-bs-target="#modalBorrarAutoescuela">Borrar autoescuela</a>
        </div>
    <?php } ?>
</form>