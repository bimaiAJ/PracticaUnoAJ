<?php
include_once 'componentes/header.php';
?>
    <body>

<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn, "SELECT * FROM course_m");
?>

    <div class="container jumbotron cambio">
        <h2>Listado de Cursos Asignados de Maestros</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>

                <tr>
                    <td>Codigo Asignacion</td>
                    <td>Codigo curso</td>
                    <td>codigo Maestro</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["id_cm"]; ?></td>
                        <td><?php echo $row["id_cour"]; ?></td>
                        <td><?php echo $row["id_teach"]; ?></td>
                        <td><a class="btn btn-success"
                               href="UpdateAC.php?ID=<?php echo $row["id_cm"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"
                               href="deleteAC.php?ID=<?php echo $row["id_cm"]; ?>">Borrar</a></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>
            <?php
        } else {
            echo "No existen Cursos Asignados Maestros";
        }
        ?>
    </div>

<?php
include_once 'componentes/footer.php';
?>