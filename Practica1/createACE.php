<?php
include_once 'componentes/header.php';
?>
<body>

<?php
include_once 'componentes/navbar.php';
?>

<div class="container jumbotron cambio">
    <div class="container-center">
        <h2>Asignación de Curso a Estudiantes</h2>
        <form id="assignmentForm">
            <div>
                <p class="lead">Código de Asignación </p>
                <input type="text" class="lead" name="idAE" pattern="[0-9]+" required>
            </div>
            <div>
                <p class="lead">Código de Curso</p>
                <input type="text" class="lead" name="cursoA" required>
            </div>
            <div>
                <p class="lead">Código de Estudiante</p>
                <input type="text" class="lead" name="idstudent" required>
            </div>
            <div class="lead">
                <input type="hidden" value="18" name="type" id="type">
                <button type="button" id="saveBtn" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        <div id="responseMessage"></div>
    </div>
</div>

<?php
include_once 'componentes/footer.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('saveBtn').addEventListener('click', function() {
        // Obtener los datos del formulario
        var formData = new FormData(document.getElementById('assignmentForm'));

        // Enviar la solicitud AJAX
        fetch('processACE.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Mostrar el mensaje de respuesta
            var responseMessage = document.getElementById('responseMessage');
            if (data.success) {
                responseMessage.innerHTML = '<div class="alert alert-success">' + data.message + '</div>';
                // Opcional: redirigir o realizar otra acción tras la asignación exitosa
                setTimeout(() => {
                    window.location.href = 'cursosAE.php'; // Cambiar a la URL de redirección deseada
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
