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
        // El ID del profesor no existe en la tabla, realizar la inserción
        // Insertar los datos en la tabla profesores
        $stmt = $bd->prepare("INSERT INTO profesores (id_profesor) VALUES (:id_profesor)");
        $stmt->bindParam(":id_profesor", $id_profesor);
        $stmt->execute();


        // Insertar los datos en la tabla autoescuelas
        $stmt = $bd->prepare("INSERT INTO autoescuelas (nombre, telefono, precio_practica, id_profesor) VALUES (:autoescuela, :telefono, :precio, :id_profesor)");
        $stmt->bindParam(":autoescuela", $autoescuela);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":id_profesor", $id_profesor);
        $stmt->execute();

        // Obtener el ID de la última autoescuela insertada
        $id_autoescuela = $bd->lastInsertId();

        $administra = "si";
        // Insertar los datos en la tabla administra
        $stmt = $bd->prepare("INSERT INTO administra (administrador, id_profesor, id_autoescuela) VALUES (:administrador, :id_profesor, :id_autoescuela)");
        $stmt->bindParam(":administrador", $administra);
        $stmt->bindParam(":id_profesor", $id_profesor);
        $stmt->bindParam(":id_autoescuela", $id_autoescuela);
        $stmt->execute();

        header("Location: ../registraAutoescuela.php?registroExitoso=true");
    }
}
