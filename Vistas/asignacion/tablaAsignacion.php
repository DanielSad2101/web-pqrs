<?php    
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT 
             persona.id_persona as idPersona,
            concat(persona.paterno, ' ', persona.materno, ' ', persona.nombre) as nombrePersona,
            asignacion.id_asignacion as idAsignacion,
            asignacion.tipoIdentificacion as tipoId,
            asignacion.numeroIdentificaion as numeroId,
            asignacion.numeroTorre as numeroTorre,
            asignacion.numeroApartamento as numeroApartamento,
            asignacion.mascota as mascota
        FROM
            t_asignacion AS asignacion
                INNER JOIN
            t_persona AS persona ON asignacion.id_persona = persona.id_persona";
    $respuesta = mysqli_query($conexion, $sql);
?>
<table class="table table-sm dt-responsive nowrap" 
        id="tablaAsignacionesDataTable" style="width:100%"  >
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo Identificaion</th>
            <th>Numero Identificaion</th>
            <th>Numero Torre</th>
            <th>Numero del Apartamento</th>
            <th>Mascota</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($mostrar = mysqli_fetch_array($respuesta)){
        ?>
        <tr>
            <td><?php echo $mostrar['nombrePersona']; ?></td>
            <td><?php echo $mostrar['tipoId']; ?></td>
            <td><?php echo $mostrar['numeroId']; ?></td>
            <td><?php echo $mostrar['numeroTorre']; ?></td>
            <td><?php echo $mostrar['numeroApartamento']; ?></td>
            <td><?php echo $mostrar['mascota']; ?></td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="eliminarAsignacion(<?php echo $mostrar['idAsignacion']?>)">
                <span class="fas fa-user-minus"></span> Eliminar
                </button>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>    

    <script>
    $(document).ready(function(){
        $('#tablaAsignacionesDataTable').DataTable({
            language : {
                url : "../public/datatable/es_es.json"
            }
        });
    });
</script>
