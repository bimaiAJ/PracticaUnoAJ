<?php
include_once 'componentes/header.php';
?>

<?php
include_once 'componentes/navbar.php';
?>

<div class="container jumbotron cambio">
    <h2>Creación de Notas a los Estudiantes</h2>
    
    <form id="createStudentForm">
        <div>
            <p class="lead">Código de Nota</p>
            <input type="text" class="lead" name="id" pattern="[0-9]+" required>
        </div>
        <div>
            <p class="lead">Co. curso asignado del Maestro</p>
            <input type="text" class="lead" name="idM" required>
        </div>
        <div>
            <p class="lead">Co. curso asignado del Alumno</p>
            <input type="text" class="lead" name="idE" required>
        </div>
        <div>
            <p class="lead">Materia</p>
            <input type="text" class="lead" name="materia" required>
        </div>
        <div>
            <p class="lead">Zona</p>
            <input type="number" class="lead" name="zona" id="zona" oninput="calcularTotal()" required>
        </div>
        <div>
            <p class="lead">Examen</p>
            <input type="number" class="lead" name="examen" id="examen" oninput="calcularTotal()" required>
        </div>
        <div>
            <p class="lead">Total</p>
            <input type="text" class="lead" name="total" id="total" readonly>
        </div>
        <div class="lead">
            <input type="hidden" value="21" name="type">
            <button type="button" class="btn btn-primary" id="submitBtn">Guardar</button>
        </div>
    </form>
    <div id="responseMessage"></div>
</div>

<?php
include_once 'componentes/footer.php';
?>

<script>
function calcularTotal() {
    // Obtener los valores de los campos 'zona' y 'examen'
    var zona = parseFloat(document.getElementById('zona').value) || 0;
    var examen = parseFloat(document.getElementById('examen').value) || 0;

    // Calcular la suma
    var total = zona + examen;

    // Verificar si el total está dentro del rango permitido
    if (total >= 0 && total <= 100) {
        document.getElementById('total').value = total;
    } else {
        document.getElementById('total').value = 'Fuera de rango';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Agregar el evento click al botón de enviar
    document.getElementById('submitBtn').addEventListener('click', function() {
        // Crear el objeto FormData con los datos del formulario
        var formData = new FormData(document.getElementById('createStudentForm'));

        // Enviar la solicitud Ajax usando Fetch
        fetch('processN.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Mostrar el mensaje de respuesta
            var responseMessage = document.getElementById('responseMessage');
            if (data.success) {
                responseMessage.innerHTML = '<div class="alert alert-success">' + data.message + '</div>';
                setTimeout(() => {
                    window.location.href = 'editarNotas.php'; // Cambiar a la URL de redirección deseada
                }, 2000);
            } else {
                responseMessage.innerHTML = '<div class="alert alert-danger">' + data.message + '</div>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
</script>
