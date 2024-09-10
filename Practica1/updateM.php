<?php
include_once 'componentes/header.php';
?>

<body>
<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn,"SELECT * FROM teacher WHERE identifier='" . $_GET['identifier'] . "'");
$row = mysqli_fetch_array($result);
?>

<div class="container jumbotron cambio">
    <h2>Actualización Maestro</h2>
    <form id="updateTeacherForm"> <!-- Asignamos un ID al formulario para el manejo con Ajax -->
        <div>
            <p class="lead">Carnet:</p>
            <input readonly type="text" class="lead" name="id" value="<?php echo $row['identifier']; ?>">
        </div>
        <div>
            <p class="lead">Primer Nombre: </p>
            <input type="text" class="lead" name="firstName" value="<?php echo $row['first_name']; ?>">
        </div>
        <div>
            <p class="lead">Segundo Nombre: </p>
            <input type="text" class="lead" name="secondName" value="<?php echo $row['second_name']; ?>">
        </div>
        <div>
            <p class="lead">Primer Apellido:</p>
            <input type="text" class="lead" name="lastName" value="<?php echo $row['last_name']; ?>">
        </div>
        <div>
            <p class="lead">Segundo Apellido:</p>
            <input type="text" class="lead" name="seclastName" value="<?php echo $row['sec_last_name']; ?>">
        </div>
        <div>
            <p class="lead">Fecha Nac:</p>
            <input type="date" class="lead" name="birthDate" value="<?php echo $row['birth_date']; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="4" name="type"> <!-- Tipo de operación para identificar actualización -->
            <input type="submit" class="btn btn-success" name="submit" value="Actualizar">
        </div>
    </form>

    <div id="responseMessage" class="mt-3"></div> <!-- Mensaje de respuesta -->
</div>

<?php
include_once 'componentes/footer.php';
?>

<!-- Script de Ajax -->
<script>
document.getElementById('updateTeacherForm').addEventListener('submit', function(event) {
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
            responseDiv.innerHTML = '<div class="alert alert-success">Maestro actualizado con éxito.</div>';
            setTimeout(() => {
                    window.location.href = 'readM.php'; // Cambiar a la URL de redirección deseada
                }, 2000);
        } else {
            responseDiv.innerHTML = '<div class="alert alert-danger">Error: ' + data.message + '</div>';
        }
    })
    .catch(error => {
        // Manejar errores
        document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger">Error al actualizar el maestro.</div>';
    });
});
</script>
