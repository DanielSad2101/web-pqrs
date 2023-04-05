<?php 

   session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">

    <link rel="stylesheet" href="../public/datatable/buttons.dataTables.min.css">
    
    <title>PQRS</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">
    <a class="navbar-brand" href="inicio.php">
      <img src="../public/img/logo (4).ico" class="rounded float-right" width="30%">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">

          <a class="nav-link" href="inicio.php">
          <span class="fas fa-building"></span> Inicio</a>
        </li>
    <?php if ($_SESSION['usuario']['rol'] == 1) { ?>    
        <li class="nav-item">
          <a class="nav-link" href="MiResidente.php">
          <span class="fas fa-id-badge"></span> Residente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="MisSolicitudes.php">
          <span class="fas fa-file-import"></span> Realizar solicitud</a>
        </li>
    <?php } else if($_SESSION['usuario']['rol'] == 2) { ?>    
        <!--vistas administrador-->
        <li class="nav-item">
          <a class="nav-link" href="usuarios.php">
          <span class="fas fa-users-cog"></span> usuarios</a>
        <li class="nav-item">
          <a class="nav-link" href="asignaciones.php">
          <span class="fas fa-house-user"></span> Asignacion de residente</a>
        <li class="nav-item">
          <a class="nav-link" href="solicitudes.php">
        <span class="fas fa-file-invoice"></span> solicitudes</a>
        </li>
    <?php } ?>    
      <li class="nav-item dropdown">
        <a style ="color:#56baed" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fas fa-user-circle"></sapn> Usuario: <?php echo $_SESSION['usuario']['nombre']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" 
          data-toggle="modal" 
          data-target="#modalActualizarDatosPersonales"
          onclick="ObtenerdatosPersonalesInicio('<?php echo $_SESSION['usuario']['id']; ?>')">
          <span class="fas fa-user-edit"></span> Editar Datos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
          <span class="fas fa-sign-out-alt"></span> Salir</a>
         
        </div>
      </li>

       

      </ul>
    </div>
  </div>
</nav>

<?php 
include "inicio/modalActualizarDatosPersonales.php";
?>