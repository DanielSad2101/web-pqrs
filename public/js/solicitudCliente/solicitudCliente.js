$(document).ready(function(){

    $('#TablaSolicitudClienteLoad').load("solicitudCliente/solicitudCliente.php");
    
    });

function agregarNuevaSolicitud() {
    $.ajax({
        type: "POST",
        url: "../procesos/solicitudCliente/agregarNuevaSolicitud.php",
        data: $('#frmNuevaSolicitud').serialize(),
        
        success: function (respuesta) {
            respuesta = respuesta.trim();
        if (respuesta == 1) {
            $('#TablaSolicitudClienteLoad').load("solicitudCliente/solicitudCliente.php");
            $('#frmNuevaSolicitud')[0].reset();
            Swal.fire(":D", "Agregado con Exito!", "success");
        } else {
            Swal.fire(":(", "Error al agregar!" + respuesta,  "success");
            
        }
            
            
        }
    });
return false;
}

function eliminarSolicitudCliente(idSolicitud){
    Swal.fire({
        title: 'Estas seguro de eliminar esta solicitud?',
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
                data: "idSolicitud=" + idSolicitud,
                url: "../procesos/solicitudCliente/eliminarSolicitudCliente.php",
                
                success: function (respuesta) {
                    if (respuesta == 1) {
                        $('#TablaSolicitudClienteLoad').load("solicitudCliente/solicitudCliente.php");
                        Swal.fire(":D", "Eliminado con Exito!", "success");
                    } else {
                        Swal.fire(":(", "Error al eliminar!" + respuesta,  "success");
                        
                    }
                    
                }
            });
        
        }
    })
    

return false;
}
