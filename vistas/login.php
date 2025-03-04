<?php
session_start();

// Borra la variable de sesión 'evento_id' si existe
if (isset($_SESSION['evento_id'])) {
    unset($_SESSION['evento_id']);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Optimización SEO -->
    <title>Asistencia Uninorte - Registro y Gestión de Asistencia</title>
    <meta name="description" content="Sistema de Asistencia Uninorte: Gestiona y registra asistencia de manera rápida y eficiente. Inicia sesión para acceder a tus datos.">

    <!-- CSS externo para estilos personalizados -->
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../publico/img/icono.ico">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .bg-header {
            background-color: #007bff;
        }
        .logo {
            max-width: 150px;
            height: auto;
        }
        .bg-footer {
            background-color: #f0f0f0af;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="bg-header py-2">
        <div class="container">
            <h2 class="text-center text-white"><img src="../img/uninorte-logo.png" alt="Logo de Asistencia Uninorte" class="logo"></h2>
        </div>
    </header>

      <div class="container mt-5 py-5">
        <h1 class="text-center">Bienvenido a Asistencia Uninorte</h1>
        <h4 class="text-center">Registro y Gestión de Asistencia Simplificada</h4>
        
        <!-- Formulario de inicio de sesión -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-secondary">
                    <div class="card-header text-white bg-primary">
                        <strong>➪ INICIAR SESIÓN</strong>
                    </div>
                    <div id="registration-form" class="p-5" method="POST" action="registrar/participantes.php">
                        <div class="alert alert-warning" role="alert" style="display: none;" id="noregistrado">
                            No estás registrado, puedes registrarte ahora.
                        </div>
                        <div class="alert alert-success" role="alert" style="display: none;" id="registradoco">
                            ¡Registrado Correctamente!
                        </div>

                        <div class="mb-3 row align-items-center">
                            <label class="form-label mt-4">N° de Cédula:</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" id="cedula" name="txt_ci" placeholder="Introduzca su Cedula de Identidad" autofocus required>
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-center py-4">
                                <input type="button" class="btn btn-primary" id="btn_ci" onclick="buscarCi()" value="Buscar">
                            </div>
                        </div>

                        <div id="campos-confirmacion" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label mt-4">Nombre Completo(*):</label>
                                <input type="text" class="form-control" id="nombres" placeholder="Introduzca su Nombre Completo" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apellido Completo(*):</label>
                                <input type="text" class="form-control" id="apellidos" placeholder="Introduzca su Apellido Completo" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail(*):</label>
                                <input type="email" class="form-control" id="correo" placeholder="Introduzca su Correo Electrónico" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">N° de Teléfono(*):</label>
                                <input type="text" class="form-control" id="telefono" placeholder="Introduzca su Número de Teléfono" autofocus required>
                            </div>

                            <!-- Campos adicionales -->
                            <div id="campos-adicionales">
                                <div class="mb-3">
                                    <label class="form-label">Universidad(*):</label>
                                    <input type="text" class="form-control" id="universidad" placeholder="Introduzca su Universidad" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Carrera(*):</label>
                                    <input type="text" class="form-control" id="carrera" placeholder="Introduzca su Carrera" autofocus required>
                                </div>
                                
                                
                                <div class="mb-3">
                                    <label class="form-label">Turno(*):</label>
                                    <input type="text" class="form-control" id="turno" placeholder="Introduzca su Carrera" autofocus required>
                                </div>
                                
                                  <div class="mb-3">
                                    <label class="form-label">Sede(*):</label>
                                    <input type="text" class="form-control" id="sede" placeholder="Introduzca su Carrera" autofocus required>
                                </div>
                                   
                                  <div class="mb-3">
                                    <label class="form-label">Curso(*):</label>
                                    <input type="text" class="form-control" id="curso" placeholder="Introduzca su Carrera" autofocus required>
                                </div>
                                
                                   
                                  <div class="mb-3">
                                    <label class="form-label">Sesion(*):</label>
                                    <input type="text" class="form-control" id="sesion" placeholder="Introduzca su Carrera" autofocus required>
                                </div>

                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                    <a class="btn btn-primary" onclick="login()">Iniciar Sesión</a>
                                </div>
                            </div>
                        </div>

                        <div id="campos-adicionales1" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Universidad(*):</label>
                                <select id="cmbuniversidad" class="form-select form-control" name="txt_uni">
                                    <option value="0" selected>Seleccione su Universidad</option>
                                    <option value="1">Universidad del Norte</option>
                                    <option value="1">Universidad Americana</option>
                                    <option value="2">Otro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Carrera(*):</label>
                                <select class="form-select form-control" name="txt_carrera" id="cmbcarrera">
                                    <option value="0" selected>Seleccione su Carrera</option>
                                    <option value="1">Ingenieria Informatica</option>
                                    <option value="2">Ingenieria Comercial</option>
                                    <option value="3">Ciencia Contables</option>
                                    <option value="4">Derecho</option>
                                    <option value="5">Administracion de Empresas</option>
                                    <option value="6">Medicina</option>
                                    <option value="7">Ingenieria Electromecanica</option>
                                    <option value="8">Bioquimica</option>
                                    <option value="9">Comercio Exterior y Relaciones Internacionales</option>
                                    <option value="10">Enfermeria</option>
                                    <option value="11">Escribania Publica</option>
                                    <option value="12">Fisioterapia y Kinesiologia</option>
                                    <option value="13">Ingenieria en Telecomunicaciones</option>
                                    <option value="14">Mercadotecnia</option>
                                    <option value="15">Nutricion</option>
                                    <option value="16">Odontologia</option>
                                    <option value="17">Periodismo</option>
                                    <option value="18">Psicologia</option>
                                    <option value="19">Docente u otro</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Turno(*):</label>
                                <select class="form-select form-control" name="txt_turno" id="cmbturno">
                                    <option value="0" selected>Seleccione su Turno</option>
                                    <option value="1">Mañana</option>
                                    <option value="2">Tarde</option>
                                    <option value="3">Noche</option>
                                </select>
                            </div>


                          <div class="mb-3">
                                <label class="form-label">Sede(*):</label>
                                <select class="form-select form-control" name="txt_turno" id="cmbsede">
                                <option value="0" selected>Seleccione su Sede</option>
                                    <option value="1">Asuncion</option>
                                    <option value="2">Caacupe</option>
                                    <option value="3">Ciudad del Este</option>
                                    <option value="4">Encarnacion</option>
                                    <option value="5">Ita</option>
                                    <option value="6">Itagua</option>
                                    <option value="7">Luque</option>
                                    <option value="8">Pedro Juan Caballero</option>
                                    <option value="9">Villarrica</option>
                                    </select>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Curso(*):</label>
                                <select class="form-select form-control" name="txt_curso" id="cmbcurso">
                                <option value="0" selected>Seleccione su Curso</option>
                                    <option value="1">Primero</option>
                                    <option value="2">Segundo</option>
                                    <option value="3">Tercero</option>
                                    <option value="4">Cuarto</option>
                                    <option value="5">Quinto</option>
                                    <option value="6">Sexto</option>
                                 </select>
                            </div>

                                <div class="mb-3">
                                <label class="form-label">Sesion(*):</label>
                                <select class="form-select form-control" name="txt_turno" id="cmbsesion">
                                    <option value="0" selected>Seleccione su Turno</option>
                                      <option value="1">N/A</option>
                                    <option value="2">A</option>
                                    <option value="3">B</option>
                                    <option value="4">C</option>
                                </select>
                            </div>



                               <div class="alert alert-danger" role="alert" style="display: none;" id="rellenacampos">
                                Por favor, completa todos los campos.
                            </div>
                            <div class="alert alert-danger" role="alert" style="display: none;" id="rellenacorreo">
                                Correo electrónico no válido.
                            </div>
                            
                            <div class="alert alert-danger" role="alert" style="display: none;" id="rellenacarrera">
                               Por favor, seleccione una carrera o área de ocupación.
                            </div>
                            <div class="alert alert-danger" role="alert" style="display: none;" id="rellenacedula">
                               Por favor, ingrese su numero de cedula.
                            </div>
                              
                            <div class="alert alert-danger" role="alert" style="display: none;" id="rellenauni">
                               Por favor, seleccione su universidad.
                            </div>
                             <div class="alert alert-danger" role="alert" style="display: none;" id="rellenaturno">
                               Por favor, seleccione su Turno.
                            </div>
                              <div class="alert alert-danger" role="alert" style="display: none;" id="rellenasesion">
                               Por favor, seleccione la Sesion.
                            </div>
                              <div class="alert alert-danger" role="alert" style="display: none;" id="rellenacurso">
                               Por favor, seleccione su Curso.
                            </div>
                              <div class="alert alert-danger" role="alert" style="display: none;" id="rellenasede">
                               Por favor, seleccione su Sede.
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                <a class="btn btn-primary" onclick="registrarUsuario()">Registrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<footer class="bd-footer py-5 mt-5 bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="d-flex align-items-center justify-content-center">
                <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="img/icono.ico" aria-label="Bootstrap">
                    <img src="img/icono.ico" class="img-thumbnail" alt="...">
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

    <!-- Cargar los scripts al final para mejorar rendimiento -->
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script defer src="/scripts/buscarci.js"></script>
</body>

</html>
