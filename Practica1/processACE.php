<?php
include_once 'backend/basedeDatos.php';

$response = array('success' => false, 'message' => 'Error desconocido');

// Verifica si se ha enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se ha enviado el campo 'type' para determinar la acción
    if (isset($_POST['type'])) {
        $type = intval($_POST['type']);

        // Variables de entrada
        $idAE = mysqli_real_escape_string($conn, $_POST['idAE']);
        $cursoA = mysqli_real_escape_string($conn, $_POST['cursoA']);
        $idstudent = mysqli_real_escape_string($conn, $_POST['idstudent']);

        if ($type == 18) {
            // Insertar un nuevo registro
            $sql = "INSERT INTO course_s (id_cs, id_cour, id_stud) VALUES ('$idAE', '$cursoA', '$idstudent')";
            if (mysqli_query($conn, $sql)) {
                $response = array('success' => true, 'message' => 'Curso asignado al Alumno correctamente');
            } else {
                $response = array('success' => false, 'message' => 'Verifica si los datos ya están registrados por favor');
            }
        } elseif ($type == 19) {
            // Actualizar un registro existente
            $sql = "UPDATE course_s SET id_cour = '$cursoA', id_stud = '$idstudent' WHERE id_cs = '$idAE'";
            if (mysqli_query($conn, $sql)) {
                $response = array('success' => true, 'message' => 'El Curso asignado al Estudiante se ha Actualizado');
            } else {
                $response = array('success' => false, 'message' => 'Verifica si los datos están registrados por favor');
            }
        } elseif ($type == 20) {
            // Borrar un registro existente
            $sql = "DELETE FROM course_s WHERE id_cs = '$idAE'";
            if (mysqli_query($conn, $sql)) {
                $response = array('success' => true, 'message' => 'El Curso Asignado al Estudiante se ha borrado');
            } else {
                $response = array('success' => false, 'message' => 'Error: verifica si los datos ya están registrados por favor');
            }
        }
    }
    mysqli_close($conn);
}

// Devuelve la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
