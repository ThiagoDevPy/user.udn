<?php
include '../config/conexion.php'; 


// Realiza la consulta para obtener los productos
$query = "SELECT * FROM eventos WHERE estado='1'";
$result = $conexion->query($query);

$productos = array();

while ($row = $result->fetch_assoc()) {
    $productos[] = $row; // Agrega cada producto al array
}

header('Content-Type: application/json');
echo json_encode($productos); // Devuelve los productos como JSON
?>