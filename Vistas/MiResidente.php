<?php
    include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
        $idUsuario = $_SESSION['usuario']['id'];
        include "../clases/Asignacion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
        $sql = "SELECT 
                    persona.id_persona AS idPersona
                FROM
                t_usuarios AS usuario
                        INNER JOIN
                    t_persona AS persona ON usuario.id_persona = persona.id_persona 
                        AND usuario.id_usuario ='$idUsuario'";
        $respuesta = mysqli_query($conexion, $sql);
        $idPersona = mysqli_fetch_array($respuesta)[0];
        $sql = "SELECT 
                    persona.id_persona AS idPersona,
                    CONCAT(persona.paterno,
                            ' ',
                            persona.materno,
                            ' ',
                            persona.nombre) AS nombrePersona,
                    asignacion.id_asignacion AS idAsignacion,
                    asignacion.tipoIdentificacion AS tipoId,
                    asignacion.numeroIdentificaion AS numeroId,
                    asignacion.numeroTorre AS numeroTorre,
                    asignacion.numeroApartamento AS numeroApartamento,
                    asignacion.mascota AS mascota
                FROM
                    t_asignacion AS asignacion
                        INNER JOIN
                    t_persona AS persona ON asignacion.id_persona = persona.id_persona
                WHERE
                    asignacion.id_persona = '$idPersona'";
        $respuesta = mysqli_query($conexion, $sql);                     
    ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="fw-light">Mi Residente</h1>
                <p class="lead"> 
                    <div class="row">
                        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>  
                        <div class="col-sm-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4><?php echo $mostrar['nombrePersona'] ?></h4>
                                    <ul>
                                      <li>Tipo de Identificaion: <?php echo $mostrar['tipoId'] ?></li>
                                      <li>Numero de Identificaion: <?php echo $mostrar['numeroId'] ?></li>
                                      <li>Numero de la Torre: <?php echo $mostrar['numeroTorre'] ?></li>
                                      <li>Numero del Apartamento: <?php echo $mostrar['numeroApartamento'] ?></li>
                                      <li>Mascotas: <?php echo $mostrar['mascota'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>       
                </p>
            </div> 
        </div>
    </div>

    <?php 
        include "footer.php"; 
    } else {
        header("location:../index1.htm");
    }
?>