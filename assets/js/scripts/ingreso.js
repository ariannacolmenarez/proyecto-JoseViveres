$(document).ready(function() {

    $("#ingreso_form").validate({
        rules: {
            fechaI : {
                required: true
            },
            nro_fac : {
                required:true,
                minlength: 1,
                maxlength: 11
            },
            fecha_fac : {
                required:true
            },
            estado_fac : {
                required:true
            },
            proveedorv : {
                required:true
            },
            metodo: {
                required: {
                    depends: function(elem) {
                        return $('input[name=estado]:checked', '#estado_fac').val() == "PAGADA"
                    }
                    },
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
    listarIngresos();
});

function cerrar(){
    window.location.reload();
}

function limpiar(){
    $('input').val("");
    $('select').val("");
    $('textarea').val("");
};

function listarIngresos(){
    
    $.get("ingreso/listarIngresos", {}, function (data, status) {
        $("#list_ingresos").html(data);
        $('#list_ingresos').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
          });
    });
};
function regisIngreso(){
    listarProd();
    listarProveedores("#proveedorv");
    $('#ingresosR').modal('show');
}

function listarProveedores(name){
    $.get("ingreso/listarProveedores", {}, function (data, status) {
        $(name).html(data);
    });
};

function listarProductos(){
    $.get("ingreso/listarProductos", {}, function (data, status) {
        $("#produc").html(data);
    });
};

producto = [];
function formProd(){
    $('#ingresosR').modal('hide');
    listarProductos();
    Swal.fire({
        title: 'Productos',
        html: `
        <select class="swal2-input w-75" id="produc" name="produc">
        </select>
        <input type="text" id="costo" name="costo" class="swal2-input w-75" placeholder="Precio costo">
        <input type="text" id="venta" class="swal2-input w-75" placeholder="Precio venta">
        <input type="text" id="cantidad" class="swal2-input w-75" placeholder="Cantidad">
        `,
        allowOutsideClick: false,
        confirmButtonColor  : "#28a745",
        showCancelButton    : true,
        confirmButtonText: 'Agregar',
        focusConfirm: false,
        
        preConfirm: () => {
            const costo = Swal.getPopup().querySelector('#costo').value
            const cantidad = Swal.getPopup().querySelector('#cantidad').value
            const produc = Swal.getPopup().querySelector('#produc').value
            const venta = Swal.getPopup().querySelector('#venta').value
            if (!costo || !venta || !cantidad || !produc) {
              Swal.showValidationMessage(`Todos los campos deben estar llenos`)
            }
          }
    }).then((result) => {
        if (result.isConfirmed) {
            agregarProd();
            regisIngreso()
        }else if (result.isDismissed) {
            regisIngreso();
        }
        
    })
}


function agregarProd(){
    
        var prod = $("#produc").val().split('-');
        var id_prod= prod[0];
        var nombre = prod[1];
        var costo = $("#costo").val();
        var venta = $("#venta").val();
        var cantidad = $("#cantidad").val();
        
        producto.push({
            id:id_prod,
            nombre: nombre,
            costo: costo,
            venta: venta,
            cantidad: cantidad,
        });
     console.log(producto);
}

function listarProd(){
    
    html = `<table class="table" >
    <thead>
                <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio Costo</th>
                <th scope="col">Precio Venta</th>
                <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">`;
    producto.map(function(prod) {
        html += ` <tr>
        <td>`+prod.nombre+`</td>
        <td>`+prod.cantidad+`</td>
        <td>`+prod.costo+`</td>
        <td>`+prod.venta+`</td>
        <td><div onclick="eliminarprod(`+prod.id+`);" class="text-danger">
        <i class="ti-trash"></i>
    </div></td>
        </tr>
        <tr>`;
    })
    html+=`</tbody></table>`;
    if(producto.length > 0){
        $("#table").html(html);
    }else{
        productos = document.getElementById("table");

            while (productos.firstChild) {
                productos.removeChild(productos.firstChild);
            }
    }
}

function eliminarprod(id){
    producto = producto.filter(function(i) { 
        return id != i.id ;
    }); // filtramos    
    listarProd();
}

function registrarIngreso(){

    var estado_fac = $('input[name=estado]:checked', '#estado_fac').val();
    var metodo = $('input[name=metodo]:checked', '#metodoI').val();
    var fechaI = $("#fechaI").val();
    var nro_fac = $("#nro_fac").val();
    var fecha_fac = $("#fecha_fac").val();
    var proveedor = $("#proveedorv").val();     
    var parametros = {
        "fechaI" : fechaI,
        "nro_fac" : nro_fac,
        "estado_fac" : estado_fac,
        "fecha_fac" : fecha_fac,
        "proveedor" : proveedor,
        "metodo":metodo
    };
    const locations = producto;
    if ($('#ingreso_form').valid()) {
        if(producto.length>0){
            $.ajax({
                contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
                method: "POST",
                url: "ingreso/registrar",
                data: {parametros: parametros, data: locations},
                success:  function (response) {
                    if(response == 1){
                        console.log(response);
                        $('#ingresoR').modal('hide');
                        toastMixin.fire({
                            animation: true,
                            title: 'Ingreso Registrado'
                        });
                        window.location.reload();
                    }else{
                         console.log(response);
                        validacion("error","Duplicado","El número de documento esta duplicado");
                    }                         
                },
                error: (response) => {
                    console.log(response);
                }  
            });
        }else{
            validacion("error","Error","Agrega algun producto al ingreso");
        }
        
    } else {
        validacion("error","Error","Rellena los campos correctamente");
    }

    
}

// function registrarRol(){
//     var nombre = $("#nombreR").val();
//     var descripcion = $("#descripcionR").val();

//     var parametros = {
//         "nombre" : nombre,
//         "desc" : descripcion
//     };
//     if ($('#form_rol').valid()) {
//         $.ajax({
//             data:  parametros, //datos que se envian a traves de ajax
//             url:   'seguridad/registrarRol', //archivo que recibe la peticion
//             type:  'POST', //método de envio
//             success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
//                 if(response !== "true"){
//                     $('#exampleModalToggle19').modal('hide');
//                     validacion("error","Duplicado","El nombre del rol esta duplicado");
//                     limpiar();
//                 }else{
//                     $('#exampleModalToggle19').modal('hide');
//                     toastMixin.fire({
//                         animation: true,
//                         title: 'Rol Registrado'
//                     });
//                     limpiar();    
//                     window.location.reload()
//                 }
//             },error: (response) => {
//                 console.log(response);
//             }
//         });
//     } else {
//         validacion("error","Error","Rellena los campos correctamente");
//     }
    
// }
// function formProdE(){
//     $('#ingresosE').modal('hide');
//     listarProductos();
//     Swal.fire({
//         title: 'Productos',
//         html: `
//         <select class="swal2-input w-75" id="produc" name="produc">
//         </select>
//         <input type="text" id="costo" name="costo" class="swal2-input w-75" placeholder="Precio costo">
//         <input type="text" id="venta" class="swal2-input w-75" placeholder="Precio venta">
//         <input type="text" id="cantidad" class="swal2-input w-75" placeholder="Cantidad">
//         `,
//         allowOutsideClick: false,
//         confirmButtonColor  : "#28a745",
//         showCancelButton    : true,
//         confirmButtonText: 'Agregar',
//         focusConfirm: false,
        
//         preConfirm: () => {
//             const costo = Swal.getPopup().querySelector('#costo').value
//             const cantidad = Swal.getPopup().querySelector('#cantidad').value
//             const produc = Swal.getPopup().querySelector('#produc').value
//             const venta = Swal.getPopup().querySelector('#venta').value
//             if (!costo || !venta || !cantidad || !produc) {
//               Swal.showValidationMessage(`Todos los campos deben estar llenos`)
//             }
//           }
//     }).then((result) => {
//         if (result.isConfirmed) {
//             agregarProdEditar();
//             consultarIngreso($("#idE").val(),1)
//         }else if (result.isDismissed) {
//             consultarIngreso($("#idE").val(),1);
//         }
//     })
// }

function obtenerIngreso(id){
    $.ajax({
        type: "POST",
        url: "ingreso/consultarIngreso/"+id,
        dataType: "json",
        success: function (response) {
            $("#estado_facE").html(response[0].estado_factura);
            $("#fechaIE").html(response[0].fecha);
            $("#nro_facE").html(response[0].nro_factura);
            $("#fecha_facE").html(response[0].fecha_factura);
            $("#proveedorvE").html(response[0].proveedor); 
        },
        error: (response) => {
            console.log(response);
        }
    });
}

function obtenerproductosI(id,opcion){
    $.ajax({
        type: "POST",
        url: "ingreso/obtenerproductosI/"+id,
        dataType: "json",
        success: function (response) {
            if(opcion != 1){
                response.map(function(productos){   
                if(productos.id != undefined){         
                    productosE.push({
                        id:productos.id,
                        nombre: productos.nombre,
                        costo: productos.costo,
                        venta: productos.venta,
                        cantidad: productos.cantidad,
                    });
                }
            })
            }
            listarProdEditar();
        },
        error: (response) => {
            console.log(response);
        }
    });
}



// function agregarProdEditar(){
    
//     var prod = $("#produc").val().split('-');
//     var id_prod= prod[0];
//     var nombre = prod[1];
//     var costo = $("#costo").val();
//     var venta = $("#venta").val();
//     var cantidad = $("#cantidad").val();
    
//     productosE.push({
//         id:id_prod,
//         nombre: nombre,
//         costo: costo,
//         venta: venta,
//         cantidad: cantidad,
//     });
// }

function listarProdEditar(){

html = `<table class="table" >
<thead>
            <tr>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio Costo</th>
            <th scope="col">Precio Venta</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">`;
    productosE.map(function(prod) {
        html += ` <tr>
        <td>`+prod.nombre+`</td>
        <td>`+prod.cantidad+`</td>
        <td>`+prod.costo+`</td>
        <td>`+prod.venta+`</td>
        </tr>
        <tr>`;
    })
    html+=`</tbody></table>`;
    if(productosE.length > 0){
        $("#tableEditar").html(html);
    }else{
        productos = document.getElementById("tableEditar");

            while (productos.firstChild) {
                productos.removeChild(productos.firstChild);
            }
    }
}

// function eliminarprodEditar(id){
//     productosE = productosE.filter(function(i) { 
//         return id != i.id ;
//     }); // filtramos    
//     listarProdEditar();
// }

productosE=[];
function consultarIngreso(id,opcion) {
    obtenerIngreso(id);
    obtenerproductosI(id,opcion); 
    
    $('#ingresosE').modal('show');
}

// function guardarIngreso(){

//     var estado_fac = $('input[name=estadoE]:checked', '#estado_facE').val();
//     var fechaI = $("#fechaIE").val();
//     var nro_fac = $("#nro_facE").val();
//     var fecha_fac = $("#fecha_facE").val();
//     var proveedor = $("#proveedorvE").val();  
//     var id = $("#idE").val();   
//     var parametros = {
//         "id":id,
//         "fechaI" : fechaI,
//         "nro_fac" : nro_fac,
//         "estado_fac" : estado_fac,
//         "fecha_fac" : fecha_fac,
//         "proveedor" : proveedor
//     };
//     const locations = productosE;
//     if ($('#ingreso_formE').valid()) {
//         $.ajax({
//             contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
//             method: "POST",
//             url: "ingreso/Guardar",
//             data: {parametros: parametros, data: locations},
//             success:  function (response) {
//                 console.log(response)
//                 // $('#ingresosE').modal('hide');
//                 // toastMixin.fire({
//                 //     animation: true,
//                 //     title: 'Ingreso Modificado'
//                 // });
//                 // window.location.reload();                          
//             },
//             error: (response) => {
//                 console.log(response);
//             }  
//         });
//     } else {
//         validacion("error","Error","Rellena los campos correctamente");
//     }

    
// }
// function guardarRol(){
//     var id = $("#idRol").val();
//     var nombre = $("#nombreRol").val();
//     var descripcion = $("#descripcionRol").val();
   
//     var parametros = {
//         "nombre" : nombre,
//         "descripcion" : descripcion,
//         "id" : id
//     };
//     if ($('#form_rolM').valid()) {
//         $.ajax({
//             data:  parametros, //datos que se envian a traves de ajax
//             url:   'seguridad/guardarRol', //archivo que recibe la peticion
//             type:  'POST', //método de envio
//             success:  function (response) {
//                 $('#exampleModalToggle20').modal('hide'); 
//                 toastMixin.fire({
//                     animation: true,
//                     title: 'Rol Modificado'
//                 });   
//                 window.location.reload()
//             },
//             error: (response) => {
//                 console.log(response);
//             }
//         });
//     } else {
//         validacion("error","Error","Rellena los campos correctamente");
//     }
// }

function eliminarIngreso(id){
    Swal.fire({
        title: '¿Estas seguro que deseas Eliminar el registro?',
        ico: "warning",
        showDenyButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:   'ingreso/eliminarIngreso/'+id, //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) {
                        toastMixin.fire({
                            animation: true,
                            title: 'Ingreso Eliminado'
                        });  
                        window.location.reload();
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
