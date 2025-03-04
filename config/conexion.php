<?php
include "database.php";
// Configuración de la base de datos
$host = 'ovh1.clusters.zeabur.com';
$port = '31468';
$user = 'root';
$pass = 'c5T2O4Ev7GN8XuDKCQ6UJMRey1q309FS';
$dbname = 'udn';



try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>