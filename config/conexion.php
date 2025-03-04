<?php
include "database.php";
// Configuración de la base de datos
$host = 'junction.proxy.rlwy.net';
$port = '29203';
$user = 'root';
$pass = 'ECNcZDwDbjMJQXAkWZJubijaljQyjqlh';
$dbname = 'udn';



try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>