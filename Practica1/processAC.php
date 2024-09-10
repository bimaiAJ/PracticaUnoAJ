<?php
include_once 'backend/basedeDatos.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['type'] == 10) {
        // Crear asignación
        $idA = $_POST['idA'];
        $curso = $_POST['curso'];
        $idteacher = $_POST['idteacher'];

        $sql = "INSERT INTO course_m (id_cm, id_cour, id_teach) VALUES ('$idA', '$curso', '$idteacher')";
        
        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = 'Curso asignado al maestro correctamente.';
        } else {
            $response['message'] = 'Error: ' . mysqli_error($conn);
        }

    } else if ($_POST['type'] == 16) {
        // Actualizar asignación
        $idA = $_POST['idA'];
        $curso = $_POST['curso'];
        $idteacher = $_POST['idteacher'];

        $sql = "UPDATE course_m SET id_cour = '$curso', id_teach = '$idteacher' WHERE id_cm = '$idA'";
        
        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = 'El curso asignado al maestro se ha actualizado.';
        } else {
            $response['message'] = 'Error: ' . mysqli_error($conn);
        }

    } else if ($_POST['type'] == 17) {
        // Eliminar asignación
        $idA = $_POST['idA'];

        $sql = "DELETE FROM course_m WHERE id_cm = '$idA'";
        
        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = 'El curso asignado al maestro se ha borrado.';
        } else {
            $response['message'] = 'Error: ' . mysqli_error($conn);
        }
    }

    // Cerrar la conexión
    mysqli_close($conn);

    // Devolver la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
