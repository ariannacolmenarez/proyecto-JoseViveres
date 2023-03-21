$(document).ready(function() {

    $("#form").validate({
        rules: {
        nombrep : {
            required: true,
            minlength: 5,
            maxlength: 50
        },
        presentacionprod: {
            required: true,
        },
        marcaprod: {
            required: true,
        },
        catprod: {
            required: true
        },
        descripcionp: {
            minlength: 5,
            maxlength: 150
        }
        },
        errorElement : 'span'
    });
      
    $("#form2").validate({
        rules: {
        nombrep : {
            required: true,
            minlength: 5,
            maxlength: 50
        },
        presentacionprod: {
            required: true,
        },
        marcaprod: {
            required: true,
        },
        catprod: {
            required: true
        },
        descripcionp: {
            minlength: 5,
            maxlength: 150
        }
        },
        errorElement : 'span'
    });

    listarProductos(); 
    totalProd();     
});

$("#catProd").on("change",function(){
    listarProductos();
})
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

function listarProductos(){
     
    $.ajax({
        type: "POST",
        url: "productos/listar",
        dataType: "json",
        success: function (response) {
            if (response == "") {
                $("#lista_producto").html("");
                $("#sin_producto").html("<div>No Hay productos</div>");
            }else{
               $("#lista_producto").html(response); 
               $("#sin_producto").html("");
            }
            
        },
        error: (response) => {
            console.log(response);
        }
    });
};

function aggProd(){
    listarcatProd();
    listarmarcas();
    listarpresen();
    $('#exampleModalToggle4').modal('show');
        $("#inp-img-vid").change(function() {
            imgPreview(this,"#preview-img");
        });
}

function limpiar(){
    $('input').val("");
    $('select').val("");
    $('textarea').val("");
};

$("button[name=close]").on("click",function() {
    limpiar();
    $("#preview-img").show().attr("src", "");
    $("#preview-imgE").show().attr("src", "");
})

function listarcatProd(){
    
    $.get("productos/listarCat", {}, function (data, status) {
        $("#cat_prod").html(data);
        $("#cat_prodE").html(data);
    });
};

function listarmarcas(){
    
    $.get("productos/listarMarca", {}, function (data, status) {
        $("#marca_prod").html(data);
        $("#marca_prodE").html(data);
    });
};

function listarpresen(){
    
    $.get("productos/listarPresentacion", {}, function (data, status) {
        $("#presentacion_prod").html(data);
        $("#presentacion_prodE").html(data);
    });
};

$("#plus").on("click",function() {
    if($("#cantidadp").val()=="" ){
        var input = 0
    }else{
        input = $("#cantidadp").val();
    }
    $("#cantidadp").val(parseFloat(input)+1);
});

$("#minus").on("click",function() {
    if($("#cantidadp").val() < 1 || $("#cantidadp").val() == "" ){
        var input = 1;
    }else{
        input = $("#cantidadp").val();
    }
    $("#cantidadp").val(parseFloat(input)-1);
})

function imgPreview(input,id) {
     var file = input.files[0];
     var mixedfile = file['type'].split("/");
     var filetype = mixedfile[0]; // (image, video)
     if(filetype == "image"){
       var reader = new FileReader();
       reader.onload = function(e){
         $(id).show().attr("src", e.target.result);
       }
       reader.readAsDataURL(input.files[0]);
     }else{
         validacion("error","Error","Invalid file type");
     }
}

function registrarProducto(){

    var formData = new FormData();
        var files = $('#inp-img-vid')[0].files[0];
        formData.append('file',files);
        formData.append('descripcion' , $("#descripcionp").val());
        formData.append('categoria' , $("#cat_prod").val());
        formData.append('marca' ,$("#marca_prod").val());
        formData.append('presentacion', $("#presentacion_prod").val());
        formData.append('nombre' , $("#nombrep").val());

        if ($('#form').valid()) {
            $.ajax({

                cache: false,
                contentType: false,
                data: formData,
                enctype: 'multipart/form-data',
                processData: false,
                method: "POST",
                url: "productos/registrar",
                success: function (response) {
                    if(response == 1){
                        $("#preview-img").show().attr("src", "");
                        $('#exampleModalToggle4').modal('hide');
                        toastMixin.fire({
                            animation: true,
                            title: 'Producto Registrado'
                        });
                        limpiar();
                        listarProductos();
                        totalProd();
                    }else{
                        $('#exampleModalToggle4').modal('hide');
                        validacion("error","Duplicado","El nombre del producto esta duplicado");
                        limpiar();
                        
                    }
                },
                error: (response) => {
                    console.log(response);
                }

            })
        } else {
            validacion("error","Error","Rellena los campos correctamente");
        }
        
}

