<?php
include_once 'componentes/header.php';
?>

<?php
include_once 'componentes/navbar.php';
?>

<div class="container jumbotron cambio">
    <h2>Creación maestros</h2>
    <form id="createTeacherForm"> <!-- Asignamos un ID al formulario para el manejo con Ajax -->
        <div>
            <p class="lead">No. Carnet:</p>
            <input type="text" class="lead" name="id" pattern="[0-9]+" required>
        </div>
        <div>
            <p class="lead">Primer nombre: </p>
            <input type="text" class="lead" name="firstName" required>
        </div>
        <div>
            <p class="lead">Segundo nombre: </p>
            <input type="text" class="lead" name="secondName">
        </div>
        <div>
            <p class="lead">Primer apellido:</p>
            <input type="text" class="lead" name="lastName" required>
        </div>
        <div>
            <p class="lead">Segundo apellido:</p>
            <input type="text" class="lead" name="seclastName">
        </div>
        <div>
            <p class="lead">Fecha de nacimiento:</p>
            <input type="date" class="lead" name="birthDate" required>
        </div>

        <div class="lead">
            <input type="hidden" value="2" name="type"> <!-- Tipo de operación para identificar creación de maestro -->
            <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
        </div>
    </form>

    <div id="responseMessage" class="mt-3"></div> <!-- Mensaje de respuesta -->
</div>

<?php
include_once 'componentes/footer.php';
?>

<!-- Script de Ajax -->
<script>
document.getElementById('createTeacherForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que se recargue la página

    // Crear un objeto FormData para los datos del formulario
    var formData = new FormData(this);

    // Realizar la solicitud Ajax
    fetch('processM.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Convertir la respuesta en JSON
    .then(data => {
        // Manejar la respuesta
        var responseDiv = document.getElementById('responseMessage');
        if (data.success) {
            responseDiv.innerHTML = '<div class="alert alert-success">Maestro creado con éxito.</div>';
            setTimeout(() => {
                    window.location.href = 'readM.php'; // Cambiar a la URL de redirección deseada
                }, 2000);
        } else {
            responseDiv.innerHTML = '<div class="alert alert-danger">Error: ' + data.message + '</div>';
        }
    })
    .catch(error => {
        // Manejar errores
        document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger">Error al crear el maestro.</div>';
    });
});
</script>
