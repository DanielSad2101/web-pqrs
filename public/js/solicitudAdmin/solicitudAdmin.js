$(document).ready(function(){

    $('#TablaSolicitudAdminLoad').load("SolicitudAmin/solicitudAdmin.php");
    
    });

    function eliminarSolicitudAdmin(idSolicitud){
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

    function obtenerDatosSolucion(idSolicitud) {
        $.ajax({
            type: "POST",
            data: { idSolicitud: idSolicitud }, // enviar el valor como un objeto
            url: "../procesos/solicitudAdmin/obtenerSolucion.php",
            success: function (respuesta) {
                respuesta = jQuery.parseJSON(respuesta);
                $('#idSolicitud').val(respuesta['idSolicitud'])
                $('#solucion').val(respuesta['solucion'])
                $('#estatus').val(respuesta['estatus'])
            }
        });
    }
    
    function agregarSolucionSolicitud() {
        $.ajax({
            type: "POST",
            url: "../procesos/solicitudAdmin/actualizarSolucion.php",
            data: $('#frmAgrgarSolucionSolicitud').serialize(),
            success: function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#TablaSolicitudAdminLoad').load("SolicitudAmin/solicitudAdmin.php");
                    
                    Swal.fire(":D", "Agregado con Exito!", "success");
                } else {
                    Swal.fire(":(", "Error al agregar!" + respuesta,  "success");
                    
                }
    
            }
        });
        return false;
    }

    