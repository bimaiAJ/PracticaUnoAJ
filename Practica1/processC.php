<?php
include_once 'backend/basedeDatos.php';

// Read POST data
$data = json_decode(file_get_contents("php://input"));
if (isset($data)) {

    $id = $data->id;
    $cname = $data->cname;
    $description = $data->description;
    $type = $data->type;

    if ($type == 7) {

        $sql = "INSERT INTO course (identifier_c, name, description)
	 VALUES ($id, '$cname', '$description')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("success"=>true, "message"=>"Curso creado con éxito."));
        } else {
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_error($conn)));
        }
        mysqli_close($conn);
    } else if ($type == 8) {

        $sql = "UPDATE course SET 
                description = '$description',name = '$cname'
                WHERE identifier_c = $id";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("success"=>true, "message"=>"Curso actualizado con éxito."));
        } else {
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_error($conn)));
        }
        mysqli_close($conn);
    } else if ($type == 9) {

        $sql = "DELETE FROM course 
                WHERE identifier_c = $id";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("success"=>true, "message"=>"Curso borrado con éxito."));
        } else {
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_error($conn)));
        }
        mysqli_close($conn);
    }
}
?>

