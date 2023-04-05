<?php 
    class Conexion {
        public function conectar() {
            $servidor = "localhost:3307";
            $usuario = "root";
            $password = "";
            $db = "helpdesk";
            $conexion = mysqli_connect($servidor, $usuario, $password, $db);
            return $conexion;
        }
    }



