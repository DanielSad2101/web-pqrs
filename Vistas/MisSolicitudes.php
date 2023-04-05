<?php
    include "header.php"; 
    if (isset($_SESSION['usuario']) && 
    $_SESSION['usuario']['rol'] == 1) {
      include "../clases/Conexion.php";
      $con = new Conexion();
      $Conexion = $con->conectar();
    ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Solicitud Residente</h1>
      <p class="lead">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearSolicitud">
          <span class="fas fa-file-export"></span> Realizar Solicitud</button>
        <hr>
        <div id="TablaSolicitudClienteLoad"></div> 
        </p>
      
  </div>
</div>

<?php 
    include "solicitudCliente/modalCrearSolicitud.php";
    include "footer.php"; 
    ?>
    <script src="../public/js/solicitudCliente/solicitudCliente.js"></script>
    <?php

    } else {
        header("location:../index1.htm");
     }
?>