<?php
session_start();
require_once "../config/config.php";

// Validar y sanitizar la entrada del usuario
$correo = $_POST['emailProfesor'];

if (!empty($correo) && isset($_POST['botonAñadirProfesor'])) {

    // Verificar que el correo pertenece a un profesor existente
    $stmt = $bd->prepare("SELECT * FROM usuarios WHERE correo = :correo AND rol = 'profesor'");
    $stmt->bindParam(":correo", $correo);
    $stmt->execute();
    $usuario_elegido = $stmt->fetch();

    if ($usuario_elegido) {

        // Verificar que el profesor no está ya en la tabla de profesores
        $stmt = $bd->prepare("SELECT COUNT(*) FROM profesores WHERE id_profesor = :id_profesor");
        $stmt->bindParam(":id_profesor", $usuario_elegido['id_usuario']);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            // Obtener el ID de la autoescuela desde la variable $_SESSION
            /* $id_profesor = $_SESSION['sesion']['id_usuario'];
            $stmt = $bd->prepare("SELECT * FROM administradores WHERE id_profesor = :id_profesor");
            $stmt->bindParam(":id_profesor", $id_profesor);
            $stmt->execute();
            $id_autoescuela = $stmt->fetch(); */
            $id_autoescuela = $_SESSION['sesion']['id_autoescuela'];
            // Iniciar transacción
            $bd->beginTransaction();

            try {

                // Insertar el registro en la tabla profesores
                $stmt = $bd->prepare("INSERT INTO profesores (id_profesor, id_autoescuela) VALUES (:id_profesor, :id_autoescuela)");
                $stmt->bindParam(":id_profesor", $usuario_elegido['id_usuario']);
                $stmt->bindParam(":id_autoescuela", $id_autoescuela);
                $stmt->execute();

                // Confirmar transacción
                $bd->commit();

                echo "Profesor insertado";
            } catch (Exception $e) {

                // En caso de error, cancelar transacción y mostrar mensaje de error
                $bd->rollBack();
                echo "Error al insertar profesor: " . $e->getMessage();
            }
        } else {

            echo "El profesor ya pertenece a una autoescuela";
        }
    } else {

        echo "El correo no pertenece a un profesor existente";
    }
} else {
    header("Location: ../profesor.php");
}
