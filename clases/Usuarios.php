<?php 

    include "Conexion.php";
     class Usuarios extends Conexion {
         public function loginUsuario($usuario, $password) {
              $conexion = Conexion::conectar();
              $sql = "SELECT * FROM t_usuarios 
                      WHERE usuario = '$usuario' AND password = '$password'";
              $respuesta = mysqli_query($conexion, $sql);
              
              if (mysqli_num_rows($respuesta) > 0) {
                $datosUsuario = mysqli_fetch_array($respuesta);
                $_SESSION['usuario']['nombre'] = $datosUsuario['usuario'];
                $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
                $_SESSION['usuario']['rol'] = $datosUsuario['id_rol'];
                return 1;
            } else {
                return 0;
            }  
        }
        
          
            
            
        public function agregarNuevoUsuario($datos){

            $idPersona = self::agregarPersona($datos);
            $conexion = Conexion::conectar();
        
            if ($idPersona > 0){
                $sql = "INSERT INTO t_usuarios (id_rol,
                                                id_persona,
                                                usuario,
                                                password) 
                        VALUES (?, ?, ?, ?) ";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("iiss",  $datos['idRol'],
                                                $idPersona,
                                                 $datos['usuario'],
                                                 $datos['password']    
                                             );
                $respuesta = $stmt->execute();  
                return  $respuesta;                
                 
            }else {
                return 0;
            }
        
        }
        
        public function agregarPersona($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_persona (paterno,
                                            materno,
                                            nombre,
                                            fecha_Nacimiento,
                                            sexo,
                                            telefono,
                                            correo) 
                     VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssssss",  $datos['paterno'],
                                            $datos['materno'],
                                            $datos['nombre'],
                                            $datos['fechaNacimiento'],
                                            $datos['sexo'],
                                            $datos['telefono'],
                                            $datos['correo']
                                         );
            $respuesta = $stmt->execute();
            $idPersona = mysqli_insert_id($conexion);
            $stmt->close();
            return $idPersona;  
        }

        public function obtenerDatosUsuario($idUsuario) {
            $conexion = Conexion::conectar();

            $sql = "SELECT 
                    usuarios.id_usuario AS idUsuario,
                    usuarios.usuario AS nombreUsuario,
                    roles.nombre AS rol,
                    usuarios.id_rol AS idRol,
                    usuarios.id_persona AS idPersona,
                    persona.nombre AS nombre,
                    persona.paterno AS paterno,
                    persona.materno AS materno,
                    persona.fecha_nacimiento AS fechaNacimiento,
                    persona.sexo AS sexo,
                    persona.correo AS correo,
                    persona.telefono AS telefono
                FROM
                    t_usuarios AS usuarios
                        INNER JOIN
                    t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                        INNER JOIN
                    t_persona AS persona ON usuarios.id_persona = persona.id_persona and usuarios.id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($respuesta);

            $datos = array('idUsuario' => $usuario['idUsuario'],
                            'nombreUsuario' => $usuario['nombreUsuario'],
                            'rol' => $usuario['rol'],
                            'idRol' => $usuario['idRol'],
                            'idPersona' => $usuario['idPersona'],
                            'nombre' => $usuario['nombre'],
                            'paterno' => $usuario['paterno'],
                            'materno' => $usuario['materno'],
                            'fechaNacimiento' => $usuario['fechaNacimiento'],
                            'sexo' => $usuario['sexo'],
                            'correo' => $usuario['correo'],
                            'telefono' => $usuario['telefono']
        );
        return $datos; 
        }
        
        public function buscarSolicitudesUsuario($idUsuario) {
            $conexion = Conexion::conectar();
    
            $sql = "SELECT * FROM t_solicitud WHERE id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                return 1;
            } else {
                return 0;
            }
        }
        
        public function buscarAsignacionesPersona($idPersona) {
            $conexion = Conexion::conectar();
    
            $sql = "SELECT * FROM t_asignacion WHERE id_persona = '$idPersona'";
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                return 1;
            } else {
                return 0;
            }
        }
        
        public function eliminarUsuario($datos) {
        $conexion = Conexion::conectar();

        $solicitudes = self::buscarSolicitudesUsuario($datos['idUsuario']);
        $asignaciones = self::buscarAsignacionesPersona($datos['idPersona']);

        if ($solicitudes == 0 && $asignaciones == 0) {
            //eliminar usuario
            $sql = "DELETE FROM t_usuarios WHERE id_usuario = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('i', $datos['idUsuario']);
            $respuesta = $stmt->execute(); 
            $stmt->close();  
            return $respuesta; 
        } else {
            return 0;
        }
    }
}