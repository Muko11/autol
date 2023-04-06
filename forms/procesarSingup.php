<?php
require_once "../config/config.php";

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$rol = $_POST['rol'];


if (!empty($nombre) && !empty($apellidos) && !empty($correo) && !empty($password) && isset($rol) && isset($_POST['registra'])) {

    $stmt = $bd->prepare("SELECT correo FROM usuarios WHERE correo = :correo");
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $usuario = $stmt->fetch();

    if ($usuario) {
        // El correo ya existe en la base de datos
        header("Location: ../singup.php?registroExitoso=correo");
    } else {
        // El correo no existe en la base de datos, se procede a la inserción
        try {
            $bd->beginTransaction();
            $stmt = $bd->prepare("INSERT INTO usuarios (nombre, apellidos, correo, password, rol) VALUES (:nombre, :apellidos, :correo, :password, :rol)");
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellidos", $apellidos);
            $stmt->bindParam(":correo", $correo);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":rol", $rol);
            $stmt->execute();

            $bd->commit();
            header("Location: ../singup.php?registroExitoso=true");
        } catch (Exception $e) {
            $bd->rollBack();
            throw $e;
        }
    }
} else {
    header("Location: ../singup.php?registroExitoso=false");
}
