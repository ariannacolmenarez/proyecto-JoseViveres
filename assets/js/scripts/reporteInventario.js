 var div = document.getElementById('insertInventario');
 var boton = document.getElementById('buttonDiv');


boton.onclick=function(){
    generarReporte();
}

$.ajax({
    type:'POST',
    url:'reporteInventario/getInventario'
}).done(function(resp){
    console.log(resp);
    div.innerHTML=resp;
})




function generarReporte(){

    var mywindow = window.open('', 'PRINT', 'height=600,width=800');

    mywindow.document.write(div.innerHTML);

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();
}


