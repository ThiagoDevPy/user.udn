<?php
include "database.php";
// Configuración de la base de datos
$host = 'ovh1.clusters.zeabur.com';
$port = '31134';
$user = 'root';
$pass = '4DjB2QiY6pUtyK9x0MJ1IeA8GcT5O7n3';
$dbname = 'udn';



try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>