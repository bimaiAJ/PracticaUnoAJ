<?php
include_once 'componentes/header.php';
?>
<body>

<?php
include_once 'componentes/navbar.php';
?>

<?php
include_once 'backend/basedeDatos.php';
$result = mysqli_query($conn,"SELECT * FROM course WHERE identifier_c='" . $_GET['ID'] . "'");
$row= mysqli_fetch_array($result);
?>

<div class="container jumbotron cambio">
    <h2>Eliminación de Curso</h2>
    <form method="post" action="processC.php">
        <div>
            <p class="lead">Codigo:</p>
            <input readonly type="text" class="lead" name="id" id="id" value="<?php echo $row['identifier_c']; ?>">
            <span class="lead" id="idMessage"></span>
        </div>
        <div>
            <p class="lead">Nombre: </p>
            <input readonly type="text" class="lead" name="cname" id="cname" value="<?php echo $row['name']; ?>">
        </div>
        <div>
            <p class="lead">Descripcion:</p>
            <input readonly type="text" class="lead" name="description" id="description" value="<?php echo $row['description']; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="9" name="type" id="type">
            <input type="button" class="btn btn-danger" name="submit" id="sendCourseData"  data-toggle="modal" data-target="#messageModal" onclick="sendData()" value="Borrar">
        </div>
    </form>
</div>

<?php
include_once 'componentes/footer.php';
?>