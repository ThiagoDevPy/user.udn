function obtenerInformacionUsuario() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../controlador/horaextentotal.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Mostrar la información del usuario en la página
                    document.getElementById('totalhoraexten').textContent = response.total_horaexten; // Corrige aquí
                } else {
                    echo (response.message);
                }
            } else {
                echo('Error en la solicitud.');
            }
        }
    };

    xhr.send();
}

// Llamar a la función para obtener la información del usuario
window.onload = obtenerInformacionUsuario;