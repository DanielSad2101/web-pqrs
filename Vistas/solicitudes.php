<?php
    include "header.php"; 
    if (isset($_SESSION['usuario']) && 
    $_SESSION ['usuario']['rol'] == 2) {
      include "../clases/Conexion.php";
      $con = new Conexion();
      $Conexion = $con->conectar();
    ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Bandeja de solicitudes</h1>
      <p class="lead"> </p>
        <div id="TablaSolicitudAdminLoad"></div>
    </div> 
  </div>
</div>
<?php 
    include "solicitudAmin/modalAgregarSolucion.php";
    include "footer.php"; 
?>
    <script src="../public/js/solicitudAdmin/solicitudAdmin.js"></script>
<?php
    } else {
        header("location:../index1.htm");
     }
?>