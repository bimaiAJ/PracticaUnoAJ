<?php
include_once 'componentes/header.php';
?>
    <body>

<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn, "SELECT * FROM course");
?>

    <div class="container jumbotron cambio">
        <h2>Listado de Cursos</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>

                <tr>
                    <td>Codigo</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["identifier_c"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><a class="btn btn-success"
                               href="updateC.php?ID=<?php echo $row["identifier_c"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"
                               href="deleteC.php?ID=<?php echo $row["identifier_c"]; ?>">Borrar</a></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>
            <?php
        } else {
            echo "No existen Cursos";
        }
        ?>
    </div>

<?php
include_once 'componentes/footer.php';
?>