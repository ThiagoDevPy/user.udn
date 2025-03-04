<?php
session_start(); // Iniciar la sesión
ob_start();
include '../config/conexion.php'; // Asegúrate de que este archivo esté correctamente configurado
  $id= $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    

    // Realiza la consulta
    $query = $conexion->prepare("SELECT * FROM alumnos WHERE id = ?");
    $query->bind_param("i", $id);
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
}
ob_end_flush();
?>



