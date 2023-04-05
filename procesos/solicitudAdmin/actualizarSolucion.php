<?php
session_start();
$idSolicitud = $_POST['idSolicitud'];
$solucion = $_POST['solucion'];
$estatus = $_POST['estatus'];
$idUsuario = $_SESSION['usuario']['id'];

$datos = array(
    'idSolicitud' => $idSolicitud,
    'solucion' => $solucion,
    'estatus' => $estatus,
    'idUsuario' => $idUsuario
);

include "../../clases/Solicitudes.php";
$Solicitudes = new Solicitudes();
echo $Solicitudes->actualizarSolucionSolicitud($datos);
?>