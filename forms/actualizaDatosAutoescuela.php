<?php
session_start();
require_once "../config/config.php";

$autoescuela = $_POST['autoescuela'];
$telefono = $_POST['telefono'];
$precio = $_POST['precio'];

if (!empty($autoescuela) && !empty($telefono) && !empty($precio) && isset($_POST['actualizaDatos'])) {

    // Obtener el ID del profesor desde la variable $_SESSION
    $id_profesor = $_SESSION['sesion']['id_usuario'];

    // Comprobar si el ID del profesor ya existe en la tabla profesores
    $stmt = $bd->prepare("UPDATE autoescuelas SET nombre = :nombre, telefono = :telefono, precio_practica = :precio WHERE id_administrador = :id_profesor");
    $stmt->bindParam(":nombre", $autoescuela);
    $stmt->bindParam(":telefono", $telefono);
    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":id_profesor", $id_profesor);
    $stmt->execute();

    // Redirigir a la página principal
    header("Location: ../profesor.php");
    exit();
} else {
    header("Location: ../profesor.php");
}
