<?php
// Incluir la conexión a la base de datos
include_once 'backend/basedeDatos.php';

// Configurar las cabeceras para devolver JSON
header('Content-Type: application/json');

$response = [];

// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar el tipo de acción ('type') enviado desde el formulario
    if ($_POST['type'] == 21) {  // Crear nueva nota
        // Recuperar los valores del formulario
        $codigo_nota = $_POST['id'];
        $codigo_maestro = $_POST['idM'];
        $codigo_alumno = $_POST['idE'];
        $materia = $_POST['materia'];
        $zona = $_POST['zona'];
        $examen = $_POST['examen'];
        $total = $_POST['total'];

        // Consulta SQL para insertar una nueva nota
        $sql = "INSERT INTO asig_course (identifier_ac, id_cm, id_cs, materia, zona, examen, total)
                VALUES ($codigo_nota, '$codigo_maestro', '$codigo_alumno', '$materia', '$zona', '$examen', '$total')";

        // Ejecutar la consulta y devolver el resultado en JSON
        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = "Nota creada con éxito.";
        } else {
            $response['success'] = false;
            $response['message'] = "Error: " . $sql . " " . mysqli_error($conn);
        }

    } else if ($_POST['type'] == 22) {  // Actualizar una nota existente
        // Recuperar los valores del formulario
        $codigo_nota = $_POST['id'];
        $codigo_maestro = $_POST['idM'];
        $codigo_alumno = $_POST['idE'];
        $materia = $_POST['materia'];
        $zona = $_POST['zona'];
        $examen = $_POST['examen'];
        $total = $_POST['total'];

        // Consulta SQL para actualizar la nota
        $sql = "UPDATE asig_course SET 
                materia = '$materia', Zona = '$zona', Examen = '$examen', total = '$total'
                WHERE identifier_ac = $codigo_nota";

        // Ejecutar la consulta y devolver el resultado en JSON
        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = "La nota ha sido actualizada con éxito.";
        } else {
            $response['success'] = false;
            $response['message'] = "Error: " . $sql . " " . mysqli_error($conn);
        }

    } else if ($_POST['type'] == 23) {  // Eliminar una nota existente
        // Recuperar el valor del código de la nota
        $codigo_nota = $_POST['id'];

        // Consulta SQL para eliminar la nota
        $sql = "DELETE FROM asig_course WHERE identifier_ac = $codigo_nota";

        // Ejecutar la consulta y devolver el resultado en JSON
        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = "La nota ha sido borrada con éxito.";
        } else {
            $response['success'] = false;
            $response['message'] = "Error: " . $sql . " " . mysqli_error($conn);
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);

} else {
    // Si no es una solicitud POST, devolver un error
    $response['success'] = false;
    $response['message'] = 'Método no permitido';
}

// Devolver la respuesta como JSON
echo json_encode($response);
?>
