<?php
include "database.php";
// Configuración de la base de datos
$host = 'ovh1.clusters.zeabur.com';
$port = '32393';
$user = 'root';
$pass = '2vYB3Gr7b4chgxdil685Iyz90FW1OQea';
$dbname = 'udn';



try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>