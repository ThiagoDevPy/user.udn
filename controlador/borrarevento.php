<?php
session_start();

// Borra la variable de sesión 'evento_id' si existe
if (isset($_SESSION['evento_id'])) {
    unset($_SESSION['evento_id']);
    header('Location: ../vistas/udn.php');
}
?>