function editarProducto(id){
    
    listarcatProd();
    listarmarcas();
    listarpresen();
    
    $('#editarProd').modal('show');consultarProductos(id);
    $("#inp-img-vidE").change(function() {
        imgPreview(this,"#preview-imgE");
    });
}

function consultarProductos(id){
    $.ajax({
        type: "POST",
        url: "productos/consultar/"+id,
        dataType: "json",
        success: function (response) {
            
            response.map( function (elem) {
                console.log(elem.marca)
                $("#idE").val(elem.id);
                $("#nombreE").val(elem.nombre);
                $("#marca_prodE").val(elem.marca);
                $("#presentacion_prodE").val(elem.presentacion);
                $("#descripcionE").val(elem.descripcion);
                $("#cat_prodE").val(elem.categoria);
                $("#preview-imgE").attr("src",elem.url_img);
            });
            
        },
        error: (response) => {
            console.log(response);
        }
    });
    
}

function guardarProducto(){
    var formData = new FormData();
        var files = $('#inp-img-vidE')[0].files[0];
        if (files != undefined) {
            formData.append('file',files);
        }
        formData.append('descripcion' , $("#descripcionE").val());
        formData.append('categoria' , $("#cat_prodE").val());
        formData.append('presentacion' ,$("#presentacion_prodE").val());
        formData.append('marca', $("#marca_prodE").val());
        formData.append('nombre' , $("#nombreE").val());
        formData.append('id' , $("#idE").val());
        
        if ($('#form2').valid()) {
            $.ajax({

                cache: false,
                contentType: false,
                data: formData,
                enctype: 'multipart/form-data',
                processData: false,
                method: "POST",
                url: "productos/guardar",
                success: function (data) {
                    $('#editarProd').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Producto Modificado'
                    });
                    limpiar();
                    listarProductos();
                    totalProd();
                }

            });
        } else {
            validacion("error","Error","Rellena los campos correctamente");
        }
}

// $("#plusE").on("click",function() {
//     if($("#cantidadE").val()=="" ){
//         var input = 0
//     }else{
//         input = $("#cantidadE").val();
//     }
//     $("#cantidadE").val(parseFloat(input)+1);
// });

// $("#minusE").on("click",function() {
//     if($("#cantidadE").val() < 1 || $("#cantidadE").val() == "" ){
//         var input = 1;
//     }else{
//         input = $("#cantidadE").val();
//     }
//     $("#cantidadE").val(parseFloat(input)-1);
// })

function eliminarProducto(){
    var id = $("#idE").val();
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
                url:   'productos/eliminar', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $('#editarProd').modal('hide');
                    toastMixin.fire({
                        animation: true,
                        title: 'Producto Eliminado'
                    });
                    listarProductos();
                    totalProd();
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

function totalProd() {
    $.ajax({
        type: "POST",
        url: "productos/totalProd",
        dataType: "json",
        success: function (response) {
            $("#totalProd").html(response);
        },
        error: (response) => {
            console.log(response);
        }
    });
 }

$("#search").on("keyup",function(e) {
    e.preventDefault();
    var busqueda = $("#search").val();
    if (busqueda !== "") {
        var parametro = {"busqueda" : busqueda};
        $.ajax({
            data:  parametro, 
            url:   'productos/buscarProd', 
            type:  'POST', 
            success:  function (response) {
                $("#lista_producto").html(response);
            },
            error: (response) => {
                console.log(response);
            }
        });  
    }else{
        listarProductos();
    }

    
})

