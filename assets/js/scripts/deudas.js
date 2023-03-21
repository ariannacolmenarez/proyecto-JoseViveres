$(document).ready(function() {

    $("#form-abon").validate({
        lang: 'es',
        rules: {
            fechaA : {
                required: true,
            },
            valorA: {
                required: true,
                number: true
            },
            conceptoA: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
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
    listardeudasCobrar()
    listardeudasPagar()
    
})

function listardeudasPagar(){
     
    $.ajax({
        type: "POST",
        url: "deudas/listarDeudasPagar",
        dataType: "json",
        success: function (response) {
            if (response.data == "") {
                $("#sin_deudasp").html("<div>No Hay Deudas registradas</div>");
            }else{
            $("#totalP").html(response.total);
            $("#lista_deudasP").html(response.data);
            }
        },
        error: (response) => {
            console.log(response);
        }
    });
}

function listarAbonos(id,tipo,name){
    $.ajax({
        type: "POST",
        data: {'tipo': tipo},
        url: "deudas/listarAbonos/"+id,
        dataType: "json",
        success: function (response) {
            $(name).html(response.data);
        },
        error: (response) => {
            console.log(response);
        }
    });
}

function listardeudasCobrar(){
     
    $.ajax({
        type: "POST",
        url: "deudas/listarDeudasCobrar",
        dataType: "json",
        success: function (response) {
            if (response.data == "") {
                $("#totalC").html("");
                $("#lista_deudasC").html("");
                $("#sin_deudasc").html("<div>No Hay Deudas registradas</div>");
            }else{
                $("#sin_deudasc").html("");
                $("#totalC").html(response.total);
                $("#lista_deudasC").html(response.data);
            }
        },
        error: (response) => {
            console.log(response);
        }
    });
}

function editarDeudaPagar(id, monto, cant){

    $.ajax({
        type: "POST",
        url: "deudas/movimientosPagar/"+id,
        dataType: "json",
        success: function (response) {
            $('#cantD').html(cant);
            $('#montoD').html(monto);
            $('#nombreD').html(response.nombre);
            $('#lista_pagar').html(response.data);
            listarAbonos(id,0,"#lista_abonosp");
            $('#exampleModalToggle17').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });   
}

function editarDeudaCobrar(id, monto, cant){

    $.ajax({
        type: "POST",
        url: "deudas/movimientosCobrar/"+id,
        dataType: "json",
        success: function (response) {
            $('#cantC').html(cant);
            $('#montoC').html(monto);
            $('#nombreC').html(response.nombre);
            $('#lista_cobrar').html(response.data);
            listarAbonos(id,1,"#lista_abonosc");
            $('#exampleModalToggle13').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

function detallesPagar(id,resto,total,id_p){
    $.ajax({
        type: "POST",
        url: "deudas/detallesPagar/"+id,
        dataType: "json",
        success: function (response) {
            console.log(response)
            $('#conceptoP').html(response.nombre);
            $('#montoP').html(resto);
            $('#categoria').html(response.categoria);
            $('#fechaP').html(response.fecha);
            $('#id').val(id);
            $('#total').val(total);
            $('#id_p').val(id_p);
            $('#exampleModalToggle18').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });
}

function detallesCobrar(id,resto,total,id_p){
    $.ajax({
        type: "POST",
        url: "deudas/detallesCobrar/"+id,
        dataType: "json",
        success: function (response) {
            console.log(response)
            $('#fechC').html(response.data.fecha);
            $('#nameC').html(response.data.nombre);
            $('#valueC').html(resto);
            $('#table').html(response.productos);
            $('#id').val(id);
            $('#id_p').val(id_p);
            $('#total').val(total);
            $('#exampleModalToggle14').modal('show');
        },
        error: (response) => {
            console.log(response);
        }
    });
}

$('#abonoC').on("click",function(){
    
    var id = $('#id').val();
    var total = $('#total').val();
    var id_p = $('#id_p').val();
    $("#valorA").attr("max", total);
    console.log(total)
    $('#exampleModalToggle15').modal('show');
    aggAbonoPago(id,1,id_p);
}) 

$('#abonoP').on("click",function(){
    
    var id = $('#id').val();
    var total = $('#total').val();
    var id_p = $('#id_p').val();
    $("#valorA").attr("max", total);
    $('#exampleModalToggle15').modal('show');
    aggAbonoPago(id,"",id_p);
}) 

function aggAbonoPago(id,tipo,id_p){
    $('#guardar').on("click", function(){
        var fecha = $("#fechaA").val();
        var valor = $("#valorA").val();
        var concepto = $("#conceptoA").val();
        var metodo= $("input[name='opciones']:radio:checked").val();

        if ($('#form-abon').valid()) {
            var parametros = {
                "fecha" : fecha,
                "valor" : valor,
                "concepto" : concepto,
                "metodo" : metodo,
                "id" : id,
                "persona": id_p
            };
            console.log(parametros)
            $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'deudas/abonar/'+tipo, //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) {
                    $('.modal').modal('hide');  
                    toastMixin.fire({
                        animation: true,
                        title: 'Abono Registrado correctamente'
                    });
                    window.location = "deudas";
                    listardeudasPagar();
                    listardeudasCobrar();   
                },
                error: (response) => {
                    console.log(response);
                }
            }); 
        } else {
            validacion("error","Error","Rellena los campos correctamente");
        } 
    })
}

function eliminarDC(){
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
                url:   'deudas/eliminar', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#exampleModalToggle14').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Deuda Eliminada'
                    });    
                    listardeudasCobrar();
                    window.location = "deudas"; 
                        
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
function eliminarDP(){
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
                url:   'deudas/eliminar', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#exampleModalToggle18').modal('hide'); 
                    toastMixin.fire({
                        animation: true,
                        title: 'Deuda Eliminada'
                    });   
                    listardeudasPagar(); 
                    window.location = "deudas";
                        
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

function eliminarAbono(id){
    Swal.fire({
        title: '¿Estas seguro que deseas Eliminar el registro?',
        ico: "warning",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:   'deudas/eliminarAbono/'+id, //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#exampleModalToggle13').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Abono Eliminado'
                    });    
                    window.location = "deudas";
                    listardeudasCobrar(); 
                    listardeudasPagar();
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


