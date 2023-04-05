<?php $conexion = mysqli_connect("localhost:3307", "root", "", "helpdesk");
?>

<form id="frmNuevaSolicitud" method="POST" onsubmit="return agregarNuevaSolicitud()">
<div class="modal fade" id="modalCrearSolicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Mis Residentes</label>

        <?php
             if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
             
             if (isset($_SESSION['usuario'])) {
                $idUsuario = $_SESSION['usuario']['id'];
            $sql = "SELECT 
                        asignacion.id_asignacion as idAsignacion,
                        CONCAT(persona.paterno,
                            ' ',
                            persona.materno,
                            ' ',
                            persona.nombre) as nombre
                    FROM
                        t_asignacion AS asignacion
                            INNER JOIN
                        t_persona AS persona ON asignacion.id_persona = persona.id_persona
                    WHERE
                        asignacion.id_persona = (SELECT 
                                                    id_persona
                                                FROM
                                                    t_usuarios
                                                WHERE
                                                    id_usuario = $idUsuario)"; 
            $respuesta = mysqli_query($conexion, $sql);
        } 
?>

        <select name="idPersona" id="idPersona" class="form-control" required>
            <option value="">seleciona un residente
                <label for=""></label>
            </option><?php while($mostrar = mysqli_fetch_array($respuesta)) { ?>
                    <option value="<?php echo $mostrar['idAsignacion'];?>"> <?php echo $mostrar['nombre']; ?> </option>
                <?php } ?>
        </select>
        <label for="tipoSolicitud">Tipo Solicitud</label>
                  <select class="form-control" id="tipoSolicitud" name="tipoSolicitud" >
                       <option value="">PQRS</option>
                       <option value="Problema">Problema</option>
                       <option value="Queja">Queja</option>
                       <option value="Reclamo">Reclamo</option>
                       <option value="Solicitud">Solicitud</option>
                  </select>
        <label for="PQRS">Descripcion PQRS</label>
        <textarea name="PQRS" id="PQRS" class="form-control" required></textarea>
        <label for="adjuntar">Adjuntar documentos</label>
        <div class="input-group">
        <div class="custom-file">  
		<input class="custom-file-input" type="file" id="adjunto" name="adjunto" class="form-control">
        <label class="custom-file-label" for="adjunto">Adjuntar documentos</label>
        </div>  
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" >Enviar Solicitud</button>
      </div>
    </div>
  </div>
</div>
</form>
