<?php
include '../config/conexion.php'; 
session_start();

// Verificar que la sesión esté activa y que user_id esté definido
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Usuario no autenticado']);
    exit;
}

$id = $_SESSION['user_id'];

// Preparar la consulta
$sql = "SELECT e.nombre, a.*, e.estado,e.horaexten, e.links, e.fecha AS fechaevento FROM asistencias a INNER JOIN eventos e ON a.id_evento = e.id WHERE a.alumno_id = ? AND tipo = 'SALIDA'";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id); // 'i' para integer
$stmt->execute();

$result = $stmt->get_result();
$eventos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $eventos[] = $row;
    }
}

$stmt->close();
$conexion->close();

echo json_encode($eventos);
?>