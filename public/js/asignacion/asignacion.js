
$(document).ready(function(){

    $('#tablaAsignacionesload').load("asignacion/tablaAsignacion.php");
    
});

function asignarResidente() {
    $.ajax({
        type: "POST",
        data:$('#frmAgsignarResidente').serialize(),
        url:"../procesos/asignacion/asignar.php",
        success:function(respuesta) {
            if (respuesta == 1) {
                $('#frmAgsignarResidente')[0].reset();
                $('#tablaAsignacionesload').load("asignacion/tablaAsignacion.php");
                Swal.fire(":D", "Asignado con Exito!", "success");
            } else {
                Swal.fire(":(", "Error al asignar!" + respuesta,  "success");
                
            }

        }
    }); 
return false
}

function eliminarAsignacion(idAsignacion) {
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
                data: "idAsignacion=" + idAsignacion,
                url: "../procesos/asignacion/eliminarAsignacion.php",
                
                success: function (respuesta) {
                    if (respuesta == 1) {
                        $('#tablaAsignacionesload').load("asignacion/tablaAsignacion.php");
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

