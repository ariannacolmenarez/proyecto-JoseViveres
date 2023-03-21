$(document).ready(function() {

    $("#form_rol").validate({
        rules: {
            nombrer : {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            descripcionr : {
                minlength: 5,
                maxlength: 150
            }
        },
        errorElement : 'span'
    });
      
    $("#form_rolM").validate({
        rules: {
            nombrer : {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            descripcionr : {
                minlength: 5,
                maxlength: 150
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

$(document).ready(function() {
    listarRoles();
});

function limpiar(){
    $('input').val("");
    $('select').val("");
    $('textarea').val("");
};

function listarRoles(){
    
    $.get("seguridad/listarRoles", {}, function (data, status) {
        $("#list_roles").html(data);
        $('#list_roles').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
          });
    });
};
function aggRol(){
    $('#exampleModalToggle19').modal('show');
}

function registrarRol(){
    var nombre = $("#nombreR").val();
    var descripcion = $("#descripcionR").val();

    var parametros = {
        "nombre" : nombre,
        "desc" : descripcion
    };
    if ($('#form_rol').valid()) {
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'seguridad/registrarRol', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response == 1){
                     $('#exampleModalToggle19').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Rol Registrado'
                    });
                    limpiar();    
                    window.location.reload()
                }else{
                    $('#exampleModalToggle19').modal('hide');
                    validacion("error","Duplicado","El nombre del rol esta duplicado");
                    limpiar();
                   
                }
            },error: (response) => {
                console.log(response);
            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente");
    }
    
}

function consultarRoles(id) {
    $.ajax({
        type: "POST",
        url: "seguridad/consultarRoles/"+id,
        dataType: "json",
        success: function (response) {
            console.log(response)
            $("#idRol").val(id);
            $("#nombreRol").val(response[0].nombre);
            $("#descripcionRol").val(response[0].descripcion);
            $('#exampleModalToggle20').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });
}

function guardarRol(){
    var id = $("#idRol").val();
    var nombre = $("#nombreRol").val();
    var descripcion = $("#descripcionRol").val();
   
    var parametros = {
        "nombre" : nombre,
        "descripcion" : descripcion,
        "id" : id
    };
    if ($('#form_rolM').valid()) {
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'seguridad/guardarRol', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                $('#exampleModalToggle20').modal('hide'); 
                toastMixin.fire({
                    animation: true,
                    title: 'Rol Modificado'
                });   
                window.location.reload()
            },
            error: (response) => {
                console.log(response);
            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente");
    }
}

function eliminarRol(id){
    Swal.fire({
        title: '¿Estas seguro que deseas Eliminar el registro?',
        ico: "warning",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:   'seguridad/eliminarRol/'+id, //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    if(response != 0){
                        $('#exampleModalToggle20').modal('hide');  
                        toastMixin.fire({
                            animation: true,
                            title: 'Rol Eliminado'
                        });  
                        //window.location.reload();
                    }else{
                        validacion("error","Error","No se puede eliminar el rol, ya posee un usuario asignado");
                    }
                    
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

function permisos(id){
    window.location.assign("seguridad/permisos?c="+id);
}