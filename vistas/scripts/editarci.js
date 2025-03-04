function init(){
    buscar();
}




function buscar(){


    var alerta = document.getElementById('noregistrado');
    var alertacam = document.getElementById('rellenacampos');
    var alertaco = document.getElementById('rellenacorreo');
    var alertacarre = document.getElementById('rellenacarrera');
    var alertauni = document.getElementById('rellenauni');
    var alertanoreg = document.getElementById('noregistrado');
    var alertacedula = document.getElementById('rellenacedula');
    alertacarre.style.display = "none"
    alertauni.style.display = "none"
    alertacedula.style.display = "none";
      var alerta = document.getElementById('noregistrado');
    var alertacam = document.getElementById('rellenacampos');
    var alertaco = document.getElementById('rellenacorreo');
    var alertacarre = document.getElementById('rellenacarrera');
    var alertauni = document.getElementById('rellenauni');
     var alertacurso = document.getElementById('rellenacurso');
    var alertaturno = document.getElementById('rellenaturno');
     var alertasede = document.getElementById('rellenasede');
      var alertasesion = document.getElementById('rellenasesion');
    var alertanoreg = document.getElementById('noregistrado');
    var alertacedula = document.getElementById('rellenacedula');
    alertacarre.style.display = "none"
    alertauni.style.display = "none"
    alertacedula.style.display = "none";
    alertasede.style.display = "none"
    alertaturno.style.display = "none"
    alertacurso.style.display = "none"
    alertasesion.style.display = "none"
    
    $.ajax({
        url: '../controlador/buscar.php', // Cambia esto a la ruta de tu archivo PHP
        type: 'GET', // Cambia a 'POST' si lo necesitas
        dataType: 'json',
        success: function(response) {
            if (response) {
          
                mostrardatos();
                $('#nombres').val(response.nombres);
                $('#apellidos').val(response.apellidos);
                $('#ci').val(response.ci);
                $('#telefono').val(response.telefono);
                $('#correo').val(response.correo);
                $('#cmbcarrera option:selected').text(response.carrera);
                $('#cmbuniversidad option:selected').text(response.universidad);
                $('#cmbsede option:selected').text(response.sede);
                $('#cmbturno option:selected').text(response.turno);
                $('#cmbcurso option:selected').text(response.curso);
                $('#cmbsesion option:selected').text(response.sesion);
                
            } else {
                limpiar();
                desbloquearCampos();
                alertacam.style.display = "none";
                alertaco.style.display = "none"; 
                alerta.style.display = "block";
                registrar();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud: ' + error);
        }
    });
}

function bloquearCampos(){
$('#nombres').prop('disabled', true);
$('#apellidos').prop('disabled', true);
$('#ci').prop('disabled', true);
$('#telefono').prop('disabled', true);
$('#carrera').prop('disabled', true);
$('#universidad').prop('disabled', true);
$('#correo').prop('disabled', true);
$('#turno').prop('disabled', true);
$('#sede').prop('disabled', true);
$('#curso').prop('disabled', true);
$('#sesion').prop('disabled', true);
}

function desbloquearCampos(){
    $('#nombres').prop('disabled', false);
    $('#apellidos').prop('disabled', false);
    $('#ci').prop('disabled', false);
    $('#telefono').prop('disabled', false);
    $('#carrera').prop('disabled', false);
    $('#universidad').prop('disabled', false);
    $('#correo').prop('disabled', false);
    $('#turno').prop('disabled', false);
$('#sede').prop('disabled', false);
$('#curso').prop('disabled', false);
$('#sesion').prop('disabled', false);
}




function mostrardatos(){
    $('#campos-confirmacion').show();
    $('#campos-adicionales1').hide();
    $('#campos-adicionales').show();
}

function registrar(){
    $('#campos-adicionales1').show();
    $('#campos-confirmacion').show();
    $('#campos-adicionales').hide();
    
}


function ocultar(){
    $('#campos-adicionales1').hide();
    $('#campos-confirmacion').hide();
    $('#campos-adicionales').hide();
}

function limpiar(){
    $("#nombres").val("");
    $('#apellidos').val("");
    $('#telefono').val("");
    $('#carrera').val("");
    $('#universidad').val("");
    $('#correo').val("");

}



function login() {
    // Obtener los valores del formulario
    var cedula = document.getElementById('cedula').value;
   
   
    // Crear una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controlador/validarlogin.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   
    // Configurar el callback para manejar la respuesta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
               var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = 'home'; // Redirigir al dashboard
                } else {
                    alert("Datos Incorrectos");
                }
            } else {
                document.getElementById('message').textContent = 'Error en la solicitud.';
            }
        }
    };
   
    // Enviar los datos del formulario
    xhr.send('cedula=' + encodeURIComponent(cedula) );
   }




   function editarUsuario() {
    var nombre = document.getElementById('nombres').value.trim();
    var apellido = document.getElementById('apellidos').value.trim();
    var telefono = document.getElementById('telefono').value.trim();
    var correo = document.getElementById('correo').value.trim();
    var correoValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo);
    
   

    var carreraSelect = document.getElementById('cmbcarrera');
    var carreraTexto = carreraSelect.options[carreraSelect.selectedIndex].text;
    var carreraValue = carreraSelect.value; 
    
    var universidadSelect = document.getElementById('cmbuniversidad');
    var universidadTexto = universidadSelect.options[universidadSelect.selectedIndex].text;
    var universidadValue = universidadSelect.value;


    var sedeSelect = document.getElementById('cmbsede');
    var sedeTexto = sedeSelect.options[sedeSelect.selectedIndex].text;
    var sedeValue = sedeSelect.value;


    var turnoSelect = document.getElementById('cmbturno');
    var turnoTexto = turnoSelect.options[turnoSelect.selectedIndex].text;
    var turnoValue = turnoSelect.value;


    var cursoSelect = document.getElementById('cmbcurso');
    var cursoTexto = cursoSelect.options[cursoSelect.selectedIndex].text;
    var cursoValue = cursoSelect.value;
   

    var sesionSelect = document.getElementById('cmbsesion');
    var sesionTexto = sesionSelect.options[sesionSelect.selectedIndex].text;
    var sesionValue = sesionSelect.value;
    
    var alerta = document.getElementById('rellenacampos');
    var alertaco = document.getElementById('rellenacorreo');
    var alertacarre = document.getElementById('rellenacarrera');
    var alertauni = document.getElementById('rellenauni');
     var alertacedula = document.getElementById('rellenacedula');
      var alertaturno = document.getElementById('rellenaturno');
       var alertasede = document.getElementById('rellenasede');
        var alertacurso = document.getElementById('rellenacurso');
         var alertasesion = document.getElementById('rellenasesion');
  
    var alertanoreg = document.getElementById('noregistrado');
    var alertaregis = document.getElementById('registradoco');
    

    
       alerta.style.display = "none";
        alertacedula.style.display = "none";
         alertacarre.style.display = "none";    
           alertauni.style.display = "none";     // Mostrar alerta de selección incorrecta

     alerta.style.display = "none";
        alertacedula.style.display = "none";
         alertacarre.style.display = "none";    
           alertauni.style.display = "none";     // Mostrar alerta de selección incorrecta
 alertacurso.style.display = "none";   
  alertaturno.style.display = "none"; 
    alertasede.style.display = "none"; 
    alertasesion.style.display = "none";
        alertaco.style.display= "none";

  

    


    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controlador/editarusuario.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
             buscar();
            alertaregis.style.display = "block";
            setTimeout(function() {
                alertaregis.style.display = "none";
            }, 3000);  // 3000 ms = 3 segundos
            

        } else {
            alert('Error en la solicitud.');
        }
    };

    xhr.send(
        'nombre=' + encodeURIComponent(nombre) +
        '&apellido=' + encodeURIComponent(apellido) +
        '&carrera=' + encodeURIComponent(carreraTexto) + // Usar el texto de la carrera
        '&telefono=' + encodeURIComponent(telefono) +
        '&mail=' + encodeURIComponent(correo) +
        '&universidad=' + encodeURIComponent(universidadTexto)+
        '&turno=' + encodeURIComponent(turnoTexto)+
        '&sede=' + encodeURIComponent(sedeTexto)+
        '&curso=' + encodeURIComponent(cursoTexto)+
        '&sesion=' + encodeURIComponent(sesionTexto)
    );
}



 $(document).keypress(function (e) {
      if (e.which == 13) { // 13 es el código de la tecla Enter
        e.preventDefault(); // Prevenir el comportamiento por defecto
      buscarCi()
      }
    });   
    
    
    
    
    init();
