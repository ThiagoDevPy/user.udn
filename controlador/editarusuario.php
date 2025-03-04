<?php
// Conectar a la base de datos
session_start();

// Incluir el archivo de conexión
include '../config/conexion.php';

// Activar el reporte de errores para ver si ocurre algo mal
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar si los datos han sido enviados por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $correo = isset($_POST['mail']) ? $_POST['mail'] : '';
    $carrera = isset($_POST['carrera']) ? $_POST['carrera'] : '';
    $universidad = isset($_POST['universidad']) ? $_POST['universidad'] : '';
    $turno = isset($_POST['turno']) ? $_POST['turno'] : '';
    $sede = isset($_POST['sede']) ? $_POST['sede'] : '';
    $curso = isset($_POST['curso']) ? $_POST['curso'] : '';
    $sesion = isset($_POST['sesion']) ? $_POST['sesion'] : '';


    // Aquí iría la lógica para actualizar los datos en la base de datos
    $sql = "UPDATE alumnos SET nombres = ?, apellidos = ?, telefono = ?, carrera = ?, correo = ?, universidad = ?, turno = ?, sede = ?, curso = ?, sesion = ? WHERE id = ?";

    // Preparar la consulta SQL
    if ($stmt = $conexion->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param('ssssssssssi', $nombre, $apellido, $telefono, $carrera, $correo, $universidad, $turno, $sede, $curso, $sesion, $_SESSION['user_id']);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Usuario actualizado correctamente.";
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
    
    // Cerrar la conexión
    $conexion->close();
} else {
    echo "Método no permitido.";
}
?>

