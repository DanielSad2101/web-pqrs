<?php
    $idSolicitud = $_POST['idSolicitud'];

    include "../../clases/Solicitudes.php";
    $Solicitudes = new Solicitudes();

    echo $Solicitudes->eliminarSolicitudCliente($idSolicitud);

?>
