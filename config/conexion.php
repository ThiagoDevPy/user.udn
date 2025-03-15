<?php
include "database.php";
// Configuración de la base de datos
$host = 'udn.czkek0iasari.sa-east-1.rds.amazonaws.com';
$port = '3308';
$user = 'admin';
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