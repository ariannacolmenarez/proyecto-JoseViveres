

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

$(document).ready(function() {  
    listarIngresos($("#fechas").val()); 
    listarEgresos($("#fechas").val());
    totalIngreso($("#fechas").val(),1);
    totalEgreso($("#fechas").val(),0);  
})

$("#fechas").on("change",function(){
    $("#date").val("");
    listarIngresos($("#fechas").val());
    listarEgresos($("#fechas").val());
    totalIngreso($("#fechas").val(),1);
    totalEgreso($("#fechas").val(),0);
    utilidad();
});

$("#date").on("change",function(){
    $("#fechas").val("");
    listarIngresos($("#date").val());
    listarEgresos($("#date").val());
    totalIngreso($("#date").val(),1);
    totalEgreso($("#fechas").val(),0);
    utilidad();
});

function listarIngresos(fecha){
    
    $.ajax({
        type: "POST",
        url: "balance/listar",
        dataType: "json",
        data: {'fecha': fecha},
        success: function (response) {
            $("#home-tab-pane").html(response);
            $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
              });
        },
        error: (response) => {
            console.log(response);
        }
    });
};

function listarEgresos(fecha){
    
    $.ajax({
        type: "POST",
        url: "balance/listarEgresos",
        dataType: "json",
        data: {'fecha': fecha},
        success: function (response) {
            $("#profile-tab-pane").html(response);
            $('#example2').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
              });
        },
        error: (response) => {
            console.log(response);
        }
    });
};

function eliminarVenta(id){
    
    Swal.fire({
        title: '¿Estas seguro que deseas Eliminar el registro?',
        ico: "warning",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
      }).then((result) => {
        if (result.isConfirmed) {
          var parametro = {"id" : id};
            $.ajax({
                data:  parametro, //datos que se envian a traves de ajax
                url:   'ventas/eliminar', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve   
                    toastMixin.fire({
                        animation: true,
                        title: 'Venta Eliminada'
                    });
                    listarIngresos("");
                    totalIngreso($("#fechas").val(),1);
                    totalEgreso($("#fechas").val(),0);
                    utilidad();

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

function eliminarGasto(id){
    Swal.fire({
        title: '¿Estas seguro que deseas Eliminar el registro?',
        ico: "warning",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
      }).then((result) => {
        if (result.isConfirmed) {
            var parametro = {"id" : id};
            $.ajax({
                data:  parametro, //datos que se envian a traves de ajax
                url:   'gastos/eliminar', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve   
                    toastMixin.fire({
                        animation: true,
                        title: 'Gasto Eliminado'
                    });
                    listarEgresos("");
                    totalIngreso($("#fechas").val(),1);
                    totalEgreso($("#fechas").val(),0);
                    utilidad();
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

function totalIngreso(fecha,ingreso) {
    $.ajax({
        url:   'balance/totales', //archivo que recibe la peticion
        type:  'POST', //método de envio
        data: {'fecha': fecha,'data':ingreso},
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve   
            $('#sell').html(response);
            utilidad();
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

function totalEgreso(fecha,egreso,callback) {
    $.ajax({
        url:   'balance/totales', //archivo que recibe la peticion
        type:  'POST', //método de envio
        data: {'fecha': fecha,'data':egreso},
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve   
            $('#bills').html(response);
            utilidad();
        },
        error: (response) => {
            console.log(response);
        }
    });
}

function utilidad(){
    var ventas= $("#sell").text();
    var gastos = $("#bills").text();
    var utilidad = ventas - gastos;
    $('#utility').html(utilidad.toFixed(2));
    
}

function reciboVenta(id){
    $.ajax({
        url:   'balance/reciboI', //archivo que recibe la peticion
        type:  'POST', //método de envio
        data: {'id': id},
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve   
           
           var mywindow = window.open('Recibo MP Market', 'PRINT', 'height=600,width=800');

            mywindow.document.write(response);

            mywindow.document.close(); 
            mywindow.focus();

            mywindow.print();
            mywindow.close();
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

function reciboGasto(id){
    $.ajax({
        url:   'balance/reciboE', //archivo que recibe la peticion
        type:  'POST', //método de envio
        data: {'id': id},
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve   
           
           var mywindow = window.open('Recibo MP Market', 'PRINT', 'height=600,width=800');

            mywindow.document.write(response);

            mywindow.document.close(); 
            mywindow.focus();

            mywindow.print();
            mywindow.close();
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

