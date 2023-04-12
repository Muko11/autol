<?php
session_start();
require_once "../config/config.php";

$autoescuela = $_POST['autoescuela'];
$telefono = $_POST['telefono'];
$precio = $_POST['precio'];

if (!empty($autoescuela) && !empty($telefono) && !empty($precio) && isset($_POST['registroAutoescuela'])) {

    // Obtener el ID del profesor desde la variable $_SESSION
    $id_profesor = $_SESSION['sesion']['id_usuario'];

    // Comprobar si el ID del profesor ya existe en la tabla profesores
    $stmt = $bd->prepare("SELECT id_profesor FROM profesores WHERE id_profesor = :id_profesor");
    $stmt->bindParam(":id_profesor", $id_profesor);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // El ID del profesor ya existe en la tabla, mostrar mensaje de alerta
        header("Location: ../registraAutoescuela.php?registroExitoso=false");
    } else {

        try {
            $bd->beginTransaction();

            // Insertar los datos en la tabla autoescuelas
            $stmt = $bd->prepare("INSERT INTO autoescuelas (nombre, telefono, precio_practica) VALUES (:autoescuela, :telefono, :precio)");
            $stmt->bindParam(":autoescuela", $autoescuela);
            $stmt->bindParam(":telefono", $telefono);
            $stmt->bindParam(":precio", $precio);
            $stmt->execute();

            // Obtener el ID de la última autoescuela insertada
            $id_autoescuela = $bd->lastInsertId();

            // El ID del profesor no existe en la tabla, realizar la inserción
            // Insertar los datos en la tabla profesores
            $stmt = $bd->prepare("INSERT INTO profesores (id_profesor, id_autoescuela) VALUES (:id_profesor, :id_autoescuela)");
            $stmt->bindParam(":id_profesor", $id_profesor);
            $stmt->bindParam(":id_autoescuela", $id_autoescuela);
            $stmt->execute();

            // Insertar los datos en la tabla administradores
            $stmt = $bd->prepare("INSERT INTO administradores (id_profesor, id_autoescuela) VALUES (:id_profesor, :id_autoescuela)");
            $stmt->bindParam(":id_profesor", $id_profesor);
            $stmt->bindParam(":id_autoescuela", $id_autoescuela);
            $stmt->execute();

            $bd->commit();

            header("Location: ../registraAutoescuela.php?registroExitoso=true");
        } catch (PDOException $e) {
            $bd->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }
}
