$(document).ready(function() {

    $("#spentform").validate({
        rules: {
            nombrev : {
                minlength: 5,
                maxlength: 50
            },
            cat: {
                required: true,
            },
            fechav: {
                required: true,
            },
            horav: {
                required: true,
            },
            montov: {
                required: true,
                number: true
            },
            proveedorv: {
                required: {
                    depends: function(elem) {
                        return $('input[name=estado]:checked', '#estadov').val() == "A CREDITO"
                    }
                    },
            },
            metodo: {
                required: {
                    depends: function(elem) {
                        return $('input[name=estado]:checked', '#estadov').val() == "PAGADA"
                    }
                    },
            }
        },
        errorElement : 'span'
    });
});

function validacion(tipo,titulo,texto){
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: texto,
      })
}
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
$("#close").on("click", function() {
    window.location.reload();
});

$("#gastos").on("click", function(e) {
    listarCategorias();
    listarProveedores();
});


function listarCategorias(){

    $.ajax({
        type: "POST",
        url: "gastos/listarCategorias",
        dataType: "html",
        success: function (response) {
            $('#cat').prepend(response);
            $('#exampleModalToggle2').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });

};
function listarProveedores(){

    $.ajax({
        type: "POST",
        url: "gastos/listarProveedores",
        dataType: "html",
        success: function (response) {
            $('#proveedorv').prepend(response);
        },
        error: (response) => {
            console.log(response);
        }
    });

};

function registrarGasto(){
    var nombre = $("#nombrev").val();
    var estado = $('input[name=estado]:checked', '#estadov').val();
    var categoria = $("#cat").val();
    var fecha= $("#fechav").val();
    var hora= $("#horav").val();
    var monto = $("#montov").val();
    var proveedor = $("#proveedorv").val();
    var metodo = $('input[name=metodo]:checked', '#metodov').val();

    var parametros = {
        "nombre" : nombre,
        "estado" : estado,
        "categoria" : categoria,
        "fecha" : fecha,
        "hora" : hora,
        "proveedor" : proveedor,
        "monto" : monto,
        "metodo" : metodo,
    };
    if ($('#spentform').valid()) {
        if (estado == "A CREDITO") {
            if (proveedor != "" && proveedor != null) {
                $.ajax({
                    data:  parametros, 
                    url:   'gastos/registrar', //archivo que recibe la peticion
                    type:  'POST', //método de envio
                    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $('#exampleModalToggle2').modal('hide'); 
                        toastMixin.fire({
                            animation: true,
                            title: 'Gasto Registrado'
                        });
                        //window.location.reload();  
                    },error: (response) => {
                        console.log(response);
                    }
                });
            }else{
                validacion("error","Error","Ingresa el proveedor");
            }
        }else{
            $.ajax({
                data:  parametros, 
                url:   'gastos/registrar', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#exampleModalToggle2').modal('hide'); 
                    toastMixin.fire({
                        animation: true,
                        title: 'Gasto Registrado'
                    });
                    //window.location.reload();  
                },error: (response) => {
                    console.log(response);
                }
            });
        }
    } else {
        validacion("error","Error","Rellena los campos correctamente");
    }
    
}


    

