<?php
include "database.php";
// Configuración de la base de datos
$host = '192.168.0.5';
$port = '3306';
$user = 'root';
$pass = 'Thiago2002';
$dbname = 'udn';


try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>