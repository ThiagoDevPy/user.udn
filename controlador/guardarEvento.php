<?php
session_start(); // Inicia la sesión

if (isset($_POST['id'])) {
    $_SESSION['evento_id'] = $_POST['id']; // Guarda el ID en la sesión
    echo $_SESSION['evento_id'];
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID no recibido.']);
}

?>
