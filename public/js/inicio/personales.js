function datosPersonalesInicio(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        data: "idUsuario=" + idUsuario,
        success: function (respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#paterno').text(respuesta['paterno']);
            $('#materno').text(respuesta['materno']);
            $('#nombre').text(respuesta['nombre']);
            $('#telefono').text(respuesta['telefono']);
            $('#correo').text(respuesta['correo']);
            $('#fechaNacimiento').text(respuesta['fechaNacimiento']);
            
        }
    });
}