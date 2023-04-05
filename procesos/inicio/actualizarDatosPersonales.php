<?php 
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];

    include "../../clases/Inicio.php";

    $datos = array(
        'paterno' => $_POST['paternoInicio'],
        'materno' => $_POST['maternoInicio'],
        'nombre' => $_POST['nombreInicio'],
        'telefon' => $_POST['telefonoInicio'],
        'correo' => $_POST['correoInicio'],
        'fecha' => $_POST['fechaInicio'],
        'idUsuario' => $idUsuario
    );

    $Inicio = new Inicio;
    echo $Inicio->actualizarDatosPersonales($datos);
?>

