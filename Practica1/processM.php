<?php
include_once 'backend/basedeDatos.php'; // Conexión a la base de datos

// Verificar si se recibió el formulario mediante una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ['success' => false, 'message' => ''];

    if ($_POST['type'] == 2) { // Creación de maestro
        $id = $_POST['id'];
        $first_name = $_POST['firstName'];
        $second_name = isset($_POST['secondName']) ? $_POST['secondName'] : '';
        $last_name = $_POST['lastName'];
        $sec_last_name = isset($_POST['seclastName']) ? $_POST['seclastName'] : '';
        $birth_date = $_POST['birthDate'];

        $sql = "INSERT INTO teacher (identifier, First_Name, Second_Name, Last_Name, Sec_Last_Name, Birth_Date)
                VALUES ($id, '$first_name', '$second_name', '$last_name', '$sec_last_name', '$birth_date')";

        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = 'Nuevo maestro creado con éxito.';
        } else {
            $response['message'] = 'Error al crear maestro: ' . mysqli_error($conn);
        }

    } else if ($_POST['type'] == 4) { // Actualización de maestro
        $id = $_POST['id'];
        $first_name = $_POST['firstName'];
        $second_name = isset($_POST['secondName']) ? $_POST['secondName'] : '';
        $last_name = $_POST['lastName'];
        $sec_last_name = isset($_POST['seclastName']) ? $_POST['seclastName'] : '';
        $birth_date = $_POST['birthDate'];

        $sql = "UPDATE teacher SET 
                First_Name = '$first_name', Second_Name = '$second_name', Last_Name = '$last_name', Sec_Last_Name = '$sec_last_name', Birth_Date = '$birth_date'
                WHERE identifier = $id";

        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = 'Maestro actualizado con éxito.';
        } else {
            $response['message'] = 'Error al actualizar maestro: ' . mysqli_error($conn);
        }

    } else if ($_POST['type'] == 6) { // Eliminación de maestro
        $id = $_POST['id'];

        $sql = "DELETE FROM teacher WHERE identifier = $id";

        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = 'Maestro eliminado con éxito.';
        } else {
            $response['message'] = 'Error al eliminar maestro: ' . mysqli_error($conn);
        }
    }

    // Cerrar la conexión
    mysqli_close($conn);

    // Devolver la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

