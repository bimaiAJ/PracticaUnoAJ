<?php
include_once 'componentes/header.php';
?>
    <body>

<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn, "SELECT * FROM student");
?>

    <div class="container jumbotron cambio">
        <h2>Listado de Estudiantes</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>

                <tr>
                    <td>Carnet</td>
                    <td>Primer Nombre</td>
                    <td>Segundo Nombre</td>
                    <td>Primer Apellido</td>
                    <td>Segundo Apellido</td>
                    <td>Fecha_Nac</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["identifier"]; ?></td>
                        <td><?php echo $row["first_name"]; ?></td>
                        <td><?php echo $row["second_name"]; ?></td>
                        <td><?php echo $row["last_name"]; ?></td>
                        <td><?php echo $row["sec_last_name"];?></td>
                        <td><?php echo $row["birth_date"]; ?></td>
                        <td>
                            <a class="btn btn-success" href="updateE.php?identifier=<?php echo $row["identifier"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"  href="deleteE.php?identifier=<?php echo $row["identifier"]; ?>">Borrar</a>
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