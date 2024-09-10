<?php
include_once 'componentes/header.php';
?>

<?php
include_once 'componentes/navbar.php';
?>

<div class="container jumbotron cambio">
    <h2>Creación estudiantes</h2>
    
    <form id="studentForm">            
        <div>
            <p class="lead">No. Carnet:</p>
            <input type="text" class="lead" name="id" pattern="[0-9]+">
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
            <input type="hidden" value="1" name="type">
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
document.getElementById('studentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que se recargue la página

    // Crear un objeto FormData para los datos del formulario
    var formData = new FormData(this);

    // Realizar la solicitud Ajax
    fetch('processE.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Convertir la respuesta en JSON
    .then(data => {
        // Manejar la respuesta
        var responseDiv = document.getElementById('responseMessage');
        if (data.success) {
            responseDiv.innerHTML = '<div class="alert alert-success">Estudiante guardado correctamente.</div>';
            setTimeout(() => {
                    window.location.href = 'readE.php'; // Cambiar a la URL de redirección deseada
                }, 2000);
        } else {
            responseDiv.innerHTML = '<div class="alert alert-danger">Error: ' + data.message + '</div>';
        }
    })
    .catch(error => {
        // Manejar errores
        document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger">Error al guardar el estudiante.</div>';
    });
});
</script>
