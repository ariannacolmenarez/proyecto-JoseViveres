$(document).ready(function() {

    $("#form_clien").validate({
        rules: {
            nombrec : {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            nro_doc: {
                number: true,
                minlength: 6,
                maxlength:9
            },
            telefonoc: {
                required: true,
                number: true,
                minlength: 11,
                maxlength:11
            }
        },
        errorElement : 'span'
    });
      
    $("#form_clienM").validate({
        rules: {
            nombrec : {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            nro_doc: {
                number: true,
                minlength: 6,
                maxlength:9
            },
            telefonoc: {
                required: true,
                number: true,
                minlength: 11,
                maxlength:11
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

$("#busqueda").on("click",function(){
    console.log("boton");
})

$("#volver8").on("click", function() {
    $('#exampleModalToggle11').modal('hide');
});

$("#volver9").on("click", function() {
    limpiar();
});

$("#close").on("click", function() {
    limpiar();
});

$("#clientes").on("click", function() {
    listarclientes();
});

function limpiar(){
    $('input').val("");
    $('select').val("");
    $('textarea').val("");
};




function listarclientes(){
    
    $.get("clientes/listar", {}, function (data, status) {
        $("#cliente").html(data);
        $('#exampleModalToggle7').modal('show');
    });
};


function consultarclientes (id) {
    $.ajax({
        type: "POST",
        url: "clientes/consultar/"+id,
        dataType: "json",
        success: function (response) {
            
            response.map( function (elem) {
                console.log(elem.nombre);
                $("#idcliente").val(elem.id);
                $("#nombrecliente").val(elem.nombre);
                $("#telefonocliente").val(elem.telefono);
                $("#nro_doccliente").val(elem.nro_doc);
                $("#doc_cliente option[value='"+ elem.tipo_doc +"']").attr("selected",true);
            });
            $('#exampleModalToggle8').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

function guardarCliente(){
    var id = $("#idcliente").val();
    var nombre = $("#nombrecliente").val();
    var telefono = $("#telefonocliente").val();
    var nro_doc = $("#nro_doccliente").val();
    var tipo_doc= $("#doc_cliente").val();

    if ($('#form_clienM').valid()) {
        var parametros = {
        "nombrecliente" : nombre,
        "telefonocliente" : telefono,
        "nro_doccliente" : nro_doc,
        "tipo_doccliente" : tipo_doc,
        "idcliente" : id
        };
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'clientes/guardar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                $('#exampleModalToggle8').modal('hide');
                toastMixin.fire({
                    animation: true,
                    title: 'Cliente Modificado'
                });    
                listarclientes();
                    
            },
            error: (response) => {
                console.log(response);
            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente");
    }

    
}

function registrarCliente(){
    var nombre = $("#nombreCliente").val();
    var telefono = $("#telefonoC").val();
    var nro_doc = $("#nro_docC").val();
    var tipo_doc= $("#tipo_docC").val();

    if ($('#form_clien').valid()) {
        var parametros = {
            "nombrecliente" : nombre,
            "telefonocliente" : telefono,
            "nro_doccliente" : nro_doc,
            "tipo_doccliente" : tipo_doc
        };
        // console.log(parametros)
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'clientes/registrar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response == 1){
                    // console.log(response);
                    $('#exampleModalToggle9').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Cliente Registrado'
                    });
                    limpiar();    
                    listarclientes();
                }else{$('#exampleModalToggle9').modal('hide');
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

function eliminarCliente(){
    var id = $("#idcliente").val();
    Swal.fire({
        title: '¿Estas seguro que deseas Eliminar el registro?',
        ico: "warning",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            var parametro = {"idcliente" : id};
            $.ajax({
                data:  parametro, //datos que se envian a traves de ajax
                url:   'clientes/eliminar', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#exampleModalToggle8').modal('hide');   
                    toastMixin.fire({
                        animation: true,
                        title: 'Cliente Eliminado'
                    }); 
                    listarclientes();
                        
                },
                error: (response) => {
                    console.log(response);
                }
            })
        } else if (result.isDenied) {
            Swal.fire('Los cambios no fueron guardados', '', 'info')
          }
    })
}

$("#buscadorcliente").on("keyup",function(e) {
    e.preventDefault();
    var busqueda = $("#buscadorcliente").val();
    if (busqueda !== "") {
        var parametro = {"busqueda" : busqueda};
        $.ajax({
            data:  parametro, //datos que se envian a traves de ajax
            url:   'clientes/buscar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                $("#cliente").html(response);
                $('#exampleModalToggle7').modal('show');

            },
            error: (response) => {
                console.log(response);
            }
        });  
    }else{
        listarclientes();
    }

    
})