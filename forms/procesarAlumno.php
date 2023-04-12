<?php
session_start();
require_once "../config/config.php";

// Validar y sanitizar la entrada del usuario
$correo = $_POST['emailAlumno'];

if (!empty($correo) && isset($_POST['botonAñadirAlumno'])) {

    // Verificar que el correo pertenece a un alumno existente
    $stmt = $bd->prepare("SELECT * FROM usuarios WHERE correo = :correo AND rol = 'alumno'");
    $stmt->bindParam(":correo", $correo);
    $stmt->execute();
    $usuario_elegido = $stmt->fetch();

    if ($usuario_elegido) {

        // Verificar que el alumno no está ya en la tabla de alumnos
        $stmt = $bd->prepare("SELECT COUNT(*) FROM alumnos WHERE id_alumno = :id_alumno");
        $stmt->bindParam(":id_alumno", $usuario_elegido['id_usuario']);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            // Obtener el ID de la autoescuela desde la variable $_SESSION
            /* $id_alumno = $_SESSION['sesion']['id_usuario'];
            $stmt = $bd->prepare("SELECT * FROM administradores WHERE id_alumno = :id_alumno");
            $stmt->bindParam(":id_alumno", $id_alumno);
            $stmt->execute();
            $id_autoescuela = $stmt->fetch(); */
            $id_autoescuela = $_SESSION['sesion']['id_autoescuela'];
            // Iniciar transacción
            $bd->beginTransaction();

            try {

                // Insertar el registro en la tabla alumnos
                $stmt = $bd->prepare("INSERT INTO alumnos (id_alumno, id_autoescuela) VALUES (:id_alumno, :id_autoescuela)");
                $stmt->bindParam(":id_alumno", $usuario_elegido['id_usuario']);
                $stmt->bindParam(":id_autoescuela", $id_autoescuela);
                $stmt->execute();

                // Confirmar transacción
                $bd->commit();

                echo "Alumno insertado";
            } catch (Exception $e) {

                // En caso de error, cancelar transacción y mostrar mensaje de error
                $bd->rollBack();
                echo "Error al insertar alumno: " . $e->getMessage();
            }
        } else {

            echo "El alumno ya existe en la tabla de alumnos";
        }
    } else {

        echo "El correo no pertenece a un alumno existente";
    }
}
