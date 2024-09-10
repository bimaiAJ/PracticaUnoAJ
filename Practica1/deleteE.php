<?php
include_once 'componentes/header.php';
?>
<body>

<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn,"SELECT * FROM student WHERE identifier='" . $_GET['identifier'] . "'");
$row= mysqli_fetch_array($result);
?>

<div class="container jumbotron cambio">
    <h2>Eliminación de Estudiantes</h2>
    <form id="deleteForm"> <!-- Asignamos un ID al formulario para el manejo con Ajax -->
        <div>
            <p class="lead">Carnet:</p>
            <input readonly type="text" class="lead" name="id" value="<?php echo $row['identifier']; ?>">
        </div>
        <div>
            <p class="lead">Primer Nombre: </p>
            <input readonly type="text" class="lead" name="firstName" value="<?php echo $row['first_name']; ?>">
        </div>
        <div>
            <p class="lead">Segundo Nombre: </p>
            <input readonly type="text" class="lead" name="secondName" value="<?php echo $row['second_name']; ?>">
        </div>
        <div>
            <p class="lead">Primer Apellido:</p>
            <input readonly type="text" class="lead" name="lastName" value="<?php echo $row['last_name']; ?>">
        </div>
        <div>
            <p class="lead">Segundo Apellido:</p>
            <input readonly type="text" class="lead" name="seclastName" value="<?php echo $row['sec_last_name']; ?>">
        </div>
        <div>
            <p class="lead">Fecha Nac:</p>
            <input readonly type="text" class="lead" name="birthDate" value="<?php echo $row['birth_date']; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="5" name="type">
            <input type="submit" class="btn btn-danger" name="submit" value="Borrar">
        </div>
    </form>

    <div id="responseMessage" class="mt-3"></div> <!-- Mensaje de respuesta -->
</div>

<?php
include_once 'componentes/footer.php';
?>

<!-- Script de Ajax -->
<script>
document.getElementById('deleteForm').addEventListener('submit', function(event) {
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
            responseDiv.innerHTML = '<div class="alert alert-success">Estudiante eliminado con éxito.</div>';
            setTimeout(() => {
                    window.location.href = 'readE.php'; // Cambiar a la URL de redirección deseada
                }, 2000);
        } else {
            responseDiv.innerHTML = '<div class="alert alert-danger">Error: ' + data.message + '</div>';
        }
    })
    .catch(error => {
        // Manejar errores
        document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger">Error al eliminar el estudiante.</div>';
    });
});
</script>
