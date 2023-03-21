<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class reportedeudasModel extends Conexion{

    public function __construct(){
        parent::conect();
    }

    public function getBalance($datos){
        $tipo=$datos['tipoPeriodo'];
        $periodo=$datos['periodo'];
        $sql="SELECT cm.categoria as concepto, m.total as total_pagado FROM  movimientos m, concepto_movimiento cm WHERE m.id_concepto_movimiento = cm.id AND m.id_concepto_movimiento <> 1  AND m.estado_movimiento 
        LIKE 'a credit%'";

switch ($tipo){
    case 'semanal':
        $fechas = explode('-',$periodo);
        $fechaInicio = explode('/',$fechas[0]);
        $fechaFin = explode('/',$fechas[1]);
        $fechaFin[0] = substr($fechaFin[0], 1);
        $fechaInicio[2] = substr($fechaInicio[2], 0, -1);

        if(strlen($fechaInicio[0])<2){
            $fechaInicio[0] = '0'.$fechaInicio[0];
        }

        if(strlen($fechaInicio[1])<2){
            $fechaInicio[1] = '0'.$fechaInicio[1];
        }

        if(strlen($fechaFin[0])<2){
            $fechaFin[0] = '0'.$fechaFin[0];
        }      

        if(strlen($fechaFin[1])<2){
            $fechaFin[1] = '0'.$fechaFin[1];
        }

        $fechaInicio = $fechaInicio[2].'-'.$fechaInicio[0].'-'.$fechaInicio[1];
        $fechaFin = $fechaFin[2].'-'.$fechaFin[0].'-'.$fechaFin[1];

        $sql .= "AND m.fecha >= '".$fechaInicio."' AND m.fecha <= '".$fechaFin."'";
    break;
    case 'anual':
        $sql .= "AND m.fecha LIKE '2022%'";
    break;
    default:
        $fecha = explode('-',$periodo);
        $fecha = $fecha[1].'-'.$fecha[0];
        $sql .= "AND m.fecha LIKE '".$fecha."%'";
    break;
   }

   $resultado='';
    try {
        $consulta= Conexion::conect()->prepare($sql);
        $consulta->execute();
        $resultado=$consulta->fetchALL(PDO::FETCH_OBJ);         
    } catch (Exception $e) {
          $resultado = $e->getMessage();
    }

      if(count($resultado)==0 || $resultado==''){
        return '';
      }
      else{
            $newResult = [];
            $resultado=json_decode(json_encode($resultado),true);
            foreach($resultado as $ac){
               if(count($newResult)==0){
                $newResult[]=[
                    'concepto' => $ac['concepto'],
                    'total_pagado' => floatval($ac['total_pagado'])
                ];
               }
               else{
                $existe='';
                for($n=0;$n<count($newResult);$n++){
                   if($newResult[$n]['concepto']==$ac['concepto']){
                    $existe=$n;
                   }
                }

                if($existe!=''){
                    $newResult[$existe]['total_pagado']=floatval($newResult[$existe]['total_pagado']) + floatval($ac['total_pagado']);
                }else{
                    $newResult[]=[
                        'concepto' => $ac['concepto'],
                        'total_pagado' => floatval($ac['total_pagado'])
                    ];
                }
               }
            }

            $resultado=$newResult;
        
        return $resultado;
      }
}
}

?>