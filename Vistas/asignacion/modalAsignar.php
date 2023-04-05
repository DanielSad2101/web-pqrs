<?php $conexion = mysqli_connect("localhost:3307", "root", "", "helpdesk");
?>
<form id="frmAgsignarResidente" method="POST" onsubmit="return asignarResidente()">

<!-- Modal -->
<div class="modal fade" id="modalAsignarResidente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-sm-12">
              <label>Selecionar Usuario</label>  

                <?php 
                   $sql = "SELECT 
                                persona.id_persona,
                                CONCAT (persona.paterno,
                                 ' ',
                                persona.materno,
                                 ' ',
                                persona.nombre) As nombre
                                FROM
                                t_persona AS persona
                                        INNER JOIN
                                t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                                AND usuario.id_rol = 1
                                ORDER BY persona.paterno";
                    $respuesta = mysqli_query($conexion, $sql);            
                            
                ?>

              <select name="idPersona" id="idPersona" class="form-control" require>
               <option value="">selecciones usuario</option> 
               <?php while($mostrar = mysqli_fetch_array($respuesta)) { ?>
                    <option value="<?php echo $mostrar['id_persona'];?>"> <?php echo $mostrar['nombre']; ?> </option>
                <?php } ?>
              </select> 
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
              <label for="tipoIdentificacion">Tipo Identificaion</label>  
              <select name="tipoIdentificacion" id="tipoIdentificacion" class="form-control" required>
               <option value="Cedula Ciudadana">Cedula Ciudadana</option>
               <option value="Cedula Extrangera">Cedula Extrangera</option>
              </select>   
        </div>
            <div class="col-sm-6">
                  <label for="numeroIdentificaion">Numero de Cedula</label>
                  <input type="text" class="form-control" id="numeroIdentificaion" name="numeroIdentificaion">
        </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                  <label for="numeroTorre">Numero de Torre</label>
                  <select class="form-control" id="numeroTorre" name="numeroTorre" required>
                  <option value="1"></option>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                  </select>
        </div> 
            <div class="col-sm-4">
                  <label for="numeroApartamento">Numero de Apartamento</label>
                  <select class="form-control" id="numeroApartamento" name="numeroApartamento" required>
                       <option value="101"></option>
                       <option value="101">101</option>
                       <option value="102">102</option>
                       <option value="103">103</option>
                       <option value="104">104</option>
                       <option value="201">201</option>
                       <option value="202">202</option>
                       <option value="203">203</option>
                       <option value="204">204</option>
                       <option value="301">301</option>
                       <option value="302">302</option>
                       <option value="303">303</option>
                       <option value="304">304</option>
                       <option value="401">401</option>
                       <option value="402">402</option>
                       <option value="403">403</option>
                       <option value="404">404</option>     
                  </select>
    </div> 
        <div class="col-sm-4">
                  <label for="mascota">Mascota</label>
                  <select class="form-control" id="mascota" name="mascota" required>
                       <option value=""></option>
                       <option value="si">Si</option>
                       <option value="no">No</option>
                  </select>          
    </div>                         
    </div>
   </div>
      <div class="modal-footer">
      <button  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  class="btn btn-primary">Asignar</button>
      </div>
    </div>
  </div>
  </div>
</form>