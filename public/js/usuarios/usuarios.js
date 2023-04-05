
$(document).ready(function(){

$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");

});

function agregarNuevoUsuario(){
        $.ajax({
            type: "POST",
            data:$('#frmAgregarUsuario').serialize(),
            url:"../procesos/usuarios/crud/agregarNuevoUsuario.php",
            success:function(respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                    $('#frmAgregarUsuario')[0].reset();
                    Swal.fire(":D", "Agregado con Exito!", "success");
                } else {
                    Swal.fire(":(", "Error al agregar!" + respuesta,  "success");
                    
                }
    
            }
        }); 
    return false;
}

function obtenerDatosUsuario(idUsuario) {
    $.ajax({
        type: "POST",
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        data: "idUsuario=" + idUsuario,
        success: function (respuesta) {
            console.log(respuesta);
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta);
        }
    });

}

function eliminarUsuario(idUsuario, idPersona) {
    Swal.fire({
      title: 'Estas seguro de eliminar esta asignacion?',
      text: "una vez lo elimine no lo podra recuperar¡",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si estoy seguro!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          data: "idUsuario=" + idUsuario + "&idPersona=" + idPersona, // Add '&' here
          url: "../procesos/usuarios/crud/eliminarUsuario.php",
          success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
              $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
              Swal.fire(":D", "Usuario eliminado con Exito!", "warning");
            } else {
              Swal.fire(":(", "Error al eliminar Usuario!" + respuesta, "success");
            }
          }
        })
      }
    })
    return false;
  }