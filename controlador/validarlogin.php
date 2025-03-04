<?php
session_start(); // Iniciar la sesión
ob_start();
include '../config/conexion.php'; // Asegúrate de que este archivo esté correctamente configurado


if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    
    // Captura la cédula del GET
    $cedula = isset($_GET['cedula']) ? trim($_GET['cedula']) : '';

    // Realiza la consulta
    $query = $conexion->prepare("SELECT * FROM alumnos WHERE ci = ?");
    $query->bind_param("s", $cedula);
    $query->execute();
    $result = $query->get_result();

    // Obtener los datos
    if ($result->num_rows > 0) {
        $rspta = $result->fetch_assoc(); // Obtener la primera fila de resultados
    } else {
        $rspta = null; // No se encontraron datos
    }

    // Devolver los datos como JSON
    header('Content-Type: application/json');
    echo json_encode($rspta);
}else if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $cedula = isset($_POST['cedula']) ? trim($_POST['cedula']) : '';


    // Preparar respuesta
    $response = ['success' => false, 'message' => 'Nombre de usuario o contraseña incorrectos.'];
    
    
    if ($cedula) {
        // Preparar y ejecutar la consulta
        $stmt = $conexion->prepare("SELECT id FROM alumnos WHERE ci = ?");
        $stmt->bind_param("s", $cedula);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Verificar si el usuario existe y si la contraseña es correcta
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id'];
            session_regenerate_id(true); // Regenerar ID de sesión
            $response = ['success' => true, 'message' => 'Inicio de sesión exitoso.'];
        }
    
        $stmt->close();
    }
    
    $conexion->close();
    
    // Enviar respuesta JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    
}
ob_end_flush();
?>



