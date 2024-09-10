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
    <h2>Actualización de asignación de cursos de maestro</h2>
    <form id="updateForm">
        <div>
            <p class="lead">Codigo de Asignación</p>
            <input readonly type="text" class="lead" name="idA" value="<?php echo $row['id_cm']; ?>">
        </div>
        <div>
            <p class="lead">Codigo Curso</p>
            <input type="text" class="lead" name="curso" value="<?php echo $row['id_cour']; ?>">
        </div>
        <div>
            <p class="lead">Codigo Maestro</p>
            <input type="text" class="lead" name="idteacher" value="<?php echo $row['id_teach']; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="16" name="type">
            <button type="button" id="updateBtn" class="btn btn-success">Actualizar</button>
        </div>
    </form>
    <div id="responseMessage"></div>
</div>

<?php
include_once 'componentes/footer.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('updateBtn').addEventListener('click', function() {
        // Obtener los datos del formulario
        var formData = new FormData(document.getElementById('updateForm'));

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
