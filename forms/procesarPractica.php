<?php
session_start();
require_once "../config/config.php";

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$tipo = $_POST['tipo'];

if (!empty($fecha) && !empty($hora) && !empty($tipo) && isset($_POST['crearPractica'])) {

    $id_profesor = $_SESSION['sesion']['id_usuario'];

    // Verificar si la práctica ya existe
    $stmt = $bd->prepare("SELECT COUNT(*) FROM practicas WHERE id_profesor = :id_profesor AND fecha = :fecha AND hora = :hora");
    $stmt->bindParam(':id_profesor', $id_profesor);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':hora', $hora);
    $stmt->execute();
    $existe = $stmt->fetchColumn();

    if ($existe > 0) {
        echo "No se pudo crear la práctica porque ya existe una práctica con la misma fecha y hora";
    } else {
        // Insertar la práctica
        $stmt = $bd->prepare("INSERT INTO practicas (id_profesor, id_alumno, fecha, hora, tipo) VALUES (:id_profesor, NULL, :fecha, :hora, :tipo)");
        $stmt->bindParam(':id_profesor', $id_profesor);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->execute();
        echo "Práctica creada";
    }
} else {
    header("Location: ../profesor.php");
}
