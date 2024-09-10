<?php
include_once 'componentes/header.php';
?>
<body>

<?php
include_once 'componentes/navbar.php';
?>

<div class="container jumbotron cambio">
    <div class="container-center">
        <h2>Asignación de cursos a Maestros</h2>
        <form id="assignmentForm"> <!-- Asignamos un ID al formulario para el manejo con Ajax -->
            <div>
                <p class="lead">Código de Asignación:</p>
                <input type="text" class="lead" name="idA" pattern="[0-9]+" required>
            </div>
            <div>
                <p class="lead">Código de Curso:</p>
                <input type="text" class="lead" name="curso" required>
            </div>
            <div>
                <p class="lead">Código de Maestro:</p>
                <input type="text" class="lead" name="idteacher">
            </div>
            <div class="lead">
                <input type="hidden" value="10" name="type" id="type"> <!-- Tipo de operación -->
                <button type="submit" class="btn btn-primary">Guardar</button> <!-- Usamos botón en lugar de submit -->
            </div>
        </form>
        <div id="responseMessage" class="mt-3"></div> <!-- Mensaje de respuesta -->
    </div>
</div>

<?php
include_once 'componentes/footer.php';
?>

<!-- Script de Ajax -->
<script>
document.getElementById('assignmentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que se recargue la página

    // Crear un objeto FormData para los datos del formulario
    var formData = new FormData(this);

    // Realizar la solicitud Ajax
    fetch('processAC.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Convertir la respuesta en JSON
    .then(data => {
        // Manejar la respuesta
        var responseDiv = document.getElementById('responseMessage');
        if (data.success) {
            responseDiv.innerHTML = '<div class="alert alert-success">Asignación guardada con éxito.</div>';
            setTimeout(() => {
                    window.location.href = 'cursosAM.php'; // Cambiar a la URL de redirección deseada
                }, 2000);
        } else {
            responseDiv.innerHTML = '<div class="alert alert-danger">Error: ' + data.message + '</div>';
        }
    })
    .catch(error => {
        // Manejar errores
        document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger">Error al guardar la asignación.</div>';
    });
});
</script>
