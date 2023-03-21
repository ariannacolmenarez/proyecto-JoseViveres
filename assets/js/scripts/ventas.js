$(document).ready(function() {

    $("#sell_form").validate({
        rules: {
            fecha: {
                required: true,
            },
            hora: {
                required: true,
                email: true
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

$(document).ready(function () {
   listar($("#cat").val()); 
   listarCategorias();    
});
 
$("#cat").on("change",function(){
    listar($("#cat").val());
});

$("#confirmar").on("click",function(){
  if (canasta.length !== 0) {
    listarClientes();
    $('#exampleModal').modal('show');
  }else{
    validacion("warning","Error","Elige algun producto a la canasta");
  }
});

function listar(opcion){
    
    $.ajax({
        type: "POST",
        url: "ventas/listar",
        data: {opcion: opcion},
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response[1] == 0) {
                $("#lista_prod").html("");
                $("#sin_prod").html('<div>No Hay productos</div>');
            }else{
                console.log(response[0]);
                $("#sin_prod").html('');
              $("#lista_prod").html(response[0]);  

            }
            
        },
        error: (response) => {
            console.log(response);
        }
    });
};

var canasta=[];

function agg (id,operacion) {
    var parametro = {"id" : id};
    $.ajax({
        data:  parametro,
        type: "POST",
        url: "ventas/agg",
        dataType: "json",
        success: function (response) {

            let indice = -1;
            for (let i = 0; i < canasta.length; i++) {  
              if (canasta[i][0].id == id) {
                indice = i;
                break;
              }
            }

            if (indice >= 0){
                if (operacion == 1) {
                    if(canasta[indice][0].agregado < canasta[indice][0].cantidad){
                        canasta[indice][0].agregado++; 
                    }
                }else{
                    if(canasta[indice][0].agregado > 1 ){
                        canasta[indice][0].agregado--; 
                    }
                }
                
                
            }else{
               canasta.push(response); 
               
            }

            productos = document.getElementById("canasta");

            while (productos.firstChild) {
                productos.removeChild(productos.firstChild);
            }

            canasta.map(function(producto) {

                if(producto[0].agregado == undefined){producto[0].agregado=1};

                var disponible = producto[0].cantidad-producto[0].agregado;
                producto[0].total = (producto[0].precio_venta * producto[0].agregado).toFixed(2);

                html= `<div class="row pt-1 align-items-center border-secondary border-bottom" id="listaCanasta">
                            <div class="col-1 m-0 p-0">
                                <button onclick="eliminarProdCanasta(`+producto[0].id+`);" class="btn btn-icon text-danger">
                                    <i class="ti-trash"></i>
                                </button>
                            </div>
                            <div class="col-10 col-lg-7 col-md-10 text-center ">
                                <h6 class="card-title text-success">`+producto[0].nombre+`</h6>
                                <h6 class="text-muted"><small>`+disponible+`disponible</small></h6>
                                <p class="card-text">`+producto[0].precio_venta+` BS</p>
                            </div>
                            <div class="col-lg-4 col-12 text-center">
                                <h6 class="mt-2 text-muted">= `+producto[0].total+` BS</h6>
                            </div>
                            <div class="col-12 mb-1">
                                <div class="btn-group" role="group" aria-label="Basic Example">
                                    <button class="btn btn-outline-secondary btn-rounded btn-xs " onclick="agg(`+producto[0].id+`,0)">
                                    <i class="fa-solid fa-circle-minus"></i>
                                    </button>
                                    <div class="btn btn-secondary btn-rounded btn-xs ">
                                    <b><input type="text" class="border-0 bg-transparent text-center" id="cant`+producto[0].id+`" value="`+producto[0].agregado+`"></b> 
                                    </div>
                                    <button class="btn btn-outline-secondary btn-rounded btn-xs" onclick="agg(`+producto[0].id+`,1)">
                                    <i class="fa-solid fa-circle-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>`;
                
                $("#canasta").append(html);
                var nombre = "#cant"+producto[0].id;
                $(nombre).on("change",function(){

                    if($("#cant").val() != ""){
                        var cant = parseFloat($(nombre).val());
                        if (cant < producto[0].cantidad && cant > 0) {
                            producto[0].agregado = cant+1;
                            agg(producto[0].id);
                        }
                    }else{
                        producto[0].agregado = 1;
                        agg(producto[0].id);
                    }
                });
            });

            const suma = canasta.map(item => parseFloat(item[0].total)).reduce((prev, curr) => prev + curr);
            
            $("#monto").html(suma+" BS");
        },
        error: (response) => {
            console.log("response");
        }
        
    });
    
}

function vaciarCanasta(){
    canasta = [];
    $("#monto").html("");
    $("#canasta").html("");
};

function eliminarProdCanasta(id){

    const res = canasta.reduce((p, c) => {
        (c[0].id == id) ? p[0].push(c): p[1].push(c);
        return p;
    }, [ [], [] ]);
    canasta = res[1];
    listarCanasta();
}

function listarCanasta(){
    $("#canasta").html("");
    canasta.map(function(producto) {
        
        var disponible = producto[0].cantidad-producto[0].agregado;

        html= `<div class="row pt-1 align-items-center border-secondary border-bottom" id="listaCanasta">
                    <div class="col-1 m-0 p-0">
                        <button onclick="eliminarProdCanasta(`+producto[0].id+`);" class="btn btn-icon text-danger">
                            <i class="ti-trash"></i>
                        </button>
                    </div>
                    <div class="col-10 col-lg-7 col-md-10 text-center ">
                        <h6 class="card-title text-success">`+producto[0].nombre+`</h6>
                        <h6 class="text-muted"><small>`+disponible+`disponible</small></h6>
                        <p class="card-text">`+producto[0].precio_venta+` BS</p>
                    </div>
                    <div class="col-lg-4 col-12 text-center">
                        <h6 class="mt-2 text-muted">= `+producto[0].total+` BS</h6>
                    </div>
                    <div class="col-12 mb-1">
                        <div class="btn-group" role="group" aria-label="Basic Example">
                            <button class="btn btn-outline-secondary btn-rounded btn-xs " onclick="agg(`+producto[0].id+`,0)">
                            <i class="fa-solid fa-circle-minus"></i>
                            </button>
                            <div class="btn btn-secondary btn-rounded btn-xs ">
                            <b><input type="text" class="border-0 bg-transparent text-center" id="cant`+producto[0].id+`" value="`+producto[0].agregado+`"></b> 
                            </div>
                            <button class="btn btn-outline-secondary btn-rounded btn-xs" onclick="agg(`+producto[0].id+`,1)">
                            <i class="fa-solid fa-circle-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>`;
        $("#canasta").append(html);
    });
    if (canasta.length !== 0) {
       const suma = canasta.map(item => parseFloat(item[0].total)).reduce((prev, curr) => prev + curr);     
        $("#monto").html(suma+" BS"); 
    }else{
        $("#monto").html("");
    }   
}

function listarClientes(){
    $.ajax({
        type: "POST",
        url: "ventas/listarClientes",
        dataType: "html",
        success: function (response) {
            $('#clien').prepend(response);
        },
        error: (response) => {
            console.log(response);
        }
    });
}

function listarCategorias(){
    $.ajax({
        type: "POST",
        url: "ventas/listarCategorias",
        dataType: "html",
        success: function (response) {
            $('#cat').prepend(response);
        },
        error: (response) => {
            console.log(response);
        }
    });
}

function registrarVenta(){

    var estado = $('input[name=btnradio]:checked', '#estado').val();
    var fecha = $("#fecha").val();
    var hora = $("#hora").val();
    var metodo = $('input[name=options]:checked', '#metodo').val();
    var cliente = $("#clien").val();
    var suma = canasta.map(item => parseFloat(item[0].total)).reduce((prev, curr) => prev + curr);     
    var parametros = {
        "fecha" : fecha,
        "hora" : hora,
        "estado" : estado,
        "metodo" : metodo,
        "cliente" : cliente,
        "total" : suma
    };
    const locations = canasta.map(([value]) => ({value}));

    if ($('#userform').valid()) {
        if (estado == "A CREDITO") {
            if (cliente != "") {
                $.ajax({
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
                    method: "POST",
                    url: "ventas/registrar",
                    data: {parametros: parametros, data: locations},
                    success:  function (response) {
                        $('#exampleModal').modal('hide');
                        toastMixin.fire({
                            animation: true,
                            title: 'Venta Registrada'
                        });
                        window.location = "balance";
                        listar("");
                        vaciarCanasta();                           
                    },
                    error: (response) => {
                        console.log(response);
                    }  
                });
            }else{
              validacion("error","Error","Debes ingresar el cliente");  
            }
        }else{
            $.ajax({
                contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
                method: "POST",
                url: "ventas/registrar",
                data: {parametros: parametros, data: locations},
                success:  function (response) {
                    $('#exampleModal').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Ventas Registrada'
                    });
                    window.location = "balance";
                    listar("");
                    vaciarCanasta();
                    getNotifications();          
                },
                error: (response) => {
                    console.log(response);
                }  
            });
        }
    } else {
        validacion("error","Error","Rellena los campos correctamente");
    }

    
}

$("#search").on("keyup",function(e) {
    e.preventDefault();
    var busqueda = $("#search").val();
    if (busqueda !== "") {
        var parametro = {"busqueda" : busqueda};
        $.ajax({
            data:  parametro, 
            url:   'ventas/buscar', 
            type:  'POST', 
            success:  function (response) {
                $("#lista_prod").html(response);
            },
            error: (response) => {
                console.log(response);
            }
        });  
    }else{
        listar("");
    }

    
})
    

