<?php
include_once 'componentes/header.php';
?>
    <body>

<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn, "SELECT * FROM asig_course ");
?>

    <div class="container jumbotron cambio">
        <h2>Listado de Estudiantes</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>

                <tr>
                    <td>Co. Nota</td>
                    <td>Co. Maestro</td>
                    <td>Co. estudiante </td>
                    <td>Curso</td>
                    <td>zona</td>
                    <td>examen</td>
                    <td>total</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["identifier_ac"]; ?></td>
                        <td><?php echo $row["id_cm"]; ?></td>
                        <td><?php echo $row["id_cs"]; ?></td>
                        <td><?php echo $row["materia"]; ?></td>
                        <td><?php echo $row["Zona"]; ?></td>
                        <td><?php echo $row["Examen"]; ?></td>
                        <td><?php echo $row["total"]; ?></td>

                        <td>
                            <a class="btn btn-success" href="updateN.php?identifier=<?php echo $row["identifier_ac"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"  href="deleteN.php?identifier=<?php echo $row["identifier_ac"]; ?>">Borrar</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>
            <?php
        } else {
            echo "No hay resultados";
        }
        ?>
    </div>

<?php
include_once 'componentes/footer2.php';
?>