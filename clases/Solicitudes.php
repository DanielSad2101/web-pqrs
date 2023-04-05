<?php
    include "Conexion.php";

    class Solicitudes extends Conexion {
    public function agregarSolicitudCliente($datos) {
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO t_solicitud (id_usuario,
                                                tipo_Solicitud, 
                                                descripcion_pqrs, 
                                                adjunto)
                         VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('isss', $datos['idUsuario'], 
                                            $datos['tipoSolicitud'],
                                            $datos['PQRS'],
                                            $datos['adjunto']);
                $respuesta = $stmt->execute(); 
                $stmt->close();  
return $respuesta;
    }
    public function eliminarSolicitudCliente($idSolicitud){
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM t_solicitud WHERE id_solicitud = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('i', $idSolicitud); 
        $respuesta = $stmt->execute(); 
        $stmt->close();  
        
        return $respuesta;
    }

    public function obtenerDatosSolucion($idSolicitud) {
        $conexion = Conexion::conectar();
        $sql = "SELECT solucion_pqrs, estatus  
                FROM t_solicitud 
                WHERE id_solicitud = '$idSolicitud' ";
        $respuesta = mysqli_query($conexion, $sql);
    
        if ($respuesta) {
            $row = mysqli_fetch_array($respuesta);
            if (isset($row['solucion_pqrs'])) {
                $solucion = $row['solucion_pqrs'];
            } else {
                $solucion = null;
            }
            
            if (isset($row['estatus'])) {
                $estatus = $row['estatus'];
            } else {
                $estatus = null;
            }
        } else {
            $solucion = null;
            $estatus = null;
        }
    
        $datos = array (
            "idSolicitud" => $idSolicitud,
            "solucion" => $solucion,
            "estatus" => $estatus
        );
    
        return $datos;
    }

    public function actualizarSolucionSolicitud($datos) {
        $conexion = Conexion::conectar();
        $sql = "UPDATE t_solicitud
                SET id_usuario_admin = ?,
                    solucion_pqrs = ?,
                    estatus = ?
                WHERE id_solicitud = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('isii', $datos['idUsuario'],
                                    $datos['solucion'],
                                    $datos['estatus'],
                                    $datos['idSolicitud']);
        $respuesta = $stmt->execute(); 
                $stmt->close();  
        return $respuesta;
    }
}
?>