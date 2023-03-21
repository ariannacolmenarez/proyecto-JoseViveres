<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class reportebalanceModel extends Conexion{

    public function __construct(){
        parent::conect();
    }

    public function getBalance($datos){
        $tipo=$datos['tipoPeriodo'];
        $periodo=$datos['periodo'];
        $resultado = [
            'Activos en caja' => '',
            'Activos por cobrar' => '',
            'Gastos pagos' => ''
        ];

        $sqlActivosCaja="SELECT p.nombre as nombre_producto, m.total as total_venta, m.fecha as fecha_venta FROM detalles_movimientos dm, movimientos m, productos p WHERE dm.id_movimientos = m.id AND 
        dm.id_producto = p.id AND m.id_concepto_movimiento = 1 AND m.estado_movimiento LIKE 'pagad%' ";

        $sqlPorCobrar="SELECT p.nombre as nombre_producto, m.total as total_venta, m.fecha as fecha_venta FROM detalles_movimientos dm, movimientos m, productos p WHERE dm.id_movimientos = m.id AND 
        dm.id_producto = p.id AND m.id_concepto_movimiento = 1 AND m.estado_movimiento LIKE 'a credit%' ";

        $sqlGastosPagos="SELECT cm.categoria as concepto, m.total as total_pagado FROM  movimientos m, concepto_movimiento cm WHERE m.id_concepto_movimiento = cm.id AND m.id_concepto_movimiento <> 1  AND m.estado_movimiento 
        LIKE 'pagad%'";

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

                $procesedInfo['rango'] = [
                    'fechaInicio' => $fechaInicio,
                    'fechaFin' => $fechaFin
                ];

                $sqlActivosCaja .= "AND m.fecha >= '".$fechaInicio."' AND m.fecha <= '".$fechaFin."'";
                $sqlPorCobrar .= "AND m.fecha >= '".$fechaInicio."' AND m.fecha <= '".$fechaFin."'";
                $sqlGastosPagos .= "AND m.fecha >= '".$fechaInicio."' AND m.fecha <= '".$fechaFin."'";
            break;
            case 'anual':
                $sqlActivosCaja .= "AND m.fecha LIKE '".$periodo."%'";
                $sqlPorCobrar .= "AND m.fecha LIKE '".$periodo."%'";
                $sqlGastosPagos .= "AND m.fecha LIKE '".$periodo."%'";
            break;
            default:
                $fecha = explode('-',$periodo);
                $fecha = $fecha[1].'-'.$fecha[0];
                $sqlActivosCaja .= "AND m.fecha LIKE '".$fecha."%'";
                $sqlPorCobrar .= "AND m.fecha LIKE '".$fecha."%'";
                $sqlGastosPagos .= "AND m.fecha LIKE '".$fecha."%'";
            break;
        }

        $sql=[$sqlActivosCaja,$sqlPorCobrar,$sqlGastosPagos];
        for($n=0; $n<count($sql);$n++){
            try {
                $consulta= Conexion::conect()->prepare($sql[$n]);
                $consulta->execute();
                switch($n){
                    case 0:
                        $resultado['Activos en caja'] = $consulta->fetchALL(PDO::FETCH_OBJ);
                    break;
                    case 1:
                        $resultado['Activos por cobrar'] = $consulta->fetchALL(PDO::FETCH_OBJ);
                    break;
                    default:
                        $resultado['Gastos pagos'] = $consulta->fetchALL(PDO::FETCH_OBJ);
                    break;
                }
                
            } catch (Exception $e) {
                switch($n){
                    case 1:
                        $resultado['Activos en caja'] = $e->getMessage();
                    break;
                    case 2:
                        $resultado['Activos por cobrar'] = $e->getMessage();
                    break;
                    default:
                        $resultado['Gastos pagos'] = $e->getMessage();
                    break;
                }
            }
        }
        if($resultado['Activos en caja'] == '' && $resultado['Activos por cobrar'] == '' && $resultado['Gastos pagos'] == ''){
            return '';
        }
        else{
            if($resultado['Activos en caja']!=''){
                $newResult = [];
                $resultado['Activos en caja']=json_decode(json_encode($resultado['Activos en caja']),true);
                foreach($resultado['Activos en caja'] as $ac){
                if(count($newResult)==0){
                    $newResult[]=[
                        'nombre_producto' => $ac['nombre_producto'],
                        'total_venta' => floatval($ac['total_venta'])
                    ];
                }
                else{
                    $existe='';
                    for($n=0;$n<count($newResult);$n++){
                    if($newResult[$n]['nombre_producto']==$ac['nombre_producto']){
                        $existe=$n;
                    }
                    }

                    if($existe!=''){
                        $newResult[$existe]['total_venta']=floatval($newResult[$existe]['total_venta']) + floatval($ac['total_venta']);
                    }else{
                        $newResult[]=[
                            'nombre_producto' => $ac['nombre_producto'],
                            'total_venta' => floatval($ac['total_venta'])
                        ];
                    }
                }
                }

                $resultado['Activos en caja']=$newResult;
            }

            if($resultado['Activos por cobrar']!=''){
                $newResult = [];
                $resultado['Activos por cobrar']=json_decode(json_encode($resultado['Activos por cobrar']),true);
                foreach($resultado['Activos por cobrar'] as $ac){
                if(count($newResult)==0){
                    $newResult[]=[
                        'nombre_producto' => $ac['nombre_producto'],
                        'total_venta' => floatval($ac['total_venta'])
                    ];
                }
                else{
                    $existe='';
                    for($n=0;$n<count($newResult);$n++){
                    if($newResult[$n]['nombre_producto']==$ac['nombre_producto']){
                        $existe=$n;
                    }
                    }

                    if($existe!=''){
                        $newResult[$existe]['total_venta']=floatval($newResult[$existe]['total_venta']) + floatval($ac['total_venta']);
                    }else{
                        $newResult[]=[
                            'nombre_producto' => $ac['nombre_producto'],
                            'total_venta' => floatval($ac['total_venta'])
                        ];
                    }
                }
                }

                $resultado['Activos por cobrar']=$newResult;
            }

            if($resultado['Gastos pagos']!=''){
                $newResult = [];
                $resultado['Gastos pagos']=json_decode(json_encode($resultado['Gastos pagos']),true);
                foreach($resultado['Gastos pagos'] as $ac){
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

                $resultado['Gastos pagos']=$newResult;
            }

            if($resultado['Gastos pagos']==[] && $resultado['Activos por cobrar']==[] && $resultado['Activos en caja']==[]){
                $resultado = '';
            }
        
        return $resultado;
      }
 }
}

?>