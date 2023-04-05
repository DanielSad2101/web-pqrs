<form id="frmAgregarUsuario" method="POST" onsubmit="return agregarNuevoUsuario()">
  <div class="modal fade" id="ModalAgrgarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-4">
              <label for="paterno">Primer Apellido</label>
              <input type="text" class="form-control" id="paterno" name="paterno" required>
            </div>
            <div class="col-sm-4">
              <label for="materno">Segundo Apellido</label>
              <input type="text" class="form-control" id="materno" name="materno" required>
            </div>
            <div class="col-sm-4">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
          </div>    
          <div class="row">
            <div class="col-sm-4">
              <label for="fechaNacimiento">Fecha de Nacimiento</label>
              <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
            </div>
            <div class="col-sm-4">
              <label for="sexo">Sexo</label>
              <select class="form-control" id="sexo" name="sexo" required>
                <option value=""></option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="telefono">Telefono</label>
              <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="correo">Correo</label>
              <input type="email" class="form-control" id="correo" name="correo">
            </div>
            <div class="col-sm-4">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
            <div class="col-sm-4">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
          </div> 
          <div class="row">
            <div class="col-sm-12">
              <label for="idRol">Rol de Usuario</label>  
              <select name="idRol" id="idRol" class="form-control">
                <option value="1">Residente</option>
                <option value="2">Administrador</option>
              </select> 
            </div>        
          </div> 
    <div class="modal-footer">
  <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
  <button class="btn btn-primary" type="submit">Agregar</button>
</div>
</div>
</div>
</div>

</form>