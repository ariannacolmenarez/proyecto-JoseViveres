$(document).ready(function() {

    $("#userform").validate({
        rules: {
        nombre : {
            required: true,
            minlength: 5,
            maxlength: 50
        },
        rol: {
            required: true,
        },
        correo: {
            required: true,
            email: true
        },
        password2: {
            required: true,
            minlength : 5,
            maxlength: 50
            },
        password_conf : {
            minlength : 5,
            required: {
                depends: function(elem) {
                    return $("#contraseña1").val() != "" || $("#contraseña").val() != ""
                }
                },
            equalTo : "#contraseña1"
        }
        },
        errorElement : 'span'
    });
      
    $("#userform2").validate({
        rules: {
          nombre : {
            required: true,
            minlength: 5,
            maxlength: 50
          },
          rol: {
            required: true,
          },
          correo: {
            required: true,
            email: true
          },
          password: {
            required: {
                depends: function(elem) {
                  return $("#contraseña1").val() != "" || $("#contraseña").val() != ""
                }
              },
              minlength : 5,
              maxlength: 50
            },
          password_conf : {
              minlength : 5,
              required: {
                  depends: function(elem) {
                    return $("#contraseña1").val() != "" || $("#contraseña").val() != ""
                  }
                },
              equalTo : "#contraseñaV"
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


$("#volver27").on("click", function() {
    limpiar();
});

$("#close").on("click", function() {
    limpiar();
});

$("#usuarios").on("click", function() {
    listarusuarios();
    
    
});

function limpiar(){
    $('input').val("");
    $('select').val("");
    $('textarea').val("");
}

function listarusuarios(){
    
    $.get("usuarios/listar", {}, function (data, status) {
        $("#list_usuarios").html(data);
        $('#exampleModalToggle26').modal('show');
    });
}

function listarRol(direccion){

    $.ajax({
        type: "POST",
        url: "usuarios/listarRoles",
        dataType: "html",
        success: function (response) {
            $(direccion).html(response);
        },
        error: (response) => {
            console.log(response);
        }
    });

}

function editarUsuarios(id){
    listarRol('#rol_usuario');
    consultarusuarios(id);
    $('#exampleModalToggle16').modal('show');
}

function consultarusuarios (id) {
    $.ajax({
        type: "POST",
        url: "usuarios/consultar/"+id,
        dataType: "json",
        success: function (response) {
            response.map( function (elem) {
                $("#con").val(elem.contraseña);
                $("#idusuarios").val(elem.id);
                $("#nombre1").val(elem.nombre);
                $("#correo").val(elem.correo);
                $("#rol_usuario option[value='"+ elem.rol_usuario +"']").attr("selected",true);
            }); 
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

function guardarUsuarios(){
    var id = $("#idusuarios").val();
    var nombre = $("#nombre1").val();
    var correo = $("#correo").val();
    if ($("#contraseña").val()!="") {
        var contraseña = $("#contraseña").val();
    }else{
        var contraseña = $("#con").val();
    }
    var rol=$("#rol_usuario").val();

    var parametros = {
        "nombre1" : nombre,
        "correo" : correo,
        "contraseña" : contraseña,
        "id" : id,
        "rol": rol
    };

    if ($('#userform2').valid()) {
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'usuarios/guardar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                
                $('#exampleModalToggle16').modal('hide');  
                toastMixin.fire({
                    animation: true,
                    title: 'Usuario Modificado'
                });  
                listarusuarios();
                    
            },
            error: (response) => {
                console.log(response);
            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente")
    }
    
}

function crearUsuario(){
    listarRol('#rol_usuarioR');
    $('#exampleModalToggle27').modal('show');
}

function registrarUsuarios(){
    var nombre = $("#nombre3").val();
    var correo = $("#correo2").val();
    var contraseña = $("#contraseña1").val();
    var rol = $("#rol_usuarioR").val();
   
    var parametros = {
        "nombre" : nombre,
        "correo" : correo,
        "contraseña" : contraseña,
        "rol" : rol
    };
    if ($('#userform').valid()) {
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'usuarios/registrar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response == 0){
                    console.log(response);
                    $('#exampleModalToggle27').modal('hide');
                    validacion("error","Duplicado","Estas registrando un dato duplicado");
                    limpiar();
                }else{
                    $('#exampleModalToggle27').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Usuario Registrado'
                    });
                    limpiar();    
                    listarusuarios();
                }      
                    
            },error: (response) => {
                console.log(response);
            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente");
    }
}

function eliminarUsuarios(){
    var id = $("#idusuarios").val();

    var parametro = {"id" : id};
    Swal.fire({
        title: '¿Estas seguro que deseas Eliminar el registro?',
        ico: "warning",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                data:  parametro, //datos que se envian a traves de ajax
                url:   'usuarios/eliminar', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#exampleModalToggle16').modal('hide');    
                    toastMixin.fire({
                        animation: true,
                        title: 'Usuario Eliminado'
                    });
                    listarusuarios();     
                },
                error: (response) => {
                    console.log(response);
                }
            });
        } else if (result.isDenied) {
            Swal.fire('Los cambios no fueron guardados', '', 'info')
          }
    })
}

$("#buscadorU").on("keyup",function(e) {
    e.preventDefault();
    var busqueda = $("#buscadorU").val();
    if (busqueda !== "") {
        var parametro = {"busqueda" : busqueda};
        $.ajax({
            data:  parametro, //datos que se envian a traves de ajax
            url:   'usuarios/buscar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                $("#list_usuarios").html(response);
                $('#exampleModalToggle26').modal('show');
            },
            error: (response) => {
                console.log(response);
            }
        });  
    }else{
        listarusuarios();
    }

    
})