<form id="frmActualizarDatosPersonales" method="POST" onsubmit="return actualizarDatosPersonales()">
<div class="modal fade" id="modalActualizarDatosPersonales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos personales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <label for="paternoInicio">Primer apellido</label>
          <input type="text" class="form-control" id="paternoInicio" name="paternoInicio">
          <label for="maternoInicio">Segundo apellido</label>
          <input type="text" class="form-control" id="maternoInicio" name="maternoInicio">
          <label for="nombreInicio">Nombre</label>
          <input type="text" class="form-control" id="nombreInicio" name="nombreInicio">
          <label for="telefonoInicio">Telefono</label>
          <input type="text" class="form-control" id="telefonoInicio" name="telefonoInicio">
          <label for="correoInicio">Correo</label>
          <input type="mail" class="form-control" id="correoInicio" name="correoInicio">
          <label for="fechaInicio">Fecha nacimiento</label>
          <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-warning">Actualizar Datos</button>
      </div>
    </div>
  </div>
</div>
</form>