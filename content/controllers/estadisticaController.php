<?php
namespace content\controllers;
use content\models\estadisticaModel;
use content\controllers\bitacoraController;
use content\libraries\core\autoload;

class estadisticaController extends autoload {
    private $model;
    function __construct()
    {
        parent::__construct();
        $this->model = new estadisticaModel;

    }

    function estadistica(){
        $data['page_tag'] = "Estadísticas | Market MP";
        $data['page_title'] = "Estadísticas";
        parent::getView("estadisticas", $data);
    }

    public function calcular() {
        $info = $this->model->calcularEstadistica($_POST['info']);
        $tiempos = $this->getTiempos($info['info']);
        if(count($info['consulta'])==0){
            echo 0;
        }
        else{
            $estadisticaInfo = '';
            switch ($info['info']['tipoRango']){
                case 'Semanal':
                    switch($info['info']['cons']){
                        case 'Gasto':
                            if(in_array("Estadisticas Gastos", $_SESSION['permisos'])){ 
                                $diaCant = [];
                                $diaConsulta=[];
                                for ($i = 0; $i < count($info['consulta']); $i++){
                                $dato= json_decode(json_encode($info['consulta'][$i]),true);
                                if(count($diaCant) == 0){
                                    $diaCant[] = [
                                    'dia' => $dato['fecha'],
                                    'cant' => 1
                                    ];
                                }
                                else {
                                    $existe = '';
                                    for ($n=0; $n < count($diaCant); $n++){
                                    if($diaCant[$n]['dia'] === $dato['fecha']){
                                    $existe=$n;
                                    }
                                    }

                                    if($existe != ''){
                                        $diaCant[$existe]['cant']+=1;
                                    }
                                    else{
                                    $diaCant[] = [
                                        'dia' => $dato['fecha'],
                                        'cant' => 1
                                        ];
                                }
                                }
                                }
                                for($i = 0; $i < count($diaCant); $i++){
                                $diaCant[$i]['promedio']=($diaCant[$i]['cant']*100) / count($info['consulta']);
                                }

                            $estadisticaInfo = [
                                'titulo' => 'Gasto de la semana',
                                'tiempos' => $tiempos,
                                'total' => count($info['consulta']),
                                'cont' => $diaCant,
                                'tipo' => 'gasto'
                            ];
                            }
                        break;
                        case 'Venta':
                            if(in_array("Estadisticas Ventas", $_SESSION['permisos'])){ 
                             $diaCant = [];
                             $diaConsulta=[];
                             for ($i = 0; $i < count($info['consulta']); $i++){
                              $dato= json_decode(json_encode($info['consulta'][$i]),true);
                              if(count($diaCant) == 0){
                                 $diaCant[] = [
                                    'dia' => $dato['fecha'],
                                    'cant' => 1
                                 ];
                              }
                              else {
                                  $existe = '';
                                  for ($n=0; $n < count($diaCant); $n++){
                                  if($diaCant[$n]['dia'] === $dato['fecha']){
                                    $existe=$n;
                                  }
                                 }

                                  if($existe != ''){
                                     $diaCant[$existe]['cant']+=1;
                                  }
                                  else{
                                    $diaCant[] = [
                                        'dia' => $dato['fecha'],
                                        'cant' => 1
                                     ];
                              }
                             }
                             }
                             for($i = 0; $i < count($diaCant); $i++){
                                $diaCant[$i]['promedio']=($diaCant[$i]['cant']*100) / count($info['consulta']);
                             }

                            $estadisticaInfo = [
                                'titulo' => 'Ventas de la semana (%)',
                                'tiempos' => $tiempos,
                                'total' => count($info['consulta']),
                                'cont' => $diaCant,
                                'tipo' => 'ventas'
                            ];
                            }
                        break;
                        default:
                        if(in_array("Estadisticas Vendidos", $_SESSION['permisos'])){ 
                        $productosPeriodo = [];
                        for($n = 0; $n < count($info['consulta']) ; $n++){
                            $dato= json_decode(json_encode($info['consulta'][$n]),true);
                            if(count($productosPeriodo) == 0){
                                $productosPeriodo[] = [
                                    'producto' => $dato['nombre'],
                                    'cantidad' => intval($dato['cantidad'])
                                ];
                            }
                            else{
                                $existe = '';
                                for($i=0; $i < count($productosPeriodo); $i++){
                                     if($productosPeriodo[$i]['producto'] == $dato['nombre']){
                                        $existe = $i;
                                     }
                                }

                                if($existe != '') {
                                    $productosPeriodo[$existe]['cantidad'] += intval($dato['cantidad']);
                                }
                                else{
                                    $productosPeriodo[] = [
                                        'producto' => $dato['nombre'],
                                        'cantidad' => intval($dato['cantidad'])
                                    ];
                                }
                            }
                        }

                        for($i = 0; $i < count($productosPeriodo); $i++){
                            $productosPeriodo[$i]['promedio']=($productosPeriodo[$i]['cantidad']*100) / count($info['consulta']);
                         }

                         $estadisticaInfo = [
                            'titulo' => 'Productos más vendidos (%)',
                            'cont' => $productosPeriodo,
                            'tipo' => 'mas-vendido'
                        ];
                        }
                        break;
                    }
                break;
                case 'Anual':
                    switch($info['info']['cons']){
                        case 'Gasto':
                            if(in_array("Estadisticas Gastos", $_SESSION['permisos'])){ 
                            $mesCant = [];
                            for ($i = 0; $i < count($info['consulta']); $i++){
                             $dato= json_decode(json_encode($info['consulta'][$i]),true);
                             $fechaMes = explode('-',$dato['fecha']);
                               for($n=0;$n<count($tiempos);$n++){
                                    
                                if($fechaMes[1]==$tiempos[$n]['numeroMes']){
                                    $fechaMes = $tiempos[$n]['mes'];
                                }
                               }
                               
                             if(count($mesCant) == 0){
                                $mesCant[] = [
                                   'dia' => $fechaMes,
                                   'cant' => 1
                                ];
                             }
                             else {
                                 $existe = '';
                                 for ($n=0; $n < count($mesCant); $n++){
                                 if($mesCant[$n]['dia'] === $fechaMes){
                                    $existe = $n;
                                 }
                                }

                                 if($existe != ''){
                                    $mesCant[$existe]['cant']+=1;
                                 }
                                 else{
                                   $mesCant[] = [
                                       'dia' => $fechaMes,
                                       'cant' => 1
                                    ];
                             }
                            }
                            }
                            for($i = 0; $i < count($mesCant); $i++){
                               $mesCant[$i]['promedio']=($mesCant[$i]['cant']*100) / count($info['consulta']);
                            }

                           $estadisticaInfo = [
                               'titulo' => 'Gastos del año',
                               'total' => count($info['consulta']),
                               'cont' => $mesCant,
                               'tipo' => 'gasto'
                           ];
                            }
                        break;
                        case 'Venta':
                            if(in_array("Estadisticas Ventas", $_SESSION['permisos'])){ 
                            $mesCant = [];
                            for ($i = 0; $i < count($info['consulta']); $i++){
                             $dato= json_decode(json_encode($info['consulta'][$i]),true);
                             $fechaMes = explode('-',$dato['fecha']);
                               for($n=0;$n<count($tiempos);$n++){
                                if($fechaMes[1]==$tiempos[$n]['numeroMes']){
                                    $fechaMes = $tiempos[$n]['mes'];
                                }
                               }

                             if(count($mesCant) == 0){
                                $mesCant[] = [
                                   'dia' => $fechaMes,
                                   'cant' => 1
                                ];
                             }
                             else {
                                 $existe = '';
                                 for ($n=0; $n < count($mesCant); $n++){
                                 if($mesCant[$n]['dia'] === $fechaMes){
                                    $existe = $n;
                                 }
                                }

                                 if($existe != ''){
                                    $mesCant[$existe]['cant']+=1;
                                 }
                                 else{
                                   $mesCant[] = [
                                       'dia' => $fechaMes,
                                       'cant' => 1
                                    ];
                             }
                            }
                            }
                            for($i = 0; $i < count($mesCant); $i++){
                               $mesCant[$i]['promedio']=($mesCant[$i]['cant']*100) / count($info['consulta']);
                            }

                           $estadisticaInfo = [
                               'titulo' => 'Ventas del año',
                               'total' => count($info['consulta']),
                               'cont' => $mesCant,
                               'tipo' => 'ventas'
                           ];
                            }
                        break;
                        default:
                        if(in_array("Estadisticas Vendidos", $_SESSION['permisos'])){ 
                        $productosPeriodo = [];
                        for($n = 0; $n < count($info['consulta']) ; $n++){
                            $dato= json_decode(json_encode($info['consulta'][$n]),true);
                            if(count($productosPeriodo) == 0){
                                $productosPeriodo[] = [
                                    'producto' => $dato['nombre'],
                                    'cantidad' => intval($dato['cantidad'])
                                ];
                            }
                            else{
                                $existe = '';
                                for($i=0; $i < count($productosPeriodo); $i++){
                                     if($productosPeriodo[$i]['producto'] == $dato['nombre']){
                                        $existe = $i;
                                     }
                                }

                                if($existe != '') {
                                    $productosPeriodo[$existe]['cantidad'] += intval($dato['cantidad']);
                                }
                                else{
                                    $productosPeriodo[] = [
                                        'producto' => $dato['nombre'],
                                        'cantidad' => intval($dato['cantidad'])
                                    ];
                                }
                            }
                        }

                        for($i = 0; $i < count($productosPeriodo); $i++){
                            $productosPeriodo[$i]['promedio']=($productosPeriodo[$i]['cantidad']*100) / count($info['consulta']);
                         }

                         $estadisticaInfo = [
                            'titulo' => 'Productos más vendidos (%)',
                            'cont' => $productosPeriodo,
                            'tipo' => 'mas-vendido'
                        ];
                        }
                        break;
                    }
                break;
                default:
                switch($info['info']['cons']){
                    case 'Gasto':
                        if(in_array("Estadisticas Gastos", $_SESSION['permisos'])){ 
                        $mesCant = [];
                        for ($i = 0; $i < count($info['consulta']); $i++){
                         $dato= json_decode(json_encode($info['consulta'][$i]),true);
                         $fechaMes = $dato['fecha'];
                         foreach ($tiempos as $key => $value) {
                            foreach ($value as $key => $val) {
                                foreach ($val as $key => $r) {
                                    var_dump(array_filter($r, function($v, $k) use ($fechaMes) {
                                        return $k['dia'];
                                      }, ARRAY_FILTER_USE_BOTH));
                                
                                    // if($fechaMes==$r['dia']){
                                    //     var_dump($val);
                                    //     // $fechaMes = $tiempos[$n]['mes'];
                                    // }
                                    // var_dump($r['dia']);
                                }
                            }
                         }
                        //    for($n=0;$n<count($tiempos);$n++){
                        //         // 
                                
                        //         for($r=1;$r<count($tiempos);$r++){var_dump($tiempos[$n]);
                        //             var_dump($tiempos[$n]['Semana '.$r.'']);
                        //             if($fechaMes==$tiempos[$n]['Semana '.$r.'']){
                        //                 var_dump($tiempos[$n]['Semana '.$r.'']);
                        //                 $fechaMes = $tiempos[$n]['mes'];
                        //             }
                        //         }
                        //    }
                        //    var_dump($fechaMes);
                         if(count($mesCant) == 0){
                            $mesCant[] = [
                               'dia' => $fechaMes,
                               'cant' => 1
                            ];
                         }
                         else {
                             $existe = '';
                             for ($n=0; $n < count($mesCant); $n++){
                             if($mesCant[$n]['dia'] === $fechaMes){
                                $existe = $n;
                             }
                            }

                             if($existe != ''){
                                $mesCant[$existe]['cant']+=1;
                             }
                             else{
                               $mesCant[] = [
                                   'dia' => $fechaMes,
                                   'cant' => 1
                                ];
                         }
                        }
                        }
                        for($i = 0; $i < count($mesCant); $i++){
                           $mesCant[$i]['promedio']=($mesCant[$i]['cant']*100) / count($info['consulta']);
                        }

                        // $estadisticaInfo = $tiempos;

                        $estadisticaInfo = [
                            'titulo' => 'Gasto de la semana',
                            'tiempos' => $tiempos,
                            'total' => count($info['consulta']),
                            'cont' => $mesCant,
                            'tipo' => 'gasto'
                        ];
                        }
                    break;
                    case 'Venta':
                        // if(in_array("Estadisticas Ventas", $_SESSION['permisos'])){ 
                        // $semanasCant = [];
                        //  for ($i = 0; $i < count($info['consulta']); $i++){
                        //      $fechaSemana='';
                        //    $dato= json_decode(json_encode($info['consulta'][$i]),true);
                        //      for($n=0;$n<count($tiempos);$n++){
                        //       for($j=0; $j<count($tiempos[$n]);$j++){
                        //         $semana= json_decode(json_encode($tiempos[$n]),true);;
                        //         $semanaRevision=$semana['Semana '.$n+1];
                        //           for($k=0;$k<count($semanaRevision);$k++){
                        //             if($semanaRevision[$k]['dia']===$dato['fecha']){
                        //                 $fechaSemana=$semanaRevision[0]['dia'].' al '.$semanaRevision[count($semanaRevision)]['dia'];
                        //             }

                        //             if(count($semanasCant)==0){
                        //                 $semanasCant[] = [
                        //                     'dia' => $fechaSemana,
                        //                     'cant' => 1
                        //                      ];
                        //             }
                        //             else{
                        //       $existe = '';
                        //       for ($n=0; $n < count($semanasCant); $n++){
                        //       if($semanasCant[$n]['dia'] === $fechaSemana){
                        //          $existe = $n;
                        //       }
                        //      }

                        //       if($existe != ''){
                        //          $semanasCant[$existe]['cant']+=1;
                        //       }
                        //       else{
                        //         $semanasCant[] = [
                        //             'dia' => $fechaSemana,
                        //             'cant' => 1
                        //          ];
                        //   }
                        //             }
                        //           }
                        //         }
                        //       }
                        //      }
                        //      $estadisticaInfo='prueba';
                        //     }
                        var_dump("venta");
                    break;
                    default:
                    var_dump("vendido");
                    // if(in_array("Estadisticas Vendidos", $_SESSION['permisos'])){ 
                    // $productosPeriodo = [];
                    // for($n = 0; $n < count($info['consulta']) ; $n++){
                    //     $dato= json_decode(json_encode($info['consulta'][$n]),true);
                    //     if(count($productosPeriodo) == 0){
                    //         $productosPeriodo[] = [
                    //             'producto' => $dato['nombre'],
                    //             'cantidad' => intval($dato['cantidad'])
                    //         ];
                    //     }
                    //     else{
                    //         $existe = '';
                    //         for($i=0; $i < count($productosPeriodo); $i++){
                    //              if($productosPeriodo[$i]['producto'] == $dato['nombre']){
                    //                 $existe = $i;
                    //              }
                    //         }

                    //         if($existe != '') {
                    //             $productosPeriodo[$existe]['cantidad'] += intval($dato['cantidad']);
                    //         }
                    //         else{
                    //             $productosPeriodo[] = [
                    //                 'producto' => $dato['nombre'],
                    //                 'cantidad' => intval($dato['cantidad'])
                    //             ];
                    //         }
                    //     }
                    // }

                    // for($i = 0; $i < count($productosPeriodo); $i++){
                    //     $productosPeriodo[$i]['promedio']=($productosPeriodo[$i]['cantidad']*100) / count($info['consulta']);
                    //  }

                    //  $estadisticaInfo = [
                    //     'titulo' => 'Productos más vendidos (%)',
                    //     'cont' => $productosPeriodo,
                    //     'tipo' => 'mas-vendido'
                    // ];
                    // }
                    break;
                }
                break;
        }
        echo json_encode($estadisticaInfo);
    }
}


