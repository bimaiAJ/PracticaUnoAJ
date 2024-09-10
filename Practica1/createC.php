<?php
include_once 'componentes/header.php';
?>

<?php
include_once 'componentes/navbar.php';
?>

<div class="container jumbotronvcambio">
    <h2>Creación de Cursos</h2>
    <!--<form method="post" action="process.php">-->
    <form>
        <div>
            <p class="lead">Codigo:</p>
            <input type="text" class="lead" name="id" id="id" onkeyup="searchId(this.value)">
            <span class="lead" id="idMessage"></span>
        </div>
        <div>
            <p class="lead">Nombre: </p>
            <input type="text" class="lead" name="cname" id="cname">
        </div>
        <div>
            <p class="lead">Descripcion:</p>
            <input type="text" class="lead" name="description" id="description">
        </div>
        <div class="lead">
            <input type="hidden" value="7" name="type" id="type">
            <input type="button" class="btn btn-primary" id="sendCourseData"  data-toggle="modal" data-target="#messageModal" onclick="sendData()" value="Guardar">
        </div>
    </form>
</div>

<?php
include_once 'componentes/footer.php';
?>