<?php    
    session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $contador = 1;
    $sql = "SELECT solicitud.id_solicitud AS idSolicitud, 
    solicitud.id_usuario AS idUsuario, 
    solicitud.id_usuario_admin AS idUsuarioAdmin, 
    CONCAT(persona.paterno, ' ', persona.materno, ' ', persona.nombre) AS nombrePersona, 
    CONCAT(persona_admin.paterno, ' ', persona_admin.materno, ' ', persona_admin.nombre) AS nombrePersonaAdmin,
    solicitud.tipo_solicitud AS solicitud, 
    solicitud.descripcion_pqrs AS descripcion, 
    solicitud.estatus AS estatus, 
    solicitud.solucion_pqrs AS solucion, 
    solicitud.adjunto AS adjunto, 
    solicitud.fecha AS fecha 
FROM t_solicitud AS solicitud 
INNER JOIN t_usuarios AS usuario ON solicitud.id_usuario = usuario.id_usuario 
INNER JOIN t_persona AS persona ON usuario.id_persona = persona.id_persona 
LEFT JOIN t_usuarios AS usuario_admin ON solicitud.id_usuario_admin = usuario_admin.id_usuario
LEFT JOIN t_persona AS persona_admin ON usuario_admin.id_persona = persona_admin.id_persona 
WHERE solicitud.id_usuario = '$idUsuario'
ORDER BY solicitud.fecha DESC";
    $respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
        id="tablaSolicitudClienteDataTable" style="width:100%">
    <thead>
        <th>Numero de Radicacion</th>
        <th>Nombre Residente</th>
        <th>Fecha </th>
        <th>Tipo PQRS</th>
        <th>Descripcion</th>
        <th>Adjunto</th>
        <th>Estatus</th>
        <th>Solucion</th>
        <th>Eliminar</th>
        <th>Nombre Administrador</th>

    </thead>
    <tbody>
    <?php while($mostrar = mysqli_fetch_array($respuesta)){ ?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $mostrar['nombrePersona']?></td>
            <td><?php echo $mostrar['fecha']?></td>
            <td><?php echo $mostrar['solicitud']?></td>
            <td><?php echo $mostrar['descripcion']?></td>
            <td><?php echo $mostrar['adjunto']?></td>
            <td><?php
                    $estatus = $mostrar['estatus'];
                    $cadenaEstatus = '<span class="badge badge-danger">Abierto</span>';
                    if ($estatus == 0) {
                        $cadenaEstatus = '<span class="badge badge-success">Cerrado</span>';
                    }
                    echo $cadenaEstatus;
            ?>
            </td>
            <td><?php echo $mostrar['solucion']?></td>
            <td>
                <?php
                if ($mostrar['solucion'] == "") {
                    
                ?>
                <button class="btn btn-danger btn sm"
                    onclick="eliminarSolicitudCliente(<?php echo $mostrar['idSolicitud'] ?>)">
                    Eliminar</button>
                <?php } ?>
                </td>
            <td><?php echo $mostrar['nombrePersonaAdmin']?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
    <script>
        $(document).ready(function(){
         $('#tablaSolicitudClienteDataTable').DataTable({
            language : {
                url : "../public/datatable/es_es.json"
            },
            dom: 'Bfrtip',
            buttons : {
               buttons : [
                { 
                    extend : 'copy', 
                    className : 'btn btn-outline-info', 
                    text : '<i class="far fa-copy"></i> Copiar'
                 },
                 { 
                    extend : 'csv', 
                    className : 'btn btn-outline-primary', 
                    text : '<i class="fas fa-file-csv"></i> CSV'
                 },
                 { 
                    extend : 'excel', 
                    className : 'btn btn-outline-success', 
                    text : '<i class="fas fa-file-excel"></i> Excel'
                 },
                 { 
                    extend : 'pdf', 
                    className : 'btn btn-outline-danger', 
                    text : '<i class="fas fa-file-pdf"></i> PDF'
                 },
                 
            ],
            dom : {
                button : {
                    className : 'btn'
                }
            }
            }    
        });
        });
            
    </script>
</table>