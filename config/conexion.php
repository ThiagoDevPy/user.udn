<?php
include "database.php";
// Configuración de la base de datos
$host = 'ovh1.clusters.zeabur.com';
$port = '32473';
$user = 'root';
$pass = 'fOxvR4c9TM80NIqbHm2p3QFDiV15aj67';
$dbname = 'udn';



try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>