<?php
require_once "../config/config.php";

$correo = $_POST['correo'];
$password = $_POST['password'];

if (!empty($correo) && !empty($password) && isset($_POST['login'])) {

    $stmt = $bd->prepare("SELECT * FROM usuarios WHERE correo = :correo");
    $stmt->bindParam(":correo", $correo);
    $stmt->execute();
    $usuario = $stmt->fetch();

    if (!empty($usuario) && password_verify($password, $usuario['password'])) {
        /* session_start();
        $_SESSION['sesion'] = $usuario['apellidos']; */
        session_start();
        $_SESSION['sesion'] = array(
            'id_usuario' => $usuario['id_usuario'],
            'nombre' => $usuario['nombre'],
            'apellidos' => $usuario['apellidos'],
            'correo' => $usuario['correo'],
            'rol' => $usuario['rol']
        );
        header("Location: ../login.php?loginExitoso=true");
        echo "Login correcto";
    } else {
        header("Location: ../login.php?loginExitoso=false");
    }
}
