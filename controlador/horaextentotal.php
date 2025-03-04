<?php
ob_start();
session_start(); // Iniciar la sesión
// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir al usuario a la página de inicio de sesión si no está autenticado
    echo json_encode(['success' => false, 'message' => 'No autenticado']);
    exit();
}

// Conectar a la base de datos
include '../config/conexion.php'; // Asegúrate de que este archivo esté correctamente configurado

// Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Consultar la base de datos para obtener la información del usuario
$stmt = $conexion->prepare("SELECT SUM(e.horaexten) AS total_horaexten
FROM asistencias a
INNER JOIN eventos e ON a.id_evento = e.id
WHERE a.alumno_id = ? AND a.tipo = 'SALIDA'");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $row = $result->fetch_assoc();
    $total_horaexten = $row['total_horaexten'] ?? 0; // Asigna 0 si no hay resultados

    // Enviar la suma como respuesta JSON
    echo json_encode(['success' => true, 'total_horaexten' => $total_horaexten]);
} else {
    // Manejar el caso donde la consulta falla
    echo json_encode(['success' => false, 'message' => 'Error en la consulta']);
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
ob_end_flush();
?>