    public function getTiempos($info){
        $result = '';
        switch ($info['tipoRango']){
            case 'Semanal':
                $weekDays = [];
                $weekDays[] = $info['rango']['fechaInicio'];
                $weekDay = date("Y-m-d", strtotime($info['rango']['fechaInicio']."+ 1 days"));
                $weekDay = explode('-',$weekDay);
                strlen($weekDay[1]) < 2 ? $weekDay[1] = '0'.$weekDay[1] : $weekDay[1] = $weekDay[1];       
                strlen($weekDay[2]) < 2 ? $weekDay[2] = '0'.$weekDay[2] : $weekDay[2] = $weekDay[2];
                $weekDay = $weekDay[0].'-'.$weekDay[1].'-'.$weekDay[2];

                while ($weekDay != $info['rango']['fechaFin']){
                    $weekDays[] = $weekDay;
                    $weekDay = date("Y-m-d", strtotime($weekDay."+ 1 days"));
                    $weekDay = explode('-',$weekDay);
                    strlen($weekDay[1]) < 2 ? $weekDay[1] = '0'.$weekDay[1] : $weekDay[1] = $weekDay[1];       
                    strlen($weekDay[2]) < 2 ? $weekDay[2] = '0'.$weekDay[2] : $weekDay[2] = $weekDay[2];
                    $weekDay = $weekDay[0].'-'.$weekDay[1].'-'.$weekDay[2];
                }

                $weekDays[] = $info['rango']['fechaFin'];
                $result = $weekDays;
            break;
            case 'Anual':
            $meses = [
                [
                    'mes' => 'Enero',
                    'numeroMes' => '01'
                ],
                [
                    'mes' => 'Febrero',
                    'numeroMes' => '02'
                ],
                [
                    'mes' => 'Marzo',
                    'numeroMes' => '03'
                ],
                [
                    'mes' => 'Abril',
                    'numeroMes' => '04'
                ],
                [
                    'mes' => 'Mayo',
                    'numeroMes' => '05'
                ],
                [
                    'mes' => 'Junio',
                    'numeroMes' => '06'
                ],
                [
                    'mes' => 'Julio',
                    'numeroMes' => '07'
                ],
                [
                    'mes' => 'Agosto',
                    'numeroMes' => '08'
                ],
                [
                    'mes' => 'Septiembre',
                    'numeroMes' => '09'
                ],
                [
                    'mes' => 'Octubre',
                    'numeroMes' => '10'
                ],
                [
                    'mes' => 'Noviembre',
                    'numeroMes' => '11'
                ],
                [
                    'mes' => 'Diciembre',
                    'numeroMes' => '12'
                ]
            ];
            $result = $meses;
            break;
            default:
            $info['rango'] = explode('-',$info['rango']);
            $diasXmes = cal_days_in_month(CAL_GREGORIAN, intval($info['rango'][1]), intval($info['rango'][0]));
            $dias = array('','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
            $semanas = [];
            $datos = [];
            $contSemanas = 0;
            for ($i = 1; $i <= $diasXmes; $i++){
               $fechaDia = $info['rango'][0].'-'.$info['rango'][1];
                $i < 10 ? $fechaDia = $fechaDia.'-0'.$i : $fechaDia = $fechaDia.'-'.$i; 
                $diaSemana = $dias[date('N', strtotime($fechaDia))];
                $datos[]=[
                    'dia' => $fechaDia,
                    'nombreDia' => $diaSemana
                ];
            }
            $diasWeek = [];
            $cont=0;
            for ($i = 0; $i < count($datos); $i++){
                if($datos[$i]['nombreDia'] != 'Domingo'){
                    $diasWeek[]=$datos[$i];
                }
                else{
                    $diasWeek[]=$datos[$i];
                    $cont++;
                    $semanas[]=[
                        'Semana '.$cont => $diasWeek
                    ];
                    $diasWeek = [];
                }
             }
            $result = $semanas;
            break;
        }
        return $result;
    }
}