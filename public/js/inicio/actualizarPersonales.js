function actualizarDatosPersonales() {
    $.ajax({
        type: "POST",
        url: "../procesos/inicio/actualizarDatosPersonales.php",
        data: $('#frmActualizarDatosPersonales').serialize(),
        success: function (respuesta) {
            if (respuesta == 1) {
                Swal.fire(":D", "Actualizado con Exito!", "success");
                location.reload();
            } else {
                Swal.fire(":(", "Error al actualizar!" + respuesta,  "warning");
                
            }
            
        }
    });

    return false;
}

function ObtenerdatosPersonalesInicio(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        data: "idUsuario=" + idUsuario,
        success: function (respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#paternoInicio').val(respuesta['paterno']);
            $('#maternoInicio').val(respuesta['materno']);
            $('#nombreInicio').val(respuesta['nombre']);
            $('#telefonoInicio').val(respuesta['telefono']);
            $('#correoInicio').val(respuesta['correo']);
            $('#fechaInicio').val(respuesta['fechaNacimiento']);
            
        }
    });
}