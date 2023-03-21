$(document).ready(function() {

    $("#form_prov").validate({
        rules: {
            nombrep : {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            nro_doc: {
                number: true,
                minlength: 6,
                maxlength:9
            },
            contactop: {
                required: true,
                number: true,
                min:11,
                maxlength:11
                },
            direccionp : {
                minlength: 5,
                maxlength: 150
            }
        },
        errorElement : 'span'
    });
      
    $("#form_provM").validate({
        rules: {
            nombrep : {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            nro_doc: {
                number: true,
                minlength: 6,
                maxlength:9
            },
            contactop: {
                required: true,
                number: true,
                min:11,
                maxlength:11
                },
            direccionp : {
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
$("#volver11").on("click", function() {
    $('#exampleModalToggle11').modal('hide');
});

$("#volver12").on("click", function() {
    limpiar();
});

$("#close").on("click", function() {
    limpiar();
});

$("#proveedores").on("click", function() {
    listarproveedores();
});

function limpiar(){
    $('input').val("");
    $('select').val("");
    $('textarea').val("");
};




function listarproveedores(){
    
    $.get("proveedores/listar", {}, function (data, status) {
        $("#proveedor").html(data);
        $('#exampleModalToggle10').modal('show');
    });
};


function consultarproveedores (id) {
    $.ajax({
        type: "POST",
        url: "proveedores/consultar/"+id,
        dataType: "json",
        success: function (response) {
            response.map( function (elem) {
                $("#id").val(elem.id);
                $("#nombre").val(elem.nombre);
                $("#contacto").val(elem.contacto);
                $("#nro_doc").val(elem.nro_doc);
                $("#tipo_doc option[value='"+ elem.tipo_doc +"']").attr("selected",true);
                $("#direccion").val(elem.direccion);
            });
            $('#exampleModalToggle11').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

function guardarProveedor(){
    var id = $("#id").val();
    var nombre = $("#nombre").val();
    var contacto = $("#contacto").val();
    var nro_doc = $("#nro_doc").val();
    var tipo_doc= $("#tipo_doc").val();
    var direccion = $("#direccion").val();
    var parametros = {
        "nombre" : nombre,
        "contacto" : contacto,
        "nro_doc" : nro_doc,
        "tipo_doc" : tipo_doc,
        "direccion" : direccion,
        "id" : id
    };
    if ($('#form_provM').valid()) {
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'proveedores/guardar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                $('#exampleModalToggle11').modal('hide'); 
                toastMixin.fire({
                    animation: true,
                    title: 'Proveedor Modificado'
                });   
                listarproveedores(); 
            },
            error: (response) => {
                console.log(response);
            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente");
    }
    
}

function registrarProveedor(){
    var nombre = $("#nombreR").val();
    var contacto = $("#contactoR").val();
    var nro_doc = $("#nro_docR").val();
    var tipo_doc= $("#tipo_docR").val();
    var direccion = $("#direccionR").val();
    
    var parametros = {
        "nombre" : nombre,
        "contacto" : contacto,
        "nro_doc" : nro_doc,
        "tipo_doc" : tipo_doc,
        "direccion" : direccion,
    };

    if ($('#form_prov').valid()) {
        $.ajax({
            data:  parametros, 
            url:   'proveedores/registrar', 
            type:  'POST', 
            success:  function (response) { 
                if(response == 1){
                    $('#exampleModalToggle12').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Proveedor Registrado'
                    });
                    limpiar();    
                    listarproveedores();
                }else{
                    $('#exampleModalToggle12').modal('hide');
                    validacion("error","Duplicado","El número de documento esta duplicado");
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

function eliminarProveedor(){
    var id = $("#id").val();
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
                url:   'proveedores/eliminar', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#exampleModalToggle11').modal('hide');  
                    toastMixin.fire({
                        animation: true,
                        title: 'Proveedor Eliminado'
                    });  
                    listarproveedores(); 
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

$("#buscador").on("keyup",function(e) {
    e.preventDefault();
    var busqueda = $("#buscador").val();
    if (busqueda !== "") {
        var parametro = {"busqueda" : busqueda};
        $.ajax({
            data:  parametro, //datos que se envian a traves de ajax
            url:   'proveedores/buscar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                $("#proveedor").html(response);
                $('#exampleModalToggle10').modal('show');

            },
            error: (response) => {
                console.log(response);
            }
        });  
    }else{
        listarproveedores();
    }

    
})
    

