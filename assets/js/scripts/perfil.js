$(document).ready(function() {

    $("#perfilform").validate({
        rules: {
            nombrePerfil : {
                required: true,
                minlength: 5,
                maxlength: 50
              },
              correoPerfil: {
                required: true,
                email: true
              },
              passwordPerfil: {
                required: {
                    depends: function(elem) {
                      return $("#contraseñaPerfil").val() != "" 
                    }
                  },
                  minlength : 5,
                  maxlength: 50
                },
              password_confPerfil : {
                  minlength : 5,
                  required: {
                      depends: function(elem) {
                        return $("#contraseñaPerfil").val() != "" 
                      }
                    },
                  equalTo : "#contraseñaVPerfil"
              }
        },
        errorElement : 'span'
    });
});

var toastMixin = Swal.mixin({
    toast: true,
    icon: 'success',
    title: 'General Title',
    animation: false,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
function validacion(tipo,titulo,texto){
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: texto,
      })
}

$("#perfilM").on("click", function() {
   
    $('#perfil').modal('show');consultar();
});


function guardar(){
    var nombre = $("#nombrePerfil").val();
    var correo = $("#correoPerfil").val();
    if ($("#contraseñaPerfil").val()!="") {
      var clave = $("#contraseñaPerfil").val();
  }else{
      var clave = $("#con1").val();
  }
    
    var id = $("#idPerfil").val();

    if ($('#perfilform').valid()) {
        var parametros = {
        "nombre1" : nombre,
        "correo" : correo,
        "contraseña" : clave,
        "id" : id
        };
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'usuarios/guardar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                $('#perfil').modal('hide');
                toastMixin.fire({
                    animation: true,
                    title: 'Perfil Modificado'
                });                        
            },
            error: (response) => {
                console.log(response);
            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente");
    }

    
}