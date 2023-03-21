$(document).ready(function() {

    $("#presentacion_form").validate({
        rules: {
            presentacion : {
                required: true,
            }
        },
        errorElement : 'span'
    });
    $("#presentacion_formM").validate({
        rules: {
            presentacion : {
                required: true,
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


$("#close").on("click", function() {
    limpiar();
});

$("#registrarpresentacion").on("click", function() {
    $('#list_presentacion').modal('hide');
    $('#reg_presentacion').modal('show');
});

$("#editarpresentacion").on("click", function() {
    listarpresentaciones();
    
});

function limpiar(){
    $('input').val("");
    $('select').val("");
    $('textarea').val("");
}

function listarpresentaciones(){
    
    $.get("presentacion/listar", {}, function (data, status) {
        $("#lista_presentacion").html(data);
        $('#list_presentacion').modal('show');
    });
}

function registrarpresentacion(){
    var volumen = $("#volumen").val();
    var medidas = $("#medidas").val();
    var unidades = $("#unidades").val();
    
    if ($('#cat_form').valid()) {
        $.ajax({
            data:  {'volumen':volumen,'medidas':medidas,'unidades':unidades}, //datos que se envian a traves de ajax
            url:   'presentacion/registrar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve 
                if(response == 1 ){
                    $('#reg_presentacion').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Presentación Registrada'
                    });
                    limpiar(); 
                    listarpresentaciones();
                }else{
                    $('#reg_presentacion').modal('hide');
                    validacion("error","Duplicado","La presentación esta duplicada");
                    limpiar();
                    
                }
            },error: (response) => {
                console.log(response);

            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente")
    }
    
}

function editarPresentacion(id) {
    $.ajax({
        type: "POST",
        url: "presentacion/consultar/"+id,
        dataType: "json",
        success: function (response) {
            console.log(response[0].medidas)
            $("#presentacionE").val(response[0].id);
            $("#volumenE").val(response[0].volumen);
            $("#medidasE").val(response[0].medidas);
            $("#unidadesE").val(response[0].unidades);
            $('#mod_presentacion').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

function guardarpresentacion(){
    var id = $("#presentacionE").val();
    var volumen = $("#volumenE").val();
    var medidas = $("#medidasE").val();
    var unidades = $("#unidadesE").val();
    console.log(medidas)
    var parametros = {
        "volumen" : volumen,
        "medidas" : medidas,
        "unidades" : unidades,
        "id" : id
    };
    if ($('#cat_formM').valid()) {
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'presentacion/guardar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                $('#mod_presentacion').modal('hide'); 
                toastMixin.fire({
                    animation: true,
                    title: 'Presentación Modificada'
                });  
                limpiar();
                listarpresentaciones();
            },
            error: (response) => {
                console.log(response);
            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente")
    }
}

function eliminarPresentacion(){
    Swal.fire({
        title: '¿Estas seguro que deseas Eliminar el registro?',
        ico: "warning",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $('#presentacionE').val();
            $.ajax({
                url:   'presentacion/eliminarPresentacion/'+id, //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#mod_presentacion').modal('hide');   
                    toastMixin.fire({
                        animation: true,
                        title: 'Presentación Eliminada'
                    });
                    listarpresentaciones();
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



    

