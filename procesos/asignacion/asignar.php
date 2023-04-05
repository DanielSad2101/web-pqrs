<?php
$datos = array(
    'idPersona' => $_POST['idPersona'],
    'tipoIdentificacion' => $_POST['tipoIdentificacion'],
    'numeroIdentificaion' => $_POST['numeroIdentificaion'] ,
    'numeroTorre' => $_POST['numeroTorre'],
    'numeroApartamento' => $_POST['numeroApartamento'],
    'mascota' => $_POST['mascota']
);

include "../../clases/Asignacion.php";
$Asignacion = new Asignacion();
echo $Asignacion->asignarResidente($datos);
?>