<?php
define("ZONA_HORARIA", "America/Asuncion");
date_default_timezone_set(ZONA_HORARIA);
session_start();
$user_id = $_SESSION['user_id'];
require '../config/conexion.php';

$fecha = date("Y-m-d");
$hora = date("H:i.s");


 if (!isset($_SESSION['user_id'])) {
        echo ('Inicia Sesion y escanea el Qr desde la pagina https://asistenciauninorte.com .');
        exit();
    }

   if (!isset($_SESSION['evento_id'])) {
        echo ('Selecciona un evento y escanea el Qr desde la pagina https://asistenciauninorte.com .');
         exit();
    }
    
   


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (empty($id)) {
        die('ID no valido.');
    }


    $stmt = $conexion->prepare("SELECT * FROM qr WHERE qr_id = ? AND estado = 'no utilizado'");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $evento_id = $_SESSION['evento_id'];

        $stmt = $conexion->prepare("SELECT * FROM asistencias WHERE alumno_id = ? AND id_evento= ?");
        $stmt->bind_param("ii", $user_id, $evento_id);
        $stmt->execute();
        $resulta = $stmt->get_result();

        if ($resulta->num_rows == 1) {
            $stmt = $conexion->prepare("INSERT INTO asistencias (alumno_id, fecha,hora, tipo, id_evento) VALUES (?, '$fecha', '$hora', 'SALIDA', ?);");
            $stmt->bind_param("ii", $user_id, $evento_id);
            if ($stmt->execute()) {
                unset($_SESSION['evento_id']);
                header("Location: ../vistas/guardarexito.php");
            } else {
                echo "Error al guardar asistencia: " . $stmt->error;
            }
        } elseif ($resulta->num_rows >= 2) {
            header("Location: ../vistas/guardarmensaje.php");
            unset($_SESSION['evento_id']);
        } elseif ($resulta->num_rows == 0) {
            // Aquí va la lógica para guardar los datos

            $stmt = $conexion->prepare("INSERT INTO asistencias (alumno_id, fecha,hora, tipo, id_evento) VALUES (?, '$fecha', '$hora', 'ENTRADA', ?);");
            $stmt->bind_param("ii", $user_id, $evento_id);
            if ($stmt->execute()) {
                unset($_SESSION['evento_id']);
                header("Location:  ../vistas/guardarexito.php");
            } else {
                unset($_SESSION['evento_id']);
                echo "Error al guardar asistencia: " . $stmt->error;
            }
        }
    } else {
        
        header("Location: ../vistas/obsoleto.php");
    }


    $stmt->close();
} else {
    echo "No se recibió el ID del usuario.";
    unset($_SESSION['evento_id']);
}

$conexion->close();
