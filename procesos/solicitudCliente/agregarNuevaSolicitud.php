<?php
    session_start();
$idUsuario = $_SESSION['usuario']['id'];
$adjunto = isset($_POST['adjunto']) ? $_POST['adjunto'] : '';
$datos = array(
    'idUsuario' => $idUsuario,
    'tipoSolicitud' => $_POST['tipoSolicitud'],
    'PQRS' => $_POST['PQRS'],
    'adjunto' => $adjunto
);
   

    include "../../clases/Solicitudes.php";

    $Solicitudes = new Solicitudes();

    echo $Solicitudes->agregarSolicitudCliente($datos);

?>