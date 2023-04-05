
<?php
    include "Conexion.php";

    class Asignacion extends Conexion {
        public function asignarResidente($datos) {
             $conexion = Conexion::conectar();

             $sql = "INSERT INTO t_asignacion (id_persona, 
                                                tipoIdentificacion, 
                                                numeroIdentificaion, 
                                                numeroTorre, 
                                                numeroApartamento, 
                                                mascota)
                         VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param('isssss', $datos['idPersona'], 
                                            $datos['tipoIdentificacion'], 
                                            $datos['numeroIdentificaion'], 
                                            $datos['numeroTorre'], 
                                            $datos['numeroApartamento'], 
                                            $datos['mascota']);
                $respuesta = $stmt->execute(); 
                $stmt->close();  
            return $respuesta;
        }
        public function eliminarAsignacion($idAsignacion){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_asignacion WHERE id_asignacion = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('i', $idAsignacion); 
            $respuesta = $stmt->execute(); 
            $stmt->close();  
            return $respuesta;
        }
    }  
       
?>