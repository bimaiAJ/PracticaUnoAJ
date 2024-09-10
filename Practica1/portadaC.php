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
                    Agregar o Editar <span class="fw-bold text-dark"> Los Cursos</span>
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
                        <h5 class="fw-bold">Registrar cursos</h5>
                        <p class="text-muted pt-3 ">
                            aqui puedes crear los cursos. 
                        </p>
                        <form action="createC.php" method="get">
                          <button type="submit" class="btn btn-danger text-decoration-none">
                             Crear <i class="fas fa-arrow-right"></i>
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
                        <h5 class="fw-bold">Editar los cursos</h5>
                        <p class="text-muted pt-3">
                            Puedes Modificar o eliminar los cursos registrados.
                        </p>
                        <form action="readC.php" method="get">
                          <button type="submit" class="btn btn-danger text-decoration-none">
                             Editar <i class="fas fa-arrow-right"></i>
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
                        <h5 class="fw-bold">Asignar cursos a maestro</h5>
                        <p class="text-muted pt-3">
                            Aqui puedes asignar los cursos registrados a los maestros.
                        </p>
                        <form action="createAC.php" method="get">
                          <button type="submit" class="btn btn-danger text-decoration-none">
                             Asignar Curso <i class="fas fa-arrow-right"></i>
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
                        <h5 class="fw-bold">Asignar cursos a estudiantes</h5>
                        <p class="text-muted pt-3">
                            Aqui puedes asignar los cursos registrados a los estudiantes.
                        </p>
                        <form action="createACE.php" method="get">
                          <button type="submit" class="btn btn-danger text-decoration-none">
                             Asignar Curso <i class="fas fa-arrow-right"></i>
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
                        <h5 class="fw-bold">Ver a estudiantes con sus cursos</h5>
                        <p class="text-muted pt-3">
                            Aqui puedes ver los cursos asignados a los estudiantes.
                        </p>
                        <form action="CursosAE.php" method="get">
                          <button type="submit" class="btn btn-danger text-decoration-none">
                             ver cursos asignados <i class="fas fa-arrow-right"></i>
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
                        <h5 class="fw-bold">Ver maestros con sus cursos</h5>
                        <p class="text-muted pt-3">
                            Aqui puedes ver los cursos asignados a los maestros.
                        </p>
                        <form action="CursosAM.php" method="get">
                          <button type="submit" class="btn btn-danger text-decoration-none">
                             Ver cursos asignados <i class="fas fa-arrow-right"></i>
                             </button>
                        </form>
                    </div>
                </div>
            </div>



<?php
include_once('componentes/footer.php');
?>