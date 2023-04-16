<?php
// Obtener los parámetros de búsqueda
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Realizar la consulta a la base de datos
$stmt = $bd->prepare("SELECT u.nombre, u.apellidos, u.correo FROM usuarios u INNER JOIN alumnos a ON u.id_usuario = a.id_alumno WHERE a.id_autoescuela = :id_autoescuela AND (u.nombre LIKE :busqueda OR u.apellidos LIKE :busqueda OR u.correo LIKE :busqueda)");
$stmt->bindParam(":id_autoescuela", $id_autoescuela);
$stmt->bindValue(":busqueda", "%" . $busqueda . "%");
$stmt->execute();
$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($alumnos);
?>
