<?php
ob_start();
session_start(); // Iniciar la sesión


// Borra la variable de sesión 'evento_id' si existe
if (isset($_SESSION['evento_id'])) {
    unset($_SESSION['evento_id']);
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir al usuario a la página de inicio de sesión si no está autenticado
    header('Location: login.php'); // Cambia 'login.html' por el nombre de tu página de inicio de sesión
    exit(); // Asegúrate de salir del script después de redirigir

}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Asistencia Uninorte</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="../css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../publico/img/icono.ico">

</head>

<body class="d-flex flex-column min-vh-100">


    <header class="bg-header py-3">
        <div class="container">
            <h1 class="text-center text-white">
                <a href="udn.php"><img src="../img/uninorte-logo.png" alt="" class="logo" /></a>
            </h1>
        </div>

        <nav class="navbar navbar-expand-lg bg-header">
            <div class="container">
                <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-iconn"><img class="navbar-toggler-iconn" src="../img/icons8-menú-64.png" alt=""></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav"> <!-- Añade mx-auto aquí -->
                        <li class="nav-item">
                            <a class="nav-link" href="udn.php">Inicio</a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link" href="cuenta.php">Cuenta</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="certificado.php">Links de Certificados Antiguos</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="../controlador/logout.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container p-3">
            <div>
                <div class="align-items-center">

                    <div class="card border-1 rounded-lg mt-5 p-3 align-items-center text-center" style="max-width: 500px; margin: 0 auto;">
                        <img src="../img/icons8-qr-100.png" class="card-img-top" style="height: 100px; width: 100px;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Asistencia QR.</h5>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Escanear Qr
                            </button>
                        </div>
                    </div>

                    <div class="card border-1 rounded-lg mt-5 p-3 align-items-center text-center"  style="max-width: 500px; margin: 0 auto;">
                        <img src="../img/icons8-eventos-100.png" class="card-img-top" style="height: 100px; width: 100px;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eventos Asistidos</h5>

                            <a href="eventos.php" class="btn btn-primary " type="button">Ver mis Eventos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Seleciona un Evento.</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <select id="mi-select" class="form-select form-select-lg" required>
                            <option value="">Selecciona un evento</option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <div class="d-flex align-items-center justify-content-center">
                            <button class="btn btn-primary" id="guardar">Activar Camara</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>


<footer class="bd-footer py-5 mt-5 bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="d-flex align-items-center justify-content-center">
                <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="../img/icono.ico" aria-label="Bootstrap">
                    <img src="../img/icono.ico" class="img-thumbnail" alt="...">
                </a>
                
            </div>
            
          
              
            <div class="d-flex align-items-center justify-content-center">
            <div>
              
                <h5>Contactanos</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg> Avda. España 676 casi Boquerón</a></li>
                    <li class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg> Tel: (595-21) 229-450</a></li>
                    <li class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg> Tel: +595 983-225-523</a></li>
                    <li class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg> E-mail: info@uninorte.edu.py</a></li>
                </ul>
                  </div>
            </div>
            
                <div class="d-flex align-items-center justify-content-center">
              <ul class="list-unstyled small text-muted">
                    <li class="m-2">Diseñado y Desarrollado por alumnos del Cuarto año turno noche de la carrera de Ingeniería Informática, sede Caacupé, año 2024</a>.</li>
                </ul>
                
            </div>
        </div>
    </div>

    <!-- place footer here -->
</footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="scripts/evento.js"></script>

</body>

</html>


<?php
ob_end_flush();
?>