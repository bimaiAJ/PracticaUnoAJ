<?php
include_once 'componentes/header.php';
?>
<body>

<?php
include_once 'componentes/navbar.php';
?>



<?php
include_once 'componentes/header.php';
?>
    <body>

<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn, "SELECT * FROM course_s");
?>

    <div class="container jumbotron cambio">
        <h2>Listado de Cursos Asignados de Estudiantes</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>

                <tr>
                    <td>Codigo Asignacion</td>
                    <td>Codigo curso</td>
                    <td>codigo Estudiante</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["id_cs"]; ?></td>
                        <td><?php echo $row["id_cour"]; ?></td>
                        <td><?php echo $row["id_stud"]; ?></td>
                        <td><a class="btn btn-success"
                               href="UpdateACE.php?ID=<?php echo $row["id_cs"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"
                               href="deleteACE.php?ID=<?php echo $row["id_cs"]; ?>">Borrar</a></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>
            <?php
        } else {
            echo "No existen Cursos Asignados a estudiantes";
        }
        ?>
    </div>

<?php
include_once 'componentes/footer.php';
?>















<?php
include_once 'componentes/footer.php';
?>