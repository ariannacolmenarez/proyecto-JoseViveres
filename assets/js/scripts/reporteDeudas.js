var divSemanal = document.getElementById('infoSemanal');
var divMensual = document.getElementById('infoMensual');
var divAnual = document.getElementById('infoAnual');
var inputS = document.getElementById('weekDate');
var inputM = document.getElementById('datepicker');
var inputA = document.getElementById('year_datepicker');
var consultas = document.getElementById('botones').querySelectorAll('button');

for(var i=0; i<consultas.length;i++){
    consultas[i].onclick=function(){
        getBalance();
    }
}

inputA.onchange = inputM.onchange = inputS.onchange = function(){
    setTimeout(function(){getBalance();},500);
}

function getBalance(){
var periodo = '';
for(var n=0; n<consultas.length;n++){
    var clases = consultas[n].classList;
    for(var j=0;j<clases.length; j++){
        if(clases[j]=='active'){
            switch(consultas[n].innerHTML){
                case 'Anual':
                    periodo={
                       periodo: inputA.value,
                       tipoPeriodo: 'anual'
                    };
                break;
                case 'Mensual':
                    periodo={
                        periodo: inputM.value,
                        tipoPeriodo: 'mensual'
                     };
                break;
                default:
                    periodo={
                        periodo: inputS.value,
                        tipoPeriodo: 'semanal'
                     };
                break;
            }
        }
    }
}
$.ajax({
    type:'POST',
    url: "reporteDeudas/getDeudas",
    data:{datos:periodo}
}).done(function(resp){
    console.log(resp);
    if(resp!=0){
        switch(periodo['tipoPeriodo']){
            case 'semanal':
                divSemanal.innerHTML='<center><button type="button" class="btn btn-outline-success" onclick="generarReporte(1)">Imprimir</button></center><br>';
                divSemanal.innerHTML+='<center><h4>Deudas de la semana</h4></center><br>'+resp;
            break;
            case 'mensual':
                divMensual.innerHTML='<center><button type="button" class="btn btn-outline-success" onclick="generarReporte(2)">Imprimir</button></center><br>';
                divMensual.innerHTML+='<center><h4>Deudas del mes</h4></center><br>'+resp;
            break;
            default:
                divAnual.innerHTML='<center><button type="button" class="btn btn-outline-success" onclick="generarReporte(3)">Imprimir</button></center><br>';
                divAnual.innerHTML+='<center><h4>Deudas del año</h4></center><br>'+resp;
            break;
        }
    }
    else{
        divSemanal.innerHTML='No se encontraron resultados';
        divMensual.innerHTML='No se encontraron resultados';
        divAnual.innerHTML='No se encontraron resultados';
    }
})
}

function generarReporte(info){
    switch(info){
        case 1:
            var imprimir = divSemanal.innerHTML.split('<br>');
        break;
        case 2:
            var imprimir = divMensual.innerHTML.split('<br>');
        break;
        default:
            var imprimir = divAnual.innerHTML.split('<br>');
        break;
    }
    imprimir = imprimir[1]+'<br>'+imprimir[2];
    var mywindow = window.open('', 'PRINT', 'height=600,width=800');

    mywindow.document.write(imprimir);

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();
}