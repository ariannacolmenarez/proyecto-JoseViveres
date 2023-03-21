$(document).ready(function () {
    listarInventario($("#catProd").val()); 
    listarCategoriasProd();   
    totalInventario();
    
 });
  
 $("#catProd").on("change",function(){
     listarInventario($("#catProd").val());
 });

 
 function listarInventario(opcion){
     
     $.ajax({
         type: "POST",
         url: "inventario/listar",
         data: {opcion: opcion},
         dataType: "json",
         success: function (response) {
            if (response == "") {
                $("#lista_producto").html("");
                $("#sin_producto").html("<div>No Hay productos</div>");
            }else{
                $("#sin_producto").html("");
                $("#lista_producto").html(response);
            }
             
         },
         error: (response) => {
             console.log(response);
         }
     });
 };

 function totalInventario() {
    $.ajax({
        type: "POST",
        url: "inventario/totalProd",
        dataType: "json",
        success: function (response) {
            
            $("#totalProd").html(response);
        },
        error: (response) => {
            console.log(response);
        }
    });
 }
 
 
 function listarCategoriasProd(){
     $.ajax({
         type: "POST",
         url: "inventario/listarCategoriasProd",
         dataType: "html",
         success: function (response) {
            $("#catProd").empty();
            $("#catProd").prepend('<option selected="true" value="">Ver todas las categorias</option>');
            $('#catProd').prepend(response);
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
             url:   'inventario/buscar', 
             type:  'POST', 
             success:  function (response) {
                 $("#lista_producto").html(response);
             },
             error: (response) => {
                 console.log(response);
             }
         });  
     }else{
         listarInventario("");
     }
 
     
 })
     
 
 