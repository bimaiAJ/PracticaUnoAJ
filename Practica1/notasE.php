<?php
include_once('componentes/header.php');
?>

<?php
include_once('componentes/navbar.php');
?>

<div class="container">
        <div class="row py-5">
            <div class="col-12 col-md-8 offset-lg-2">
                <h2 class="text-center fw-light pb-3 text-capitalize text-dark">
                    Agregar o Editar a <span class="fw-bold text-dark"> Las Notas</span>
                </h2>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-12 col-md-4 mb-3">
                <div class="card border-3 border-light bg-warning">
                    <div class="card-body card-info text-center">
                        <span class="fa-stack mb-4">
                            <i class="fa fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-user fa-stack-1x text-white"></i>
                        </span>
                        <h5 class="fw-bold">Colocar Notas</h5>
                        <p class="text-muted pt-3 ">
                            Colocar las notas a los estudiantes 
                        </p>
                        <form action="colocarNotas.php" method="get">
                          <button type="submit" class="btn btn-danger text-decoration-none">
                             Colocar <i class="fas fa-arrow-right"></i>
                             </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="card border-3 border-light bg-warning">
                    <div class="card-body text-center">
                        <span class="fa-stack mb-4">
                            <i class="fa fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-user fa-3x text-primary"></i>
                        </span>
                        <h5 class="fw-bold">Editar las notas</h5>
                        <p class="text-muted pt-3">
                            Puedes Modificar o Eliminar las notas registradas.
                        </p>
                        <form action="editarNotas.php" method="get">
                          <button type="submit" class="btn btn-danger text-decoration-none">
                             Editar <i class="fas fa-arrow-right"></i>
                             </button>
                        </form>
                    </div>
                </div>
            </div>

<?php
include_once('componentes/footer.php');
?>