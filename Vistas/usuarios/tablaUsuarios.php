<?php
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
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
                t_persona AS persona ON usuarios.id_persona = persona.id_persona";
    $respuesta = mysqli_query($conexion, $sql);
?>
<table class="table table-sm dt-responsive nowrap" 
        id="tablaUsuariosDataTable" style="width:100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Sexo</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Rol Usuario</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($mostrar = mysqli_fetch_array($respuesta)){
        ?>
        <tr>
            <td><?php echo $mostrar['nombre']; ?></td>
            <td><?php echo $mostrar['paterno']; ?></td>
            <td><?php echo $mostrar['materno']; ?></td>
            <td><?php echo $mostrar['fechaNacimiento']; ?></td>
            <td><?php echo $mostrar['sexo']; ?></td>
            <td><?php echo $mostrar['telefono']; ?></td>
            <td><?php echo $mostrar['correo']; ?></td>
            <td><?php echo $mostrar['nombreUsuario']; ?></td>
            <td><?php echo $mostrar['rol']; ?></td>
            <td>
                <button class="btn btn-warning btn-sm" 
                        
                        onclick="obtenerDatosUsuario('<?php echo $mostrar['idUsuario'] ?>')">
                        <span class="fas fa-user-edit"></span> Editar
                </button>
            </td>
            <td>
            <button class="btn btn-danger btn-sm" onclick="eliminarUsuario(<?php echo $mostrar['idUsuario'];?>,<?php echo $mostrar['idPersona'];?>)">
            <span class="fas fa-user-times"></span> Eliminar
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
        $('#tablaUsuariosDataTable').DataTable({
            language : {
                url : "../public/datatable/es_es.json"
            }
        });
    })
</script>