<?php
include_once 'componentes/header.php';
?>
<body>

<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn, "SELECT * FROM course_s WHERE id_cs='" . $_GET['ID'] . "'");
$row = mysqli_fetch_array($result);
?>

<div class="container jumbotron cambio">
    <h2>Eliminación de Asignación de Cursos de Estudiantes</h2>
    <form id="deleteAssignmentForm">
        <div>
            <p class="lead">Código de Asignación</p>
            <input readonly type="text" class="lead" name="idAE" value="<?php echo $row['id_cs']; ?>">
        </div>
        <div>
            <p class="lead">Código de Curso</p>
            <input readonly type="text" class="lead" name="cursoA" value="<?php echo $row['id_cour']; ?>">
        </div>
        <div>
            <p class="lead">Carnet de Alumno</p>
            <input readonly type="text" class="lead" name="idstudent" value="<?php echo $row['id_stud']; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="20" name="type">
            <button type="button" id="deleteBtn" class="btn btn-danger">Borrar</button>
        </div>
    </form>
    <div id="responseMessage"></div>
</div>

<?php
include_once 'componentes/footer.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('deleteBtn').addEventListener('click', function() {
        // Obtener los datos del formulario
        var formData = new FormData(document.getElementById('deleteAssignmentForm'));

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
                // Opcional: redirigir o realizar otra acción tras la eliminación exitosa
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
