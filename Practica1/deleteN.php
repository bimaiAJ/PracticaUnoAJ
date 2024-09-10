<?php
include_once 'componentes/header.php';
?>
<body>
    
<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn, "SELECT * FROM asig_course WHERE identifier_ac='" . $_GET['identifier'] . "'");
$row = mysqli_fetch_array($result);
?>

<div class="container jumbotron cambio">
    <h2>Eliminación de Notas</h2>
    <form id="deleteGradeForm">
        <div>
            <p class="lead">Carnet:</p>
            <input readonly type="text" class="lead" name="id" value="<?php echo $row['identifier_ac']; ?>">
        </div>
        <div>
            <p class="lead">Código Maestro:</p>
            <input readonly type="text" class="lead" name="idM" value="<?php echo $row['id_cm']; ?>">
        </div>
        <div>
            <p class="lead">Código Estudiante:</p>
            <input readonly type="text" class="lead" name="idE" value="<?php echo $row['id_cs']; ?>">
        </div>
        <div>
            <p class="lead">Materia:</p>
            <input readonly type="text" class="lead" name="materia" value="<?php echo $row['materia']; ?>">
        </div>
        <div>
            <p class="lead">Zona:</p>
            <input readonly type="text" class="lead" name="zona" value="<?php echo $row['Zona']; ?>">
        </div>
        <div>
            <p class="lead">Examen:</p>
            <input readonly type="text" class="lead" name="examen" value="<?php echo $row['Examen']; ?>">
        </div>
        <div>
            <p class="lead">Total:</p>
            <input readonly type="text" class="lead" name="total" value="<?php echo $row['total']; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="23" name="type">
            <button type="button" class="btn btn-danger" id="deleteBtn">Borrar</button>
        </div>
    </form>
    <div id="responseMessage"></div>
</div>

<?php
include_once 'componentes/footer.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Agregar el evento click al botón de eliminar
    document.getElementById('deleteBtn').addEventListener('click', function() {
        // Crear el objeto FormData con los datos del formulario
        var formData = new FormData(document.getElementById('deleteGradeForm'));

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
