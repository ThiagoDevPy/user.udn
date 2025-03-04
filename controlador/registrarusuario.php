<?php
// Conectar a la base de datos
include '../config/conexion.php'; 

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del nuevo usuario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $carrera = $_POST['carrera'];
    $mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
    $universidad = $_POST['universidad'];
    $turno = $_POST['turno'];
    $sede = $_POST['sede'];
    $curso = $_POST['curso'];
    $sesion = $_POST['sesion'];
   

    $stmt = $conexion->prepare("SELECT * FROM alumnos WHERE ci = ?");
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $resulta = $stmt->get_result();

    if ($resulta->num_rows >= 1) {
        echo "Ya estás registrado";
    } elseif ($resulta->num_rows == 0) {
        // Aquí va la lógica para guardar los datos
        $sql = "INSERT INTO alumnos (nombres, apellidos, ci, telefono, carrera, correo, universidad,turno,sede,curso,sesion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?)";
        $stmt = $conexion->prepare($sql);

        if ($stmt === false) {
            die("Error en la preparación: " . $conexion->error);
        }

        $stmt->bind_param('sssssssssss', $nombre, $apellido, $cedula, $telefono, $carrera, $mail,$universidad,$turno,$sede,$curso,$sesion);
        
        if ($stmt->execute()) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error al insertar: " . $stmt->error;
        }
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();
}
?>
