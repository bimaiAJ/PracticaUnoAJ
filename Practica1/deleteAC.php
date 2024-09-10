<?php
include_once 'componentes/header.php';
?>
<body>

<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn,"SELECT * FROM course_m WHERE id_cm='" . $_GET['ID'] . "'");
$row= mysqli_fetch_array($result);
?>

<div class="container jumbotron cambio">
    <h2>Eliminación de Asignación de Cursos de Maestro</h2>
    <form id="deleteForm">
        <div>
            <p class="lead">Código de Asignación</p>
            <input readonly type="text" class="lead" name="idA" value="<?php echo $row['id_cm']; ?>">
        </div>
        <div>
            <p class="lead">Código de Curso</p>
            <input readonly type="text" class="lead" name="curso" value="<?php echo $row['id_cour']; ?>">
        </div>
        <div>
            <p class="lead">Código de Maestro</p>
            <input readonly type="text" class="lead" name="idteacher" value="<?php echo $row['id_teach']; ?>">
        </div>

        <div class="lead">
            <input type="hidden" value="17" name="type">
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
        var formData = new FormData(document.getElementById('deleteForm'));

        // Enviar la solicitud AJAX
        fetch('processAC.php', {
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
                    window.location.href = 'cursosAM.php'; // Cambiar a la URL de redirección deseada
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
