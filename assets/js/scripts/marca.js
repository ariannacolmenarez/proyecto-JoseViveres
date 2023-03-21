$(document).ready(function() {

    $("#marca_form").validate({
        rules: {
            nombreM : {
                required: true,
                minlength: 5,
                maxlength: 50
            }
        },
        errorElement : 'span'
    });
    $("#marca_formM").validate({
        rules: {
            nombremarca : {
                required: true,
                minlength: 5,
                maxlength: 50
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

$("#registrarmarca").on("click", function() {
    console.log("wewe")
    $('#list_marca').modal('hide');   
    $('#marca').modal('show');

});

$("#editarmarca").on("click", function() {
    listarmarca();
    
});

function limpiar(){
    $('input').val("");
    $('select').val("");
    $('textarea').val("");
}

function listarmarca(){
    
    $.get("marca/listar", {}, function (data, status) {
        $("#lista_marca").html(data);
        $('#list_marca').modal('show');
    });
}

function registrarmarca(){
    var nombre = $("#nombreM").val();
    
    if ($('#marca_form').valid()) {
        $.ajax({
            data:  {'nombre':nombre}, //datos que se envian a traves de ajax
            url:   'marca/registrar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) { console.log(response);
                if(response == 1 ){
                    $('#marca').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Marca Registrada'
                    });
                    limpiar(); 
                    listarmarca();
                }else{
                    $('#marca').modal('hide');
                    validacion("error","Duplicado","El nombre esta duplicado");
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

function editarMarca (id) {
    $.ajax({
        type: "POST",
        url: "marca/consultar/"+id,
        dataType: "json",
        success: function (response) {
            $("#idmarcaE").val(response[0].id);
            $("#nombremarcaE").val(response[0].nombre);
            $('#mod_marca').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

function guardarmarca(){
    var id = $("#idmarcaE").val();
    var nombre = $("#nombremarcaE").val();
    
    var parametros = {
        "nombre" : nombre,
        "id" : id
    };
    if ($('#marca_formM').valid()) {
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'marca/guardar', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                $('#mod_marca').modal('hide'); 
                toastMixin.fire({
                    animation: true,
                    title: 'Marca Modificada'
                });  
                limpiar();
                listarmarca();
            },
            error: (response) => {
                console.log(response);
            }
        });
    } else {
        validacion("error","Error","Rellena los campos correctamente")
    }
}

function eliminarmarca(){
    Swal.fire({
        title: '¿Estas seguro que deseas Eliminar el registro?',
        ico: "warning",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $('#idmarcaE').val();
            $.ajax({
                url:   'marca/eliminarMarca/'+id, //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#mod_marca').modal('hide');   
                    toastMixin.fire({
                        animation: true,
                        title: 'Marca Eliminada'
                    });
                    listarmarca();
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

$("#searchmarca").on("keyup",function(e) {
    e.preventDefault();
    var busqueda = $("#searchmarca").val();
    if (busqueda !== "") {
        var parametro = {"busqueda" : busqueda};
        $.ajax({
            data:  parametro, //datos que se envian a traves de ajax
            url:   'marca/buscarMarca', //archivo que recibe la peticion
            type:  'POST', //método de envio
            success:  function (response) {
                console.log(response)
                $("#lista_marca").html(response);
            },
            error: (response) => {
                console.log(response);
            }
        });  
    }else{
        listarmarca();
    }
})


    

