var semana = document.getElementById("semana");
var mes = document.getElementById("datepicker");
var year = document.getElementById("year_datepicker");
var consultas = document.getElementById("consultas").querySelectorAll("button");
var periodos = document.getElementById("periodos").querySelectorAll("button");
var canv1 = document.getElementById('canva1');
var canv2 = document.getElementById('canva2');
var canv3 = document.getElementById('canva3');
canvAux='';

for (var i = 0; i < 3; i++ ) {
    consultas[i].onclick = periodos[i].onclick = function() {
        getEstadistica();
    }
}

semana.onchange=mes.onchange=year.onchange=function(){
   setTimeout(function(){getEstadistica()},500); 
}

function getEstadistica() {
  var cons = "";
  var tipoRango = "";
  var rango = "";
  for (var i = 0; i < consultas.length; i++){
    for (var n = 0; n < consultas[i].classList.length; n++){
        if (consultas[i].classList[n] == 'active') {
            cons = consultas[i].innerHTML;
        }
    }
  }

  for (var i = 0; i < periodos.length; i++){
    for (var n = 0; n < periodos[i].classList.length; n++){
        if (periodos[i].classList[n] == 'active') {
            tipoRango = periodos[i].innerHTML;
        }
    }
  }

  switch (tipoRango) {
    case 'Semanal':
        canvAux=canv1;
        rango = semana.value;
    break;

    case 'Anual':
      canvAux=canv3;
        rango = year.value;
    break;

    default:
      canvAuc=canv2;
        rango = mes.value;
    break;
  }

  var datos = {
    rango : rango,
    tipoRango : tipoRango,
    cons : cons
  }

  getInfo(datos)
}

function getInfo(datos) {
    $.ajax({
        type: "POST",
        url: "estadistica/calcular",
        data: {info: datos}
    }).done(function(resp){
      console.log(canvAux);
      console.log(resp);
      canvAux===''?canvAux=canv1:canvAux=canvAux;
      canv1.innerHTML=canv2.innerHTML=canv3.innerHTML='';
        if(resp!=0){
        resp=JSON.parse(resp);
        switch(resp['tipo']){
            case 'ventas':
        var cont = resp['cont'];
        var vlabels=[];
        var hlabels=[];
        for(var i=0; i< cont.length; i++){
            vlabels.push(parseInt(cont[i]['promedio']));
            hlabels.push(cont[i]['dia']);
        }
        var data = {
            labels: hlabels,
            datasets: [{
              label: resp['titulo'],
              data: vlabels,
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1,
              fill: false
            }]
          };

          var options = {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            },
            legend: {
              display: false
            },
            elements: {
              point: {
                radius: 0
              }
            }
        
          };
          var canv = document.createElement('canvas');
          canvAux.appendChild(canv);
          new Chart(canv, {
            type: 'bar',
            data: data,
            options: options
          });
            break;
        case 'gasto':
          var canv = document.createElement('canvas');
          canvAux.appendChild(canv);
            var cont = resp['cont'];
            var vlabels=[];
            var hlabels=[];
            for(var i=0; i< cont.length; i++){
                vlabels.push(parseInt(cont[i]['promedio']));
                hlabels.push(cont[i]['dia']);
            }
            var data = {
                labels: hlabels,
                datasets: [{
                 label: resp['titulo'],
                  data: vlabels,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1,
                  fill: true,
                }]
              };
            var areaOptions = {
                plugins: {
                  filler: {
                    propagate: true
                  }
                }
              }
              new Chart(canv, {
                type: 'line',
                data: data,
                options: areaOptions
              });
        break;
        default:
          var canv = document.createElement('canvas');
          canvAux.appendChild(canv);
            var cont = resp['cont'];
            var dataP=[];
            var labelsP=[];
            for(var i=0; i< cont.length; i++){
              dataP.push(parseInt(cont[i]['promedio']));
              labelsP.push(cont[i]['producto']);
          }
          var doughnutPieData = {
            datasets: [{
              data: dataP,
              backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
              ],
              borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ],
            }],
            labels: labelsP
          };

          var doughnutPieOptions = {
            responsive: true,
            animation: {
              animateScale: true,
              animateRotate: true
            }
          };

          new Chart(canv, {
            type: 'doughnut',
            data: doughnutPieData,
            options: doughnutPieOptions
          });
        break;
        }
      }
      else {
        canv1.innerHTML=canv2.innerHTML=canv3.innerHTML='No hay resultados';
      }
    })
} 
