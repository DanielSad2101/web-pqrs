<?php
    session_start();


    $usuario = $_POST['usuario'];
    $password = sha1($_POST['password']);
    

    
     include "../../../clases/Usuarios.php";
     $Usuarios = new Usuarios();

     echo $Usuarios->loginUsuario($usuario, $password);

?>