<?php
    include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION ['usuario']['rol'] == 2) {
      include "../clases/Conexion.php";
      $con = new Conexion();
      $Conexion = $con->conectar();  
    ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Asignacion de Residente</h1>
      <p class="lead"> 
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarResidente">
            <span class="fas fa-address-book"></span> Asiganar residente
            </button>
            
            <hr>
            <div id="tablaAsignacionesload"></div>  
    </p>
    </div>  
  </div>
</div>

<?php 
    include "asignacion/modalAsignar.php";
    include "asignacion/modalEjemplo.php";

    include "footer.php"; 
    ?>
     <script src="../public/js/asignacion/asignacion.js"></script>
<?php
    } else {
        header("location:../index1.htm");
     }
?>