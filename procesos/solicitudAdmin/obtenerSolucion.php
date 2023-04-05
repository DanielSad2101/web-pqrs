<?php 
$idSolicitud = $_POST['idSolicitud'];
   
    

include "../../clases/Solicitudes.php";
$Solicitudes = new Solicitudes();
    echo json_encode($Solicitudes->obtenerDatosSolucion($idSolicitud));
?>