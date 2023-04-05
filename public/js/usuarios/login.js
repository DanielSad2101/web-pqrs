function loginUsuario(){ 
    $.ajax({
        type: "POST",
        data:$('#frmlogin').serialize(),
        url:"procesos/usuarios/login/loginUsuario.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                window.location.href = "vistas/inicio.php";
            } else {
                Swal.fire(":(", "error al entrar! el usuario o la contraseña es incorrecto" + respuesta, "error");
            }

        }
    }); 
            
    
    return false; 
}