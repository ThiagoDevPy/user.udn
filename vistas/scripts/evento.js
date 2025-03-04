function obtenerEventos() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../controlador/obtenerevento.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var productos = JSON.parse(xhr.responseText);
            var select = document.getElementById('mi-select');

            // Limpiar el select antes de agregar nuevos productos
            select.innerHTML = '<option value="">Selecciona un evento</option>';

            productos.forEach(function(producto) {
                var option = document.createElement('option');
                option.value = producto.id; // Asignar el código como valor
                option.textContent = producto.nombre; // Nombre del producto
                select.appendChild(option);
            });
        }
    };
    
    xhr.send();
}

obtenerEventos();



document.getElementById('guardar').addEventListener('click', function() {
    var select = document.getElementById('mi-select');
    var selectedValue = select.value;

    if (selectedValue) {
        // Realiza una solicitud AJAX para guardar en la sesión
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../controlador/guardarEvento.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                window.location.href="camara.php";
            }
        };
        xhr.send('id=' + encodeURIComponent(selectedValue));
    } else {
        alert('Por favor, selecciona un evento.');
    }